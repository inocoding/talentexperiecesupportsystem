<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>e-Profile <?= ucwords(strtolower(userLogin()->nama_user)) ?></title>
<?= $this->endSection() ?>

<?= $this->section('cssheader') ?>
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/bootstrap.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/OverlayScrollbars.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/select2.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/select2-bootstrap4.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/bootstrap-datepicker3.standalone.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/datatables.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/dropzone.min.css" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="page-title-container">
    <div class="row">
        <!-- Title Start -->
        <div class="col-12 col-md-7">
            <h2 class="mb-2 pb-0" id="title">e-Profile</h2>
        </div>
        <!-- Title End -->
    </div>
</div>
<!-- Title and Top Buttons End -->

<div class="row">
    <!-- Left Side Start -->
    <div class="col-12 col-xl-4 col-xxl-3">
        <!-- Biography Start -->
        <div class="card mb-5">
            <div class="card-body">
                <div class="d-flex align-items-center flex-column mb-4">
                    <div class="d-flex align-items-center flex-column">
                        <div class="sw-13 position-relative mb-3">
                            <?php
                            if (userLogin()->foto_profile != null) {
                                echo '<img class="img-fluid rounded-xl" alt="thumb" src="' . base_url() . '/template/img/profile/' . userLogin()->foto_profile . '" />';
                            } else {
                                echo '<img class="img-fluid rounded-xl" alt="thumb" src="' . base_url() . '/template/img/profile/profile-11.jpg" />';
                            }
                            ?>
                        </div>
                        <div class="h5 mb-0"><?= ucwords(strtolower(userLogin()->nama_user)) ?></div>
                        <div class="text-muted mb-0 text-center"><small><?= ucwords(strtolower(userLogin()->sebutan_jabatan)); ?></small></div>
                        <div class="text-muted text-center">
                            <small>
                                <?php
                                if (userLogin()->role_htd == 4) {
                                    echo ucwords(strtolower(userLogin()->nama_org_tiga));
                                } elseif (userLogin()->role_htd != 4) {
                                    echo ucwords(strtolower(userLogin()->nama_org_htd));
                                }
                                ?>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="nav flex-column" role="tablist">
                    <a class="nav-link active px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#overviewTab" role="tab">
                        <i data-cs-icon="activity" class="me-2" data-cs-size="17"></i>
                        <span class="align-middle">Overview</span>
                    </a>
                    <a class="nav-link px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#rjabTab" role="tab">
                        <i data-cs-icon="flash" class="me-2" data-cs-size="17"></i>
                        <span class="align-middle">Riwayat Jabatan</span>
                    </a>
                    <a class="nav-link px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#rpendTab" role="tab">
                        <i data-cs-icon="toy" class="me-2" data-cs-size="17"></i>
                        <span class="align-middle">Riwayat Pendidikan</span>
                    </a>
                    <a class="nav-link px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#projectsTab" role="tab">
                        <i data-cs-icon="badge" class="me-2" data-cs-size="17"></i>
                        <span class="align-middle">Sertifikasi</span>
                    </a>
                    <a class="nav-link px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#friendsTab" role="tab">
                        <i data-cs-icon="list" class="me-2" data-cs-size="17"></i>
                        <span class="align-middle">Task List</span>
                        <span class="badge bg-secondary d-none" style="margin-left: 10px;">9</span>
                    </a>
                    <a class="nav-link px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#aboutTab" role="tab">
                        <i data-cs-icon="settings-1" class="me-2" data-cs-size="17"></i>
                        <span class="align-middle">Setting</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- Biography End -->
    </div>
    <!-- Left Side End -->

    <!-- Right Side Start -->
    <div class="col-12 col-xl-8 col-xxl-9 mb-5 tab-content">
        <!-- Overview Tab Start -->
        <div class="tab-pane fade show active" id="overviewTab" role="tabpanel">
            <!-- Stats Start -->
            <h2 class="small-title">Statistik</h2>
            <div class="mb-5">
                <div class="row g-2">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card hover-border-primary">
                            <div class="card-body">
                                <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                    <span>Masa Kerja</span>
                                    <i data-cs-icon="suitcase" class="text-primary"></i>
                                </div>
                                <div class="text-small text-muted mb-1"></div>
                                <div class="cta-1 text-primary" style="font-size: 15px;">
                                    <?php
                                    function hitung_umur($tanggal_lahir)
                                    {
                                        $birthDate = new DateTime($tanggal_lahir);
                                        $today = new DateTime("today");
                                        if ($birthDate > $today) {
                                            exit("0 tahun 0 bulan");
                                        }
                                        $y = $today->diff($birthDate)->y;
                                        return $y;
                                    }

                                    $awal  = date_create(userLogin()->tgl_lahir);
                                    $akhir = date_create(userLogin()->tgl_masuk);
                                    $diff  = date_diff($awal, $akhir);
                                    $masakerja = 56 - $diff->y;

                                    echo hitung_umur(userLogin()->tgl_masuk);
                                    echo " / ";
                                    echo $masakerja . ' Tahun';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card hover-border-primary">
                            <div class="card-body">
                                <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                    <span>Jabatan Terakhir</span>
                                    <i data-cs-icon="check-square" class="text-primary"></i>
                                </div>
                                <div class="text-small text-muted mb-1"></div>
                                <div class="cta-1 text-primary" style="font-size: 15px;">
                                    <?php
                                    function hitung_masa_kerja($tanggal)
                                    {
                                        $start_date = new DateTime($tanggal);
                                        $today      = new DateTime("today");
                                        $jarak_tgl  = $today->diff($start_date);

                                        $jumlah_hari_dari_tahun = $jarak_tgl->y * 365;
                                        $jumlah_hari_dari_bulan = $jarak_tgl->m * 30;
                                        $jumlah_hari_dari_hari = $jarak_tgl->d;
                                        $hasil = $jumlah_hari_dari_tahun + $jumlah_hari_dari_bulan + $jumlah_hari_dari_hari;
                                        return $hasil;
                                    }

                                    $durasi_hari = hitung_masa_kerja(userLogin()->start_date_jabatan) + $jumlah->jumlah;
                                    $sisa_bagi_tahun = $durasi_hari % 365;
                                    $durasi_tahun = ($durasi_hari - $sisa_bagi_tahun) / 365;
                                    $sisa_bagi_bulan = $sisa_bagi_tahun % 30;
                                    $durasi_bulan = ($sisa_bagi_tahun - $sisa_bagi_bulan) / 30;

                                    echo $durasi_tahun . " Tahun " . $durasi_bulan . " bulan";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card hover-border-primary">
                            <div class="card-body">
                                <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                    <span>My List</span>
                                    <i data-cs-icon="file-empty" class="text-primary"></i>
                                </div>
                                <div class="text-small text-muted mb-1"></div>
                                <div class="cta-1 text-primary" style="font-size: 15px;">3 Task</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card hover-border-primary">
                            <div class="card-body">
                                <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                    <span>Talenta</span>
                                    <i data-cs-icon="screen" class="text-primary"></i>
                                </div>
                                <div class="text-small text-muted mb-1"></div>
                                <div class="cta-1 text-primary" style="font-size: 15px;">5 Aktif</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Stats End -->


            <!-- Activity Start -->
            <h2 class="small-title">Tentang Saya</h2>
            <div class="card mb-5">
                <div class="card-body">
                    <div class="mb-5">
                        <!-- Hoverable Rows Start -->
                        <table class="table table-hover table-borderless">
                            <tbody>
                                <tr>
                                    <th scope="row" width="150px">Nama</th>
                                    <td width="20px">:</td>
                                    <td><?= $dapeg->nama_user ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="150px">NIPEG</th>
                                    <td width="20px">:</td>
                                    <td><?= $dapeg->nip ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="150px">Agama</th>
                                    <td width="20px">:</td>
                                    <td><?= $dapeg->agama ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="150px">Jabatan</th>
                                    <td width="20px">:</td>
                                    <td><?= $dapeg->sebutan_jabatan ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="150px">Grade</th>
                                    <td width="20px">:</td>
                                    <td><?= $dapeg->grade ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="150px">Nomor SAP</th>
                                    <td width="20px">:</td>
                                    <td><?= $dapeg->no_sap ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="150px">TTL</th>
                                    <td width="20px">:</td>
                                    <td><?= $dapeg->tempat_lahir ?>, <?= $dapeg->tgl_lahir ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="150px">No HP</th>
                                    <td width="20px">:</td>
                                    <td><?= $dapeg->no_hp ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="150px">Tanggal Masuk</th>
                                    <td width="20px">:</td>
                                    <td><?= $dapeg->tgl_masuk ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="150px">Tanggal Capeg</th>
                                    <td width="20px">:</td>
                                    <td><?= $dapeg->tgl_capeg ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" width="150px">Tanggal Peg</th>
                                    <td width="20px">:</td>
                                    <td><?= $dapeg->tgl_peg_tetap ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- Hoverable Rows End -->
                    </div>
                </div>
            </div>
            <!-- Activity End -->
        </div>
        <!-- Overview Tab End -->

        <!-- Rjab Tab Start -->
        <div class="tab-pane fade" id="rjabTab" role="tabpanel">
            <!-- Timeline Start -->
            <h2 class="small-title">Riwayat Jabatan</h2>
            <div class="card mb-5">
                <div class="card-body">
                    <?php foreach ($rjab as $key => $value) : ?>
                        <div class="row g-0">
                            <div class="col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4">
                                <div class="w-100 d-flex sh-1"></div>
                                <div class="rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center">
                                    <div class="bg-gradient-primary sw-1 sh-1 rounded-xl position-relative"></div>
                                </div>
                                <div class="w-100 d-flex h-100 justify-content-center position-relative">
                                    <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                                </div>
                            </div>
                            <div class="col mb-4">
                                <div class="h-100">
                                    <div class="d-flex flex-column justify-content-start">
                                        <div class="d-flex flex-column">
                                            <p class="heading stretched-link"><?= $value->nama_formasi_jabatan ?></p>
                                            <div class="text-alternate"><?= date('d.m.Y', strtotime($value->start_date)) ?> - <?= date('d.m.Y', strtotime($value->end_date)) ?></div>
                                            <div class="text-muted mt-1" style="font-size: 12px;">
                                                <small>
                                                    <em>
                                                        <?= $value->nama_formasi_jabatan ?> <br>
                                                        Pada <?= $value->nama_riwayat_org_unit ?> <br>
                                                        <?= $value->nama_org_tiga ?>, <?= $value->nama_org_dua ?> <br>
                                                        <?= $value->nama_org_satu ?>
                                                    </em>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- Timeline End -->
        </div>
        <!-- Rjab Tab End -->

        <!-- Rpend Tab Start -->
        <div class="tab-pane fade" id="rpendTab" role="tabpanel">
            <!-- Timeline Start -->
            <h2 class="small-title">Pendidikan Formal</h2>
            <div class="card mb-5">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tingkat/Jurusan</th>
                                <th scope="col">Sejak</th>
                                <th scope="col">Hingga</th>
                                <th scope="col">Lembaga Pendidikan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($rpend as $key => $value) : ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $value->tingkat ?></td>
                                    <td><?= date('d.m.Y', strtotime($value->start_date)) ?></td>
                                    <td><?= date('d.m.Y', strtotime($value->end_date)) ?></td>
                                    <td><?= $value->nama_institusi ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Timeline End -->
        </div>
        <!-- Rjab Tab End -->

        <!-- Projects Tab Start -->
        <div class="tab-pane fade" id="projectsTab" role="tabpanel">
            <h2 class="small-title">Sertifikasi</h2>
            <!-- Projects Content Start -->
            <div class="row">
                <div class="col">
                    <!-- Title and Top Buttons Start -->
                    <div class="page-title-container">
                        <div class="row">
                            <!-- Top Buttons Start -->
                            <div class="col-12 col-md-5 d-flex align-items-start float-right">
                                <!-- Add New Button Start -->
                                <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start w-100 w-md-auto add-datatable">
                                    <i data-cs-icon="plus"></i>
                                    <span>Add New</span>
                                </button>
                                <!-- Add New Button End -->

                                <!-- Check Button Start -->
                                <div class="btn-group ms-1 check-all-container">
                                    <div class="btn btn-outline-primary btn-custom-control p-0 ps-3 pe-2" id="datatableCheckAllButton">
                                        <span class="form-check float-end">
                                            <input type="checkbox" class="form-check-input" id="datatableCheckAll" />
                                        </span>
                                    </div>
                                    <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-offset="0,3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-submenu></button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <div class="dropdown-divider"></div>
                                        <button class="dropdown-item disabled delete-datatable" type="button">Delete</button>
                                    </div>
                                </div>
                                <!-- Check Button End -->
                            </div>
                            <!-- Top Buttons End -->
                        </div>
                    </div>
                    <!-- Title and Top Buttons End -->

                    <!-- Content Start -->
                    <div class="data-table-rows slim">
                        <!-- Controls Start -->
                        <div class="row">
                            <!-- Search Start -->
                            <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
                                <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
                                    <input class="form-control datatable-search" placeholder="Search" data-datatable="#datatableRows" />
                                    <span class="search-magnifier-icon">
                                        <i data-cs-icon="search"></i>
                                    </span>
                                    <span class="search-delete-icon d-none">
                                        <i data-cs-icon="close"></i>
                                    </span>
                                </div>
                            </div>
                            <!-- Search End -->

                            <div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-end mb-1">
                                <div class="d-inline-block me-0 me-sm-3 float-start float-md-none">
                                    <!-- Add Button Start -->
                                    <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow add-datatable" data-bs-toggle="tooltip" data-bs-placement="top" title="Add" type="button" data-bs-delay="0">
                                        <i data-cs-icon="plus"></i>
                                    </button>
                                    <!-- Add Button End -->

                                    <!-- Edit Button Start -->
                                    <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow edit-datatable disabled" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" type="button" data-bs-delay="0">
                                        <i data-cs-icon="edit"></i>
                                    </button>
                                    <!-- Edit Button End -->

                                    <!-- Delete Button Start -->
                                    <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow disabled delete-datatable" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" type="button" data-bs-delay="0">
                                        <i data-cs-icon="bin"></i>
                                    </button>
                                    <!-- Delete Button End -->
                                </div>
                                <div class="d-inline-block">
                                    <!-- Print Button Start -->
                                    <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow datatable-print" data-datatable="#datatableRows" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-delay="0" title="Print" type="button">
                                        <i data-cs-icon="print"></i>
                                    </button>
                                    <!-- Print Button End -->

                                    <!-- Export Dropdown Start -->
                                    <div class="d-inline-block datatable-export" data-datatable="#datatableRows">
                                        <button class="btn p-0" data-bs-toggle="dropdown" type="button" data-bs-offset="0,3">
                                            <span class="btn btn-icon btn-icon-only btn-foreground-alternate shadow dropdown" data-bs-delay="0" data-bs-placement="top" data-bs-toggle="tooltip" title="Export">
                                                <i data-cs-icon="download"></i>
                                            </span>
                                        </button>
                                        <div class="dropdown-menu shadow dropdown-menu-end">
                                            <button class="dropdown-item export-copy" type="button">Copy</button>
                                            <button class="dropdown-item export-excel" type="button">Excel</button>
                                            <button class="dropdown-item export-cvs" type="button">Cvs</button>
                                        </div>
                                    </div>
                                    <!-- Export Dropdown End -->

                                    <!-- Length Start -->
                                    <div class="dropdown-as-select d-inline-block datatable-length" data-datatable="#datatableRows" data-childSelector="span">
                                        <button class="btn p-0 shadow" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-offset="0,3">
                                            <span class="btn btn-foreground-alternate dropdown-toggle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-delay="0" title="Item Count">
                                                10 Items
                                            </span>
                                        </button>
                                        <div class="dropdown-menu shadow dropdown-menu-end">
                                            <a class="dropdown-item" href="#">5 Items</a>
                                            <a class="dropdown-item active" href="#">10 Items</a>
                                            <a class="dropdown-item" href="#">20 Items</a>
                                        </div>
                                    </div>
                                    <!-- Length End -->
                                </div>
                            </div>
                        </div>
                        <!-- Controls End -->

                        <!-- Table Start -->
                        <div class="data-table-responsive-wrapper">
                            <table id="datatableRows" class="data-table nowrap hover">
                                <thead>
                                    <tr>
                                        <th class="text-muted text-small text-uppercase">Judul Sertifikasi</th>
                                        <th class="text-muted text-small text-uppercase">No Sertifikat</th>
                                        <th class="text-muted text-small text-uppercase">Tanggal Awal</th>
                                        <th class="text-muted text-small text-uppercase">Tanggal Akhir</th>
                                        <th class="text-muted text-small text-uppercase">Tag</th>
                                        <th class="empty">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Human Capital Supervisor</td>
                                        <td>70209.2423.4.0010309.2021</td>
                                        <td>15.04.2021</td>
                                        <td>15.04.2024</td>
                                        <td>Masih Aktif</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Pelaksanaan Baca Meter & Tagihan Listrik</td>
                                        <td>02.DHR.21.1345.0</td>
                                        <td>13.07.2021</td>
                                        <td>13.07.2024</td>
                                        <td>Masih Aktif</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Pembinaan Pengawasan Norma K3</td>
                                        <td>5.614.AS.02.04.V.2021</td>
                                        <td>10.03.2021</td>
                                        <td>10.03.2024</td>
                                        <td>Masih Aktif</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Table End -->
                    </div>
                    <!-- Content End -->
                </div>
            </div>
            <!-- Projects Content End -->
        </div>
        <!-- Projects Tab End -->

        <!-- Friends Tab Start -->
        <div class="tab-pane fade" id="friendsTab" role="tabpanel">

            <div class="row">
                <div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-end mb-1">
                    <div class="d-inline-block me-0 me-sm-3 float-start">
                        <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                            <i data-cs-icon="more-horizontal" data-cs-size="15"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end shadow">
                            <a class="dropdown-item" href="#" id="monthView">Eko</a>
                            <a class="dropdown-item" href="#" id="weekView">Dwi</a>
                            <a class="dropdown-item" href="#" id="dayView">Tri</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" id="goToday">Saya</a>
                        </div>
                        <!-- Add Button Start -->
                        <button id="addTask" class="btn btn-icon btn-icon-only btn-foreground-alternate shadow" data-bs-toggle="tooltip" data-bs-placement="top" title="Add" type="button" data-bs-delay="0">
                            <i data-cs-icon="plus"></i>
                        </button>
                        <!-- Add Button End -->
                    </div>
                </div>
                <div class="col-12 d-none" id="addForm">
                    <form id="formAdd">
                        <?= csrf_field() ?>
                        <div class="input-group mt-2 mb-2 float-end">
                            <input name="deskripsi_list" id="deskripsi_list" type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Add</button>
                        </div>
                        <input type="hidden" name="list_nip" id="list_nip" value="<?= userLogin()->nip ?>">
                        <input type="hidden" name="start_date_list" id="start_date_list" value="<?= date('Y-m-d') ?>">
                    </form>
                </div>
                <div class="col-12">
                    <h2 class="small-title mt-3 mb-0">Task - <?= ucwords(strtolower(userLogin()->nama_user)) ?></h2>
                    <div class="card">
                        <div class="card-body">
                            <!-- Tasks Start -->
                            <?= view($tasklist) ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-5">
                    <h2 class="small-title mt-2 mb-0">Finish Task</h2>
                    <div class="card">
                        <div class="card-body scroll-out">
                            <div class="scroll sh-35">
                                <table class="table table-borderless">
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($finish as $key => $value) : ?>
                                            <tr>
                                                <td width="5px"><?= $no++ ?></td>
                                                <td>
                                                    <div class="mb-2 scroll-item">
                                                        <label class="form-check w-100 checked-line-through checked-opacity-75">
                                                            <span class="form-check-label d-block">
                                                                <span><?= $value->deskripsi_list ?></span>
                                                                <span class="text-muted d-block text-small mt-0"><?= $value->start_date_list ?></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tasks End -->
            </div>
        </div>
        <!-- Friends Tab End -->

        <!-- About Tab Start -->
        <div class="tab-pane fade" id="aboutTab" role="tabpanel">
            <h2 class="small-title">Ubah No HP</h2>
            <div class="card mb-5">
                <div class="card-body">
                    <form>
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">No Handphone Baru</label>
                            <div class="col-sm-8 col-md-9 col-lg-10">
                                <input type="number" class="form-control" value="<?= $dapeg->no_hp ?>" />
                            </div>
                        </div>
                        <div class="mb-3 row mt-5">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            <div class="col-sm-8 col-md-9 col-lg-10 float-right">

                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <h2 class="small-title">Ubah Password</h2>
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Password Sekarang</label>
                            <div class="col-sm-8 col-md-9 col-lg-10">
                                <input type="password" class="form-control" value="" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Password Baru</label>
                            <div class="col-sm-8 col-md-9 col-lg-10">
                                <input type="password" class="form-control" value="" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Konfirmasi Password Baru</label>
                            <div class="col-sm-8 col-md-9 col-lg-10">
                                <input type="password" class="form-control" value="" />
                            </div>
                        </div>
                        <div class="mb-3 row mt-5">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            <div class="col-sm-8 col-md-9 col-lg-10 float-right">

                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- <h2 class="small-title mt-5">Foto</h2> -->
            <!-- <div class="card">
                <div class="card-body">
                    <form>
                        <div class="mb-3 row card">
                            <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Upload Foto</label>
                            <div class="dropzone" id="dropzoneImage"></div>
                        </div>
                        <div class="mb-3 row mt-5">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            <div class="col-sm-8 col-md-9 col-lg-10 float-right">

                            </div>
                        </div>
                    </form>
                </div>
            </div> -->
        </div>
        <!-- About Tab End -->
    </div>
    <!-- Right Side End -->
</div>
<?= $this->endSection() ?>

<?= $this->section('jsfooter') ?>
<!-- Vendor Scripts Start -->
<script src="<?= base_url() ?>/template/js/vendor/jquery-3.5.1.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/OverlayScrollbars.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/autoComplete.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/clamp.min.js"></script>
<script src="<?= base_url() ?>/template/js/cs/scrollspy.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/select2.full.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/datepicker/locales/bootstrap-datepicker.es.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/jquery.validate/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/jquery.validate/additional-methods.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/bootstrap-submenu.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/datatables.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/mousetrap.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/dropzone.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/singleimageupload.js"></script>
<!-- Vendor Scripts End -->

<!-- Template Base Scripts Start -->
<script src="<?= base_url() ?>/template/font/CS-Line/csicons.min.js"></script>
<script src="<?= base_url() ?>/template/js/base/helpers.js"></script>
<script src="<?= base_url() ?>/template/js/base/globals.js"></script>
<script src="<?= base_url() ?>/template/js/base/nav.js"></script>
<script src="<?= base_url() ?>/template/js/base/search.js"></script>
<script src="<?= base_url() ?>/template/js/base/settings.js"></script>
<script src="<?= base_url() ?>/template/js/base/init.js"></script>
<!-- Template Base Scripts End -->

<!-- Page Specific Scripts Start -->
<script src="<?= base_url() ?>/template/js/forms/genericforms.js"></script>
<script src="<?= base_url() ?>/template/js/cs/datatable.extend.js"></script>
<script src="<?= base_url() ?>/template/js/plugins/datatable.editablerows.js"></script>
<script src="<?= base_url() ?>/template/js/cs/dropzone.templates.js"></script>
<script src="<?= base_url() ?>/template/js/forms/controls.dropzone.js"></script>
<script src="<?= base_url() ?>/template/js/common.js"></script>
<script src="<?= base_url() ?>/template/js/scripts.js"></script>
<!-- Page Specific Scripts End -->

<script>
    $(document).ready(function() {
        // function reload_form() {
        //     $.ajax({
        //         url: "<?= site_url('dashboard/getForm') ?>",
        //         success: function(data) {
        //             $("#addForm").html(data);
        //         }
        //     });
        // }

        $("#addTask").click(function() {
            $(this).fadeOut(600);
            $("#addForm").fadeIn("slow");
            $("#addForm").removeClass("d-none");
            $("#addForm").addClass("d-block");
        });

        function reload_list() {
            $.ajax({
                url: "<?= site_url('dashboard/getList') ?>",
                beforeSend: function(f) {
                    $('#tabel_list').html('Working on it...');
                },
                success: function(data) {
                    $("#tabel_list").html(data);
                }
            });
        }
        $("#button-addon2").on('click', function() {
            $.ajax({
                url: "<?= site_url('dashboard/addList') ?>",
                type: "POST",
                data: $('#formAdd').serialize(),
                success: function(data) {
                    reload_list();
                    $("#addForm").fadeIn();
                    $("#addForm").removeClass("d-block");
                    $("#addForm").addClass("d-none");
                    $("#addTask").fadeIn();
                }
            });

        });
    });
</script>

<?= $this->endSection() ?>