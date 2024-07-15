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
        <!-- Overview Tab Start -->
        <div class="tab-pane fade show active" id="overviewTab" role="tabpanel">
            <!-- Stats Start -->
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
                                </div>
                                <!-- Controls End -->
                            </form>
                            <!-- Table Start -->
                            <div class="data-table-responsive-wrapper">
                                <table id="datatableRows" class="data-table nowrap hover">
                                    <thead>
                                        <tr>
                                            <th class="text-muted text-small text-uppercase">No</th>
                                            <th class="text-muted text-small text-uppercase">Nomor Surat/ND</th>
                                            <th class="text-muted text-small text-uppercase">Dari</th>
                                            <th class="text-muted text-small text-uppercase">Jenis Mutasi</th>
                                            <th class="text-muted text-small text-uppercase">NIP</th>
                                            <th class="text-muted text-small text-uppercase">Nama</th>
                                            <th class="text-muted text-small text-uppercase">Unit Asal</th>
                                            <th class="text-muted text-small text-uppercase">Unit Tujuan</th>
                                            <th class="text-muted text-small text-uppercase">Hasil Evaluasi</th>
                                            <th class="text-muted text-small text-uppercase">Hasil Konfirmasi</th>
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
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle mb-1" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $value->nip_eval ?></a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="<?= site_url('career/selesaiview/' . $value->id_eval) ?>">Detail</a>
                                                            <a class="dropdown-item" href="<?= site_url('career/hitungsla/' . $value->id_eval . '/0') ?>">SLA</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?= $value->nama_eval ?></td>
                                                <td><?= $value->unit_asal ?></td>
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
                                                    if ($value->hasil_evaluasi_akhir == 0) {
                                                        echo 'Tidak Dapat Ditindaklanjuti';
                                                    } else if ($value->hasil_evaluasi_akhir == 1) {
                                                        echo 'Dapat Ditindaklanjuti';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($value->hasil_konfirmasi == 2) {
                                                        echo 'Disetujui';
                                                    } else if ($value->hasil_konfirmasi == 3) {
                                                        echo 'Lainnya';
                                                    } else if ($value->hasil_konfirmasi == 1) {
                                                        echo 'Belum Disetujui';
                                                    } else {
                                                        echo '';
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
            <!-- Stats End -->
        </div>
        <!-- Overview Tab End -->
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