<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Evaluasi Mutasi</title>
<?= $this->endSection() ?>

<?= $this->section('cssheader') ?>
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/bootstrap.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/OverlayScrollbars.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/datatables.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/select2.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/select2-bootstrap4.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/bootstrap-datepicker3.standalone.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/dropzone.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/glide.core.min.css" />



<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="page-title-container">
    <div class="row">
        <!-- Title Start -->
        <div class="col-12 col-md-7">
            <h4 class="mb-2 pb-0" id="title">Evaluasi Mutasi</h4>
        </div>
        <!-- Title End -->
    </div>
</div>
<!-- Title and Top Buttons End -->
<div class="row">
    <!-- Left Side Start -->

    <!-- Left Side End -->
    <!-- Right Side Start -->
    <div class="col-12 col-xl-12 col-xxl-12 mb-5 tab-content">
        <!-- Projects Tab Start -->
        <div class="tab-pane fade show active" id="projectsTab" role="tabpanel">
            <h2 class="small-title">Telusuri</h2>
            <div class="card">
                <div class="card-body">
                    <div class="col">
                        <!-- Title and Top Buttons Start -->
                        <div class="page-title-container" style="margin-top: -30px;">
                            <div class="row">
                                <?php if (session()->getFlashdata('error')) : ?>
                                    <div class="alert alert-danger alert-dismissable show fade mt-3" role="alert">
                                        <?= session()->getFlashdata('error') ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                                <?php if (session()->getFlashdata('success')) : ?>
                                    <div class="alert alert-success alert-dismissable show fade mt-3" role="alert">
                                        <?= session()->getFlashdata('success') ?>
                                        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- Title and Top Buttons End -->


                        <!-- Content Start -->
                        <div class="data-table-rows slim">
                            <!-- Controls Start -->
                            <form action="" method="get" autocomplete="off">
                                <div class="row">
                                    <!-- Search Start -->
                                    <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
                                        <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
                                            <?php $request = \Config\Services::request();  ?>
                                            <input class="form-control datatable-search" placeholder="Search" data-datatable="#datatableRows" name="keyword" type="text" value="<?= $request->getGet('keyword') ?>" />
                                            <span class="search-magnifier-icon">
                                                <button class="btn btn-icon btn-icon-only btn-foreground" type="submit">
                                                    <i data-cs-icon="search" style="margin-top: -5px;"></i>
                                                </button>
                                            </span>
                                            <span class="search-delete-icon d-none">
                                                <i data-cs-icon="close"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- Search End -->

                                    <div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-end mb-1">
                                        <div class="d-inline-block me-0 me-sm-3 float-start float-md-none">
                                            <button type="button" class="btn btn-icon btn-icon-only btn-foreground" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                <i data-cs-icon="info-hexagon" style="margin-top: -5px;"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Controls End -->
                            </form>
                            <!-- Table Start -->
                            <div class="data-table-responsive-wrapper">
                                <table id="datatableRows1" class="data-table nowrap hover">
                                    <thead>
                                        <tr>
                                            <th class="text-muted text-small text-uppercase">No</th>
                                            <th class="text-muted text-small text-uppercase text-wrap" style="width: 7rem;">Nomor Surat/ND</th>
                                            <th class="text-muted text-small text-uppercase text-wrap" style="width: 5rem;">Dari</th>
                                            <th class="text-muted text-small text-uppercase">Jenis Mutasi</th>
                                            <th class="text-muted text-small text-uppercase">NIP</th>
                                            <th class="text-muted text-small text-uppercase">Nama</th>
                                            <th class="text-muted text-small text-uppercase text-wrap" style="width: 5rem;">Unit Asal</th>
                                            <th class="text-muted text-small text-uppercase text-wrap" style="width: 5rem;">Unit Tujuan</th>
                                            <th class="text-muted text-small text-uppercase">Status</th>
                                            <th class="text-muted text-small text-uppercase">Pemeriksa</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: smaller;">
                                        <?php
                                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                        $no = 1 + (5 * ($page - 1));
                                        foreach ($user as $key => $value) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td class="text-wrap text-break" style="width: 7rem;"><?= $value->dasar_mutasi ?></td>
                                                <td class="text-wrap text-break" style="width: 5rem;"><?= $value->unit_pengaju ?></td>
                                                <td>
                                                    <?php
                                                    if ($value->jenis_mutasi == 1) {
                                                        echo '<span class="badge bg-primary">Lolos Butuh</span>';
                                                    } elseif ($value->jenis_mutasi == 2) {
                                                        echo '<span class="badge bg-secondary">APS</span>';
                                                    } elseif ($value->jenis_mutasi == 3) {
                                                        echo '<span class="badge bg-tertiary">Bursa</span>';
                                                    } elseif ($value->jenis_mutasi == 4) {
                                                        echo '<span class="badge bg-quaternary">Rotasi Internal Div</span>';
                                                    } elseif ($value->jenis_mutasi == 5) {
                                                        echo '<span class="badge bg-info">Berangkat PTB</span>';
                                                    } elseif ($value->jenis_mutasi == 6) {
                                                        echo '<span class="badge bg-info">Kembali PTB</span>';
                                                    } elseif ($value->jenis_mutasi == 7) {
                                                        echo '<span class="badge bg-warning">Promosi</span>';
                                                    } elseif ($value->jenis_mutasi == 8) {
                                                        echo '<span class="badge bg-danger">Demosi</span>';
                                                    } elseif ($value->jenis_mutasi == 9) {
                                                        echo '<span class="badge bg-success">Rotasi Internal Dir</span>';
                                                    } elseif ($value->jenis_mutasi == 10) {
                                                        echo '<span class="badge bg-success">Tugas Karya</span>';
                                                    } elseif ($value->jenis_mutasi == 11) {
                                                        echo '<span class="badge bg-success">Kembali Tugas Karya</span>';
                                                    } elseif ($value->jenis_mutasi == 12) {
                                                        echo '<span class="badge bg-success">IDT</span>';
                                                    } elseif ($value->jenis_mutasi == 13) {
                                                        echo '<span class="badge bg-success">Kembali IDT</span>';
                                                    } elseif ($value->jenis_mutasi == 14) {
                                                        echo '<span class="badge bg-success">Perpanjangan Tugas Karya</span>';
                                                    } elseif ($value->jenis_mutasi == 15) {
                                                        echo '<span class="badge bg-success">Perpanjangan IDT</span>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle mb-1" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $value->nip_eval ?></a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="<?= site_url('career/telusuriview/' . $value->id_eval) ?>">Detail</a>
                                                            <a class="dropdown-item" href="<?= site_url('career/hitungsla/' . $value->id_eval . '/3') ?>">SLA</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-wrap text-break" style="width: 5rem;"><?= $value->nama_eval ?></td>
                                                <td class="text-wrap text-break" style="width: 5rem;"><?= $value->unit_asal ?></td>
                                                <td>
                                                    <?php
                                                    if ($value->unit_tujuan == 1000) {
                                                        echo $value->nama_org_satu . ' - ' . $value->div_tujuan;
                                                    } else {
                                                        echo $value->nama_org_satu;
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($value->status_evaluasi == 1) {
                                                        echo '<span class="badge bg-outline-primary">Evaluasi PIC</span>';
                                                    } elseif ($value->status_evaluasi == 2) {
                                                        echo '<span class="badge bg-outline-info">Evaluasi MSB</span>';
                                                    } elseif ($value->status_evaluasi == 3) {
                                                        echo '<span class="badge bg-outline-warning">Evaluasi VP</span>';
                                                    } elseif ($value->status_evaluasi == 4) {
                                                        echo '<span class="badge bg-outline-danger">Proses Jawaban & Konfirmasi</span>'; // jika hasil eval dapat ditindaklanjuti
                                                    } elseif ($value->status_evaluasi == 5) {
                                                        echo '<span class="badge bg-outline-danger">Proses Jawaban</span>'; //jika hasil eval tidak dapat ditindaklanjuti
                                                    } elseif ($value->status_evaluasi == 6) {
                                                        echo '<span class="badge bg-outline-danger">Sign BA Evaluasi Mutasi</span>';
                                                    } elseif ($value->status_evaluasi == 7) {
                                                        echo '<span class="badge bg-outline-danger">Selesai</span>';
                                                    } elseif ($value->status_evaluasi == 8) {
                                                        echo '<span class="badge bg-outline-danger">Menunggu Balasan</span>';
                                                    } elseif ($value->status_evaluasi == 9) {
                                                        echo '<span class="badge bg-outline-danger">Cetak SK</span>';
                                                    } elseif ($value->status_evaluasi == 10) {
                                                        echo '<span class="badge bg-outline-danger">Request Kode Posisi</span>';
                                                    }

                                                    ?> </td>
                                                <td class="text-wrap text-break" style="width: 5rem;">
                                                    <?php
                                                    if ($value->posisi_data_kotak_masuk == NULL) {
                                                        echo 'Konsep';
                                                    } else {
                                                        echo $value->nama_user;
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="float-right">
                                        <i>Showing <?= 1 + (5 * ($page - 1)); ?> to <?= $no - 1 ?> of <?= $pager->getTotal() ?> entries</i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="float-right text-center">
                                        <?= $pager->links('default', 'pagination') ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Table End -->
                        </div>
                        <!-- Content End -->
                        <div class="viewmodal" style="display: none;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Projects Tab End -->

        <!-- Projects Tab2 Start -->
        <div class="tab-pane fade" id="projectsTab2" role="tabpanel">
            <h2 class="small-title">Selesai</h2>
            <div class="card">
                <div class="card-body">
                    <div class="col">
                        <!-- Title and Top Buttons Start -->
                        <div class="page-title-container" style="margin-top: -30px;">
                            <div class="row">
                                <?php if (session()->getFlashdata('error')) : ?>
                                    <div class="alert alert-danger alert-dismissable show fade mt-3" role="alert">
                                        <?= session()->getFlashdata('error') ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                                <?php if (session()->getFlashdata('success')) : ?>
                                    <div class="alert alert-success alert-dismissable show fade mt-3" role="alert">
                                        <?= session()->getFlashdata('success') ?>
                                        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- Title and Top Buttons End -->

                        <!-- Content Start -->
                        <div class="data-table-rows slim">
                            <!-- Controls Start -->
                            <form action="" method="get" autocomplete="off">
                                <div class="row">
                                    <!-- Search Start -->
                                    <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
                                        <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
                                            <?php $request = \Config\Services::request();  ?>
                                            <input class="form-control datatable-search" placeholder="Search" data-datatable="#datatableRows" name="keyword" type="text" value="<?= $request->getGet('keyword') ?>" />
                                            <span class="search-magnifier-icon">
                                                <button class="btn btn-icon btn-icon-only btn-foreground" type="submit">
                                                    <i data-cs-icon="search" style="margin-top: -5px;"></i>
                                                </button>
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

                                            <!-- Add Button End -->
                                        </div>
                                    </div>
                                </div>
                                <!-- Controls End -->
                            </form>
                            <!-- Table Start -->
                            <div class="data-table-responsive-wrapper">
                                <table id="datatableRows2" class="data-table nowrap hover">
                                    <thead>
                                        <tr>
                                            <th class="text-muted text-small text-uppercase">No</th>
                                            <th class="text-muted text-small text-uppercase">Nomor Surat</th>
                                            <th class="text-muted text-small text-uppercase">Dari</th>
                                            <th class="text-muted text-small text-uppercase">NIP</th>
                                            <th class="text-muted text-small text-uppercase">Nama</th>
                                            <th class="text-muted text-small text-uppercase">Jenis Mutasi</th>
                                            <th class="text-muted text-small text-uppercase">Hasil Evaluasi</th>
                                            <th class="text-muted text-small text-uppercase">Hasil Konfirmasi</th>
                                            <th class="text-muted text-small text-uppercase">Status</th>
                                            <th class="text-muted text-small text-uppercase">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: smaller;">
                                        <?php
                                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                        $no = 1 + (5 * ($page - 1));
                                        foreach ($user as $key => $value) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $value->dasar_mutasi ?></td>
                                                <td><?= $value->unit_pengaju ?></td>
                                                <td><?= $value->nip_eval ?></td>
                                                <td><?= $value->nama_eval ?></td>
                                                <td><?= $value->jenis_mutasi ?></td>
                                                <td><?= $value->hasil_evaluasi_akhir ?></td>
                                                <td><?= $value->hasil_konfirmasi ?></td>
                                                <td>
                                                    <?php
                                                    if ($value->status_evaluasi == 1) {
                                                        echo '<span class="badge bg-primary">Evaluasi PIC</span>';
                                                    } elseif ($value->status_evaluasi == 2) {
                                                        echo '<span class="badge bg-info">Evaluasi MSB</span>';
                                                    } elseif ($value->status_evaluasi == 3) {
                                                        echo '<span class="badge bg-warning">Evaluasi VP</span>';
                                                    } elseif ($value->status_evaluasi == 4) {
                                                        echo '<span class="badge bg-danger">Proses Jawaban & Konfirmasi</span>';
                                                    }

                                                    ?> </td>
                                                <td>
                                                    <div class="d-inline-block text-center">
                                                        <a href="#" class="btn btn-icon btn-icon-only btn-foreground-alternate " data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" type="button" data-bs-delay="0">
                                                            <i data-cs-icon="content"></i>
                                                        </a>
                                                        <!-- <form action="" method="post" class="d-inline">
                                                            <?= csrf_field() ?>
                                                            <button type="submit" class="btn btn-icon btn-icon-only btn-foreground-alternate" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="return confirm('Apakah anda yakin menghapus data ini?')">
                                                                <i data-cs-icon="bin"></i>
                                                            </button>
                                                        </form> -->
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="float-right">
                                        <i>Showing <?= 1 + (5 * ($page - 1)); ?> to <?= $no - 1 ?> of <?= $pager->getTotal() ?> entries</i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="float-right text-center">
                                        <?= $pager->links('default', 'pagination') ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Table End -->
                        </div>
                        <!-- Content End -->

                        <!-- Add Edit Modal Start -->
                        <div class="modal modal-right fade" id="addEditModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitle">Add New</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input name="Name" type="text" class="form-control" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Sales</label>
                                                <input name="Sales" type="number" class="form-control" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Stock</label>
                                                <input name="Stock" type="number" class="form-control" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Category</label>
                                                <div class="form-check">
                                                    <input type="radio" id="category1" name="Category" value="Whole Wheat" class="form-check-input" />
                                                    <label class="form-check-label" for="category1">Whole Wheat</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" id="category2" name="Category" value="Sourdough" class="form-check-input" />
                                                    <label class="form-check-label" for="category2">Sourdough</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" id="category3" name="Category" value="Multigrain" class="form-check-input" />
                                                    <label class="form-check-label" for="category3">Multigrain</label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Tag</label>
                                                <div class="form-check">
                                                    <input type="radio" id="tag1" name="Tag" value="New" class="form-check-input" />
                                                    <label class="form-check-label" for="tag1">New</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" id="tag2" name="Tag" value="Sale" class="form-check-input" />
                                                    <label class="form-check-label" for="tag2">Sale</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" id="tag3" name="Tag" value="Done" class="form-check-input" />
                                                    <label class="form-check-label" for="tag3">Done</label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary" id="addEditConfirmButton">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Add Edit Modal End -->
                        <div class="viewmodal" style="display: none;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Projects Tab2 End -->

        <!-- Projects Tab3 Start -->
        <div class="tab-pane fade" id="projectsTab3" role="tabpanel">
            <h2 class="small-title">Konsep</h2>
            <div class="card">
                <div class="card-body">
                    <div class="col">
                        <!-- Title and Top Buttons Start -->
                        <div class="page-title-container" style="margin-top: -30px;">
                            <div class="row">
                                <?php if (session()->getFlashdata('error')) : ?>
                                    <div class="alert alert-danger alert-dismissable show fade mt-3" role="alert">
                                        <?= session()->getFlashdata('error') ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                                <?php if (session()->getFlashdata('success')) : ?>
                                    <div class="alert alert-success alert-dismissable show fade mt-3" role="alert">
                                        <?= session()->getFlashdata('success') ?>
                                        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- Title and Top Buttons End -->

                        <!-- Content Start -->
                        <div class="data-table-rows slim">
                            <!-- Controls Start -->
                            <form action="" method="get" autocomplete="off">
                                <div class="row">
                                    <!-- Search Start -->
                                    <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
                                        <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
                                            <?php $request = \Config\Services::request();  ?>
                                            <input class="form-control datatable-search" placeholder="Search" data-datatable="#datatableRows" name="keyword" type="text" value="<?= $request->getGet('keyword') ?>" />
                                            <span class="search-magnifier-icon">
                                                <button class="btn btn-icon btn-icon-only btn-foreground" type="submit">
                                                    <i data-cs-icon="search" style="margin-top: -5px;"></i>
                                                </button>
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

                                            <!-- Add Button End -->
                                        </div>
                                    </div>
                                </div>
                                <!-- Controls End -->
                            </form>
                            <!-- Table Start -->
                            <div class="data-table-responsive-wrapper">
                                <table id="datatableRows2" class="data-table nowrap hover">
                                    <thead>
                                        <tr>
                                            <th class="text-muted text-small text-uppercase">No</th>
                                            <th class="text-muted text-small text-uppercase">Nomor Surat</th>
                                            <th class="text-muted text-small text-uppercase">Dari</th>
                                            <th class="text-muted text-small text-uppercase">NIP</th>
                                            <th class="text-muted text-small text-uppercase">Nama</th>
                                            <th class="text-muted text-small text-uppercase">Jenis Mutasi</th>
                                            <th class="text-muted text-small text-uppercase">Hasil Evaluasi</th>
                                            <th class="text-muted text-small text-uppercase">Hasil Konfirmasi</th>
                                            <th class="text-muted text-small text-uppercase">Status</th>
                                            <th class="text-muted text-small text-uppercase">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-size: smaller;">
                                        <?php
                                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                        $no = 1 + (5 * ($page - 1));
                                        foreach ($user as $key => $value) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $value->dasar_mutasi ?></td>
                                                <td><?= $value->unit_pengaju ?></td>
                                                <td><?= $value->nip_eval ?></td>
                                                <td><?= $value->nama_eval ?></td>
                                                <td><?= $value->jenis_mutasi ?></td>
                                                <td><?= $value->hasil_evaluasi_akhir ?></td>
                                                <td><?= $value->hasil_konfirmasi ?></td>
                                                <td>
                                                    <?php
                                                    if ($value->status_evaluasi == 1) {
                                                        echo '<span class="badge bg-primary">Evaluasi PIC</span>';
                                                    } elseif ($value->status_evaluasi == 2) {
                                                        echo '<span class="badge bg-info">Evaluasi MSB</span>';
                                                    } elseif ($value->status_evaluasi == 3) {
                                                        echo '<span class="badge bg-warning">Evaluasi VP</span>';
                                                    } elseif ($value->status_evaluasi == 4) {
                                                        echo '<span class="badge bg-danger">Proses Jawaban & Konfirmasi</span>';
                                                    }

                                                    ?> </td>
                                                <td>
                                                    <div class="d-inline-block text-center">
                                                        <a href="#" class="btn btn-icon btn-icon-only btn-foreground-alternate " data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" type="button" data-bs-delay="0">
                                                            <i data-cs-icon="content"></i>
                                                        </a>
                                                        <!-- <form action="" method="post" class="d-inline">
                                                            <?= csrf_field() ?>
                                                            <button type="submit" class="btn btn-icon btn-icon-only btn-foreground-alternate" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="return confirm('Apakah anda yakin menghapus data ini?')">
                                                                <i data-cs-icon="bin"></i>
                                                            </button>
                                                        </form> -->
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="float-right">
                                        <i>Showing <?= 1 + (5 * ($page - 1)); ?> to <?= $no - 1 ?> of <?= $pager->getTotal() ?> entries</i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="float-right text-center">
                                        <?= $pager->links('default', 'pagination') ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Table End -->
                        </div>
                        <!-- Content End -->

                        <!-- Add Edit Modal Start -->
                        <div class="modal modal-right fade" id="addEditModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitle">Add New</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input name="Name" type="text" class="form-control" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Sales</label>
                                                <input name="Sales" type="number" class="form-control" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Stock</label>
                                                <input name="Stock" type="number" class="form-control" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Category</label>
                                                <div class="form-check">
                                                    <input type="radio" id="category1" name="Category" value="Whole Wheat" class="form-check-input" />
                                                    <label class="form-check-label" for="category1">Whole Wheat</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" id="category2" name="Category" value="Sourdough" class="form-check-input" />
                                                    <label class="form-check-label" for="category2">Sourdough</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" id="category3" name="Category" value="Multigrain" class="form-check-input" />
                                                    <label class="form-check-label" for="category3">Multigrain</label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Tag</label>
                                                <div class="form-check">
                                                    <input type="radio" id="tag1" name="Tag" value="New" class="form-check-input" />
                                                    <label class="form-check-label" for="tag1">New</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" id="tag2" name="Tag" value="Sale" class="form-check-input" />
                                                    <label class="form-check-label" for="tag2">Sale</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" id="tag3" name="Tag" value="Done" class="form-check-input" />
                                                    <label class="form-check-label" for="tag3">Done</label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary" id="addEditConfirmButton">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Add Edit Modal End -->
                        <div class="viewmodal" style="display: none;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Projects Tab3 End -->

        <!-- Projects Tab3 Start -->
        <div class="tab-pane fade" id="projectsTab4" role="tabpanel">
            <h2 class="small-title">Pengaturan</h2>
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>
        <!-- Projects Tab3 End -->
    </div>
    <!-- Right Side End -->
</div>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Legenda Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ol class="ps-4 mb-0">
                    <li>
                        Evaluasi MSB
                        <p class="fw-normal">
                            Data sedang dievaluasi MSB
                        </p>
                    </li>
                    <li>
                        Evaluasi VP
                        <p class="fw-normal">Data sedang dievaluasi VP</p>
                    </li>
                    <li>
                        Proses Jawaban & Konfirmasi
                        <p class="fw-normal">Data sedang Proses Jawaban ke Div/Unit Pemohon dan Konfirmasi ke Div/Unit Asal atau Tujuan oleh PIC</p>
                    </li>
                    <li>
                        Proses Jawaban
                        <p class="fw-normal">Data sedang Proses Jawaban ke Div/HTD Area Pemohon oleh PIC</p>
                    </li>
                    <li>
                        Menunggu Balasan
                        <p class="fw-normal">Menunggu balasan dari Div/HTD Area Asal atau Tujuan</p>
                    </li>
                    <li>
                        Sign BA Evaluasi Mutasi
                        <p class="fw-normal">Sedang proses tanda tangan BA Evaluasi Mutasi</p>
                    </li>
                    <li>
                        Cetak SK
                        <p class="fw-normal">Proses Cetak dan Tanda Tangan SK Mutasi</p>
                    </li>
                    <li>
                        Request Kode Posisi
                        <p class="fw-normal">Proses Permohonan Kode Posisi</p>
                    </li>
                    <li>
                        Selesai
                    </li>
                </ol>
            </div>
        </div>
    </div>
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
<script src="<?= base_url() ?>/template/js/vendor/datatables.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/select2.full.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/datepicker/locales/bootstrap-datepicker.es.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/jquery.validate/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/jquery.validate/additional-methods.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/bootstrap-submenu.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/mousetrap.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/dropzone.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/singleimageupload.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/moment-with-locales.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/Chart.bundle.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/chartjs-plugin-rounded-bar.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/chartjs-plugin-crosshair.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/chartjs-plugin-datalabels.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/chartjs-plugin-streaming.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/glide.min.js"></script>
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
<script src="<?= base_url() ?>/template/js/cs/dropzone.templates.js"></script>
<script src="<?= base_url() ?>/template/js/forms/controls.dropzone.js"></script>
<script src="<?= base_url() ?>/template/js/cs/charts.extend.js"></script>
<script src="<?= base_url() ?>/template/js/plugins/charts.js"></script>
<script src="<?= base_url() ?>/template/js/cs/glide.custom.js"></script>
<script src="<?= base_url() ?>/template/js/plugins/carousels.js"></script>
<script src="<?= base_url() ?>/template/js/components/progress.js"></script>
<script src="<?= base_url() ?>/template/js/forms/controls.select2.js"></script>
<script src="<?= base_url() ?>/template/js/cs/datatable.extend.js"></script>
<script src="<?= base_url() ?>/template/js/plugins/datatable.editablerows33.js"></script>
<script src="<?= base_url() ?>/template/js/common.js"></script>
<script src="<?= base_url() ?>/template/js/scripts.js"></script>
<!-- Page Specific Scripts End -->

<?= $this->endSection() ?>