<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Dashboard</title>
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
    
<p>
    <h2>DATA PEGAWAI MPP</h2>
</p>

<!-- Dropzone Start -->
<h4>Upload File</h4>
    <div class="card mb-5">
         <div class="card-body">
                <form>
                    <div class="dropzone" id="dropzoneImage"></div>
                </form>
        </div>
    </div>
<!-- Dropzone End -->


    <div class="row">
        <div class="page-title-container">
            <div class="row">

                <!-- Title Start -->
                <div class="col-12 col-md-7">
                    <h2 class="mb-0 pb-0" id="title">DAFTAR PEGAWAI MPP </h2>
                </div>
                <!-- Title End -->

                


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
                        <!-- <div class="d-inline-block me-0 me-sm-3 float-start float-md-none">
                           
                                         
                        </div> -->


                        <div class="d-inline-block">
                        
                        <!-- Add Button Start -->
                            <a href="<?= site_url('masterdata/addpeg') ?>" class="btn btn-icon btn-icon-only btn-foreground-alternate shadow add-dapeg" data-bs-toggle="tooltip" data-bs-placement="top" title="Add User" type="button" data-bs-delay="0">
                                <i data-cs-icon="plus"></i>
                            </a>
                        <!-- Add Button End -->           
                        
                        <!-- Print Button Start -->
                            <a href="<?= site_url('userimport') ?>" class="btn btn-icon btn-icon-only btn-foreground-alternate shadow" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-delay="0" title="Upload Data User" type="button">
                                <i data-cs-icon="upload"></i>
                            </a>
                            <!-- Print Button End -->

                            <!-- Export Dropdown Start -->
                            <div class="d-inline-block datatable-export" data-datatable="#datatableRows">
                                <?php
                                $request = \Config\Services::request();
                                $keyword = $request->getGet('keyword');
                                if ($keyword != '') {
                                    $param = "?keyword=" . $keyword;
                                } else {
                                    $param = "";
                                }
                                ?>
                                <a class="btn p-0" href="<?= site_url('masterdata/exporthtd' . $param) ?>" data-bs-offset="0,3">
                                    <span class="btn btn-icon btn-icon-only btn-foreground-alternate shadow dropdown" data-bs-delay="0" data-bs-placement="top" data-bs-toggle="tooltip" title="Export Excel">
                                        <i data-cs-icon="download"></i>
                                    </span>
                                </a>
                            </div>
                            <!-- Export Dropdown End -->



                            <!-- Length Start -->
                           
                            <!-- Length End -->
                            
                            
                            
                            <!-- Table Start -->
                             <div class="data-table-responsive-wrapper">
                                <table id="datatableRows" class="data-table nowrap hover">
                                    <thead>
                                        <tr>
                                            <th class="text-muted text-small text-uppercase">No</th>
                                            <th class="text-muted text-small text-uppercase">NIP</th>
                                            <th class="text-muted text-small text-uppercase">Unit Induk</th>
                                            <th class="text-muted text-small text-uppercase">Unit Pelaksana</th>
                                            <th class="text-muted text-small text-uppercase">Unit Layanan</th>
                                            <th class="text-muted text-small text-uppercase">Tanggal Aktivasi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no=1; foreach($tb_mpp as $key => $value): ?>                                            
                                            <tr>
                                                <td><?=$no++ ?></td>
                                                <td><?=$row['nip'] ?></td>
                                                <td><?=$row['unit_asal_lv1'] ?></td>
                                                <td><?=$row['unit_asal_lv2'] ?></td>
                                                <td><?=$row['unit_asal_lv3'] ?></td>
                                                <td><?=$row['tgl_aktivasi'] ?></td>
                                            </tr>
                                            <?php foreach; ?>
                                    </tbody>
                                </table>
                            </div>



                             <!-- Table Start -->


                        </div>
                    </div>
                </div>
                <!-- Controls End -->
            </form>


        </div>
        <!-- Content End -->

                
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
<script src="<?= base_url() ?>/template/js/plugins/datatable.editablerows2.js"></script>
<script src="<?= base_url() ?>/template/js/common.js"></script>
<script src="<?= base_url() ?>/template/js/scripts.js"></script>
<!-- Page Specific Scripts End -->

<?= $this->endSection() ?>