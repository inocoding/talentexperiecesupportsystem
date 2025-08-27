<?php $uri = new \CodeIgniter\HTTP\URI(current_url(true));
?>
<li>
    <a href="#dashboarrd" class="<?= $uri->getSegment(1) == "dashboard" ? "active" : null ?>">
        <i data-cs-icon="dashboard-1" class="icon" data-cs-size="18"></i>
        <span class="label">Dashboards</span>
    </a>
    <ul id="dashboarrd">
        <li>
            <a href="<?= site_url('dashboard/dashtd') ?>" class="<?= $uri->getSegment(2) == "dashtd" ? "active" : null ?>">
                <span class="label">Old Dashboard</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('dashboard/ftkdash') ?>" class="<?= $uri->getSegment(2) == "ftkdash" ? "active" : null ?>">
                <span class="label">Dashboard FTK</span>
            </a>
        </li>
    </ul>
</li>
<li>
    <a href="#courses" class="<?= $uri->getSegment(1) == "strukturorg" ? "active" : null ?>">
        <i data-cs-icon="building" class="icon" data-cs-size="18"></i>
        <span class="label">FTK & Organisasi</span>
    </a>
    <ul id="courses">
        <li>
            <a href="<?= site_url('strukturorg') ?>">
                <span class="label">Struktur Organisasi</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('strukturorg/monitoringftk') ?>" class="<?= $uri->getSegment(2) == "monitoringftk" ? "active" : null ?>">
                <span class="label">Monitoring FTK</span>
            </a>
        </li>
    </ul>
</li>
<li>
    <?php $uri = new \CodeIgniter\HTTP\URI(current_url(true));
    ?>
    <a href="#instructors" class="<?= $uri->getSegment(1) == "career" ? "active" : null ?>">
        <i data-cs-icon="destination" class="icon" data-cs-size="15"></i>
        <span class="label">Evaluasi Mutasi</span><span class="position-absolute notification-dot rounded-xl"></span>
    </a>
    <ul id="instructors" class="">
        <li>
            <a href="<?= site_url('career/dashboardevalmutasi') ?>" class="<?= $uri->getSegment(2) == "dashboardevalmutasi" ? "active" : null ?>">
                <i data-cs-icon="dashboard-1" class="icon" data-cs-size="12"></i>
                <span class="label">D-Eval</span>
            </a>
        </li>
        <li>
            <a href="#interface" class="<?= $uri->getSegment(2) == "evaluasimutasi" ? "active" : null ?> <?= $uri->getSegment(2) == "evaluasimutasiaps" ? "active" : null ?>">
                <i data-cs-icon="inbox" class="icon" data-cs-size="12"></i>
                <span class="label">Kotak Masuk</span><span class="badge bg-danger text-small kotak-masuk"></span>
            </a>
            <ul id="interface">
                <li>
                    <a href="<?= site_url('career/evaluasimutasi') ?>" class="<?= $uri->getSegment(2) == "evaluasimutasi" ? "active" : null ?>">
                        <span class="label">Non APS</span><span class="badge bg-danger text-small kotak-masuk-nonaps"></span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('career/evaluasimutasiaps') ?>" class="<?= $uri->getSegment(2) == "evaluasimutasiaps" ? "active" : null ?>">
                        <span class="label">APS</span><span class="badge bg-danger text-small kotak-masuk-aps"></span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?= site_url('career/konsepeval') ?>" class="<?= $uri->getSegment(2) == "konsepeval" ? "active" : null ?>">
                <i data-cs-icon="book" class="icon" data-cs-size="12"></i>
                <span class="label">Konsep</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('career/telusurieval') ?>" class="<?= $uri->getSegment(2) == "telusurieval" ? "active" : null ?>">
                <i data-cs-icon="search" class="icon" data-cs-size="12"></i>
                <span class="label">Telusuri</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('career/lampeval') ?>" class="<?= $uri->getSegment(2) == "lampeval" ? "active" : null ?>">
                <i data-cs-icon="file-text" class="icon" data-cs-size="12"></i>
                <span class="label">Lampiran Evaluasi</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('career/bamutasi') ?>" class="<?= $uri->getSegment(2) == "bamutasi" ? "active" : null ?>">
                <i data-cs-icon="file-text" class="icon" data-cs-size="12"></i>
                <span class="label">Berita Acara Mutasi</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('career/reqkodpos') ?>" class="<?= $uri->getSegment(2) == "reqkodpos" ? "active" : null ?>">
                <i data-cs-icon="file-text" class="icon" data-cs-size="12"></i>
                <span class="label">Request Kode Posisi</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('career/selesaieval') ?>" class="<?= $uri->getSegment(2) == "selesaieval" ? "active" : null ?>">
                <i data-cs-icon="check" class="icon" data-cs-size="12"></i>
                <span class="label">Selesai</span>
            </a>
        </li>
    </ul>
</li>


<!-- <li>
    <a href="#instructors">
        <i data-cs-icon="destination" class="icon" data-cs-size="18"></i>
        <span class="label">Career Management</span>
    </a>
    <ul id="instructors">
        <li>
            <a href="<?= site_url('career') ?>">
                <span class="label">e-Finds</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('pcs/gerbong') ?>">
                <span class="label">Gerbong Suksesi</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('career/fnp') ?>">
                <span class="label">e-FnP</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('career/interview') ?>">
                <span class="label">e-Interview</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('career/evaluasimutasi') ?>">
                <span class="label">Evaluasi Mutasi</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('pcs') ?>">
                <span class="label">e-PCS</span>
            </a>
        </li>
        <li>
            <a href="Instructor.Detail.html">
                <span class="label">e-UPK</span>
            </a>
        </li>
        <li>
            <a href="Instructor.Detail.html">
                <span class="label">Diklat Penjenjangan</span>
            </a>
        </li>
        <li>
            <a href="Instructor.Detail.html">
                <span class="label">FJ</span>
            </a>
        </li>
    </ul>
</li> -->

<!-- <li>
    <a href="#quiz">
        <i data-cs-icon="lecture" class="icon" data-cs-size="18"></i>
        <span class="label">Talent Development</span>
    </a>
    <ul id="quiz">
        <li>
            <a href="<?= site_url('talentdev') ?>">
                <span class="label">Internship</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('talentdev/eksternal') ?>">
                <span class="label">Diklat/Sertifikasi Eks</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('talentdev/internal') ?>">
                <span class="label">Penugasan Pusdiklat</span>
            </a>
        </li>
    </ul>
</li> -->
<!-- <li>
    <a href="#paths">
        <i data-cs-icon="health" class="icon" data-cs-size="18"></i>
        <span class="label">Internship</span>
    </a>
</li> -->
<!-- <li>
    <a href="#paths">
        <i data-cs-icon="heart" class="icon" data-cs-size="18"></i>
        <span class="label">e-Care</span>
    </a>
</li> -->
<li>
    <a href="#miscellaneous" class="<?= $uri->getSegment(1) == "anggaran" ? "active" : null ?>">
        <i data-cs-icon="wallet" class="icon" data-cs-size="18"></i>
        <span class="label">Anggaran</span>
    </a>
    <ul id="miscellaneous">
        <li>
            <a href="<?= site_url('anggaran') ?>" class="<?= $uri->getSegment(1) == "anggaran" ? "active" : null ?>">
                <i data-cs-icon="dashboard-1" class="icon" data-cs-size="12"></i>
                <span class="label">D-Anggaran</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('anggaran') ?>">
                <i data-cs-icon="leaf" class="icon" data-cs-size="12"></i>
                <span class="label">Pos 52</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('anggaran/pos53') ?>">
                <i data-cs-icon="leaf" class="icon" data-cs-size="12"></i>
                <span class="label">Pos 53</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('anggaran/pos54') ?>">
                <i data-cs-icon="leaf" class="icon" data-cs-size="12"></i>
                <span class="label">Pos 54</span>
            </a>
        </li>
    </ul>
</li>
<!-- <li>
    <a href="#paths">
        <i data-cs-icon="tv" class="icon" data-cs-size="18"></i>
        <span class="label">Wasnaker</span>
    </a>
</li> -->
<li>
    <a href="#miscellaneous2" class="<?= $uri->getSegment(1) == "masterdata" ? "active" : null ?>">
        <i data-cs-icon="database" class="icon" data-cs-size="15"></i>
        <span class="label">Master Data</span>
    </a>
    <ul id="miscellaneous2">
        <li>
            <a href="<?= site_url('masterdata/dapeghtd') ?>" class="<?= $uri->getSegment(2) == "dapeghtd" ? "active" : null ?>">
                <span class="label">User</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('masterdata') ?>" class="<?= $uri->getSegment(1) == "masterdata" and $uri->getSegment(2) == null ? "active" : null ?>">
                <span class="label">Data Pegawai</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('masterdata/rjab') ?>" class="<?= $uri->getSegment(2) == "rjab" ? "active" : null ?>">
                <span class="label">Data Riwayat Jabatan </span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('') ?>" class="">
                <span class="label">Data Riwayat Pendidikan </span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('') ?>" class="">
                <span class="label">Data Talent </span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('') ?>" class="">
                <span class="label">Data PTB </span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('masterdata/pensiundini') ?>" class="<?= $uri->getSegment(2) == "pensiundini" ? "active" : null ?>">
                <span class="label">Pensiun Dini </span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('masterdata/sertifikasi') ?>" class="<?= $uri->getSegment(2) == "sertifikasi" ? "active" : null ?>">
                <span class="label">Data Sertifikasi </span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('masterdata/datamutasi') ?>" class="<?= $uri->getSegment(2) == "datamutasi" ? "active" : null ?>">
                <span class="label">Data Mutasi </span>
            </a>
        </li>
    </ul>
</li>