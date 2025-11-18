<?php

namespace App\Libraries;

use Config\Database;

class DapegEtlService
{
    // Ganti ini kalau nama tabel staging-mu berbeda
    private string $stagingTable = 'tb_dapeg';

    /**
     * Jalankan semua langkah ETL untuk satu snapshot tanggal tertentu.
     */
    public function run(string $snapshotDate): bool
    {
        $db = Database::connect();

        $db->transStart();

        $this->buildOrgUnique($db);
        $this->insertNewToMapping($db);
        $this->insertNewToDimOrganisasi($db);
        $this->syncDimFromMapping($db);
        $this->reloadFaktaPegawai($db, $snapshotDate);

        $db->transComplete();

        return $db->transStatus();
    }

    /**
     * 1) Buat tabel sementara stg_org_unique berisi organisasi unik dari tabel_pegawai.
     *    Di sini kita pakai org_unit sebagai kode, org_unit_tx sebagai nama.
     */
    protected function buildOrgUnique($db): void
    {
        // Hapus dulu kalau tabel staging org unik sebelumnya ada
        $db->query('DROP TABLE IF EXISTS stg_org_unique');

        // Buat ulang tabel org unik dari tabel staging pegawai
        $sql = "
            CREATE TABLE stg_org_unique AS
            SELECT DISTINCT
                org_unit    AS org_code,
                org_unit_tx AS org_name
            FROM {$this->stagingTable};
        ";

        $db->query($sql);
    }

    /**
     * 2) Tambah org baru ke mapping_organisasi dengan default UNKNOWN
     */
    protected function insertNewToMapping($db): void
    {
        $sql = <<<SQL
        INSERT INTO mapping_organisasi (
            org_code,
            org_name_override,
            org_type,
            level_laporan,
            parent_org_code,
            kantor_induk_code,
            cluster,
            region
        )
        SELECT 
            u.org_code,
            u.org_name       AS org_name_override,
            'UNKNOWN'        AS org_type,
            'LAINNYA'        AS level_laporan,
            NULL             AS parent_org_code,
            NULL             AS kantor_induk_code,
            NULL             AS cluster,
            NULL             AS region
        FROM stg_org_unique u
        LEFT JOIN mapping_organisasi m ON m.org_code = u.org_code
        WHERE m.org_code IS NULL;
        SQL;
                $db->query($sql);
    }

    /**
     * 3) Tambah org baru ke dim_organisasi berdasarkan mapping_organisasi
     */
    protected function insertNewToDimOrganisasi($db): void
    {
        $sql = <<<SQL
        INSERT INTO dim_organisasi (
            org_code,
            org_name,
            org_type,
            level_laporan,
            cluster,
            region,
            is_active
        )
        SELECT 
            u.org_code,
            COALESCE(m.org_name_override, u.org_name) AS org_name,
            COALESCE(m.org_type, 'UNKNOWN')           AS org_type,
            COALESCE(m.level_laporan, 'LAINNYA')      AS level_laporan,
            m.cluster,
            m.region,
            1 AS is_active
        FROM stg_org_unique u
        LEFT JOIN dim_organisasi d ON d.org_code = u.org_code
        LEFT JOIN mapping_organisasi m ON m.org_code = u.org_code
        WHERE d.org_code IS NULL;
        SQL;
        $db->query($sql);
    }

    /**
     * 4) Sinkronkan atribut dim_organisasi dari mapping_organisasi
     *    (nama, type, level_laporan, parent_org_id, kantor_induk_id, cluster, region)
     */
    protected function syncDimFromMapping($db): void
    {
        // Update nama, type, level_laporan, cluster, region
        $sql1 = <<<SQL
        UPDATE dim_organisasi o
        JOIN mapping_organisasi m ON m.org_code = o.org_code
        SET 
            o.org_name      = COALESCE(m.org_name_override, o.org_name),
            o.org_type      = COALESCE(m.org_type, o.org_type),
            o.level_laporan = COALESCE(m.level_laporan, o.level_laporan),
            o.cluster       = COALESCE(m.cluster, o.cluster),
            o.region        = COALESCE(m.region, o.region);
        SQL;
        $db->query($sql1);

        // parent_org_id dari parent_org_code
        $sql2 = <<<SQL
        UPDATE dim_organisasi o
        JOIN mapping_organisasi m ON m.org_code = o.org_code
        LEFT JOIN dim_organisasi p ON p.org_code = m.parent_org_code
        SET o.parent_org_id = p.org_id
        WHERE m.parent_org_code IS NOT NULL;
        SQL;
        $db->query($sql2);

        // kantor_induk_id dari kantor_induk_code
        $sql3 = <<<SQL
        UPDATE dim_organisasi o
        JOIN mapping_organisasi m ON m.org_code = o.org_code
        LEFT JOIN dim_organisasi ki ON ki.org_code = m.kantor_induk_code
        SET o.kantor_induk_id = ki.org_id
        WHERE m.kantor_induk_code IS NOT NULL;
        SQL;
        $db->query($sql3);
    }

    /**
     * 5) Reload fakta_pegawai untuk snapshot_date tertentu
     *    nip   -> nip
     *    fullname -> nama
     *    org_unit -> join ke dim_organisasi.org_code
     *    peg  -> jenis_pegawai (bebas kamu ganti nanti)
     */
    protected function reloadFaktaPegawai($db, string $snapshotDate): void
    {
        // Hapus data lama untuk tanggal ini, kalau ada
        $db->query('DELETE FROM fakta_pegawai WHERE snapshot_date = ?', [$snapshotDate]);

        // Insert snapshot baru dari staging
        $sql = <<<SQL
        INSERT INTO fakta_pegawai (
            nip,
            nama,
            org_id,
            snapshot_date,
            jenis_pegawai
        )
        SELECT
            p.nip,
            p.fullname,
            d.org_id,
            ? AS snapshot_date,
            p.peg      AS jenis_pegawai
        FROM {$this->stagingTable} p
        JOIN dim_organisasi d ON d.org_code = p.org_unit;
        SQL;
        $db->query($sql, [$snapshotDate]);
    }
}
