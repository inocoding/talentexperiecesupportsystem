<?php helper('auth'); ?>
<?php $uri = new \CodeIgniter\HTTP\URI(current_url(true)); ?>

<li>
    <a href="#dashboarrd" class="<?= $uri->getSegment(1) == "dashboard" ? "active" : null ?>">
        <i data-cs-icon="dashboard-1" class="icon" data-cs-size="18"></i>
        <span class="label">Dashboards</span>
    </a>
    <ul id="dashboarrd">
        <!-- <li>
            <a href="<?= site_url('dashboard/dashtd') ?>" class="<?= $uri->getSegment(2) == "dashtd" ? "active" : null ?>">
                <span class="label">Old Dashboard</span>
            </a>
        </li> -->
        <li>
            <a href="<?= site_url('dashboard/ftkdash') ?>" class="<?= $uri->getSegment(2) == "ftkdash" ? "active" : null ?>">
                <span class="label">Dashboard FTK</span>
            </a>
        </li>
        <li>
            <a href="<?= site_url('dashboard/ftkdash') ?>" class="<?= $uri->getSegment(2) == "ftkdash" ? "active" : null ?>">
                <span class="label">Dashboard APS</span>
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
    <a href="#instructors" class="<?= isActive([1=>'career']) ?>">
        <i data-cs-icon="startup" class="icon" data-cs-size="15"></i>
        <span class="label">Evaluasi Mutasi</span>
    </a>
    <ul id="instructors">
        <?php
            menuItem('D-Evaluasi Mutasi', 'career/dashboardevalmutasi', 'role_mutasi', 'dashboard-1', [1=>'career',2=>'dashboardevalmutasi']);
            menuItem('Draft Evaluasi', 'career/konsepeval', 'role_mutasi', 'book', [1=>'career',2=>'konsepeval']);
            menuItem('Evaluasi Non APS', 'career/evaluasimutasi', 'role_mutasi', 'plane', [1=>'career',2=>'evaluasimutasi']);
            menuItem('Evaluasi APS', 'career/evaluasimutasiaps', 'role_mutasi', 'flag', [1=>'career',2=>'evaluasimutasiaps']);
            menuItem('Progess Evaluasi', 'career/telusurieval', 'role_mutasi', 'form-check', [1=>'pcs',2=>'telusurieval']);
            menuItem('Evaluasi Selesai', 'career/selesaieval', 'role_mutasi', 'archive', [1=>'pcs',2=>'selesaieval']);
        ?>
        <li>
            <a href="#dokumenPrint" class="<?= isActive([2=>'lampeval']) ?>">
                <i data-cs-icon="print" class="icon" data-cs-size="12"></i>
                <span class="label">File to Print</span>
            </a>
            <ul id="dokumenPrint">
                <?php
                    menuItem('D-Evaluasi Mutasi', 'career/dashboardevalmutasi', 'role_mutasi', 'dashboard-1', [1=>'career',2=>'dashboardevalmutasi']);
                    
                ?>
            </ul>
        </li>
    </ul>
</li>

<li>
    <?php $uri = new \CodeIgniter\HTTP\URI(current_url(true));
    ?>
    <a href="#instructors" class="<?= $uri->getSegment(1) == "career" ? "active" : null ?>">
        <i data-cs-icon="startup" class="icon" data-cs-size="15"></i>
        <span class="label">Evaluasi Mutasi</span><span class="position-absolute notification-dot rounded-xl"></span>
    </a>
    <ul id="instructors" class="">
        
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

<li>
    <a href="#instructors1" class="<?= isActive([1=>'career']) ?>">
        <i data-cs-icon="destination" class="icon" data-cs-size="15"></i>
        <span class="label">Career Management</span>
    </a>
    <ul id="instructors1">
        <?php
            menuItem('Cari Kandidat', 'career', 'role_mutasi', 'search', [1=>'career',2=>null]);
            menuItem('FnP Test', 'career/fnp', 'role_mutasi', 'circle', [1=>'career',2=>'fnp']);
            menuItem('Interview', 'career/interview', 'role_mutasi', 'circle', [1=>'career',2=>'interview']);
            menuItem('Gerbong Suksesi', 'pcs/gerbong', 'role_mutasi', 'circle', [1=>'pcs',2=>'gerbong']);
        ?>
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
    <a href="#miscellaneous" class="<?= isActive([1=>'anggaran']) ?>">
        <i data-cs-icon="wallet" class="icon" data-cs-size="15"></i>
        <span class="label">Anggaran</span>
    </a>
    <ul id="miscellaneous">
        <?php
            menuItem('D-Anggaran', 'anggaran', 'role_anggaran', 'dashboard-1', [1=>'anggaran',2=>null]);
            menuItem('Pos 52', 'anggaran', 'role_adm_anggaran', 'leaf', [1=>'anggaran',2=>'pos52']);
            menuItem('Pos 53', 'anggaran/pos53', 'role_adm_anggaran', 'leaf', [1=>'anggaran',2=>'pos53']);
            menuItem('Pos 54', 'anggaran/pos54', 'role_adm_anggaran', 'leaf', [1=>'anggaran',2=>'pos54']);
        ?>
    </ul>
</li>

<li>
  <a href="#miscellaneous2" class="<?= isActive([1=>'masterdata']) ?>">
    <i data-cs-icon="database" class="icon" data-cs-size="15"></i>
    <span class="label">Master Data</span>
  </a>

  <ul id="miscellaneous2">
    <?php
      // User (butuh role_user)
      menuItem('User', 'masterdata/dapeghtd', 'role_user', 'circle', [1=>'masterdata',2=>'dapeghtd']);

      // Data Pegawai (butuh role_dapeg)
      menuItem('Data Pegawai', 'masterdata', 'role_dapeg', 'circle', [1=>'masterdata',2=>null]);

      // Data Organisasi HTD (butuh role_organisasi)
      menuItem('Data Organisasi HTD', 'masterdata/viewdataorghtd', 'role_organisasi', 'circle', [1=>'masterdata',2=>'viewdataorghtd']);
      menuItem('Data Organisasi Level #1', 'masterdata/viewdataorgsatu', 'role_organisasi', 'circle', [1=>'masterdata',2=>'viewdataorgsatu']);
      menuItem('Data Organisasi Level #2', 'masterdata/viewdataorgdua', 'role_organisasi', 'circle', [1=>'masterdata',2=>'viewdataorgdua']);
      menuItem('Data Organisasi Level #3', 'masterdata/viewdataorgtiga', 'role_organisasi', 'circle', [1=>'masterdata',2=>'viewdataorgtiga']);

      // Riwayat
      menuItem('Data Riwayat Jabatan', 'masterdata/rjab', 'role_dapeg', 'circle', [1=>'masterdata',2=>'rjab']);
      menuItem('Data Riwayat Sertifikasi', 'masterdata/sertifikasi', 'role_dapeg', 'circle', [1=>'masterdata',2=>'sertifikasi']);

      // Lain-lain (role spesifik)
      menuItem('Data PTB', 'masterdata/data_ptb', 'role_ptb', 'circle', [1=>'masterdata',2=>'data_ptb']);
      menuItem('Data Pensiun Dini', 'masterdata/data_pensiun_dini', 'role_pensiun_dini', 'circle', [1=>'masterdata',2=>'data_pensiun_dini']);
      menuItem('Data MPP', 'masterdata/view_mpp', 'role_mpp', 'circle', [1=>'masterdata',2=>'view_mpp']);
      menuItem('Data Mutasi', 'masterdata/viewmutasi', 'role_mutasi', 'circle', [1=>'masterdata',2=>'viewmutasi']);
      menuItem('Data Tugas Karya', 'masterdata/viewtk', 'role_tugas_karya', 'circle', [1=>'masterdata',2=>'viewtk']);
      menuItem('Data Resign', 'masterdata/viewresign', 'role_resign', 'circle', [1=>'masterdata',2=>'viewresign']);
      menuItem('Data OJT', 'masterdata/viewojt', 'role_ojt', 'circle', [1=>'masterdata',2=>'viewojt']);
      menuItem('Data IDT', 'masterdata/viewidt', 'role_idt', 'circle', [1=>'masterdata',2=>'viewidt']);

      // APS (bolehkan admin FNP juga? tinggal array)
      menuItem('Data APS', 'masterdata/viewdataaps', ['role_aps','role_fnp_admin'], 'circle', [1=>'masterdata',2=>'viewdataaps']);
    ?>
  </ul>
</li>