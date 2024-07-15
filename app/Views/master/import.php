<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Import Data Pegawai</title>
<?= $this->endSection() ?>

<?= $this->section('cssheader') ?>
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/bootstrap.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/OverlayScrollbars.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/dropzone.min.css" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row">
                <div class="col mb-1">
                    <div class="d-inline-block me-0 me-sm-3 float-start float-md-none">
                        <!-- Back Button Start -->
                        <a href="<?= site_url('masterdata') ?>" class="btn btn-icon btn-icon-only btn-foreground-alternate shadow add-dapeg" data-bs-toggle="tooltip" data-bs-placement="top" title="Back" type="button" data-bs-delay="0">
                            <i data-cs-icon="arrow-left"></i>
                        </a>
                        <!-- Back Button End -->
                    </div>
                </div>
                <!-- Title Start -->
                <div class="col-12">
                    <div class="d-inline-block me-0 me-sm-3 mb-1">
                        <h5 class="mb-0 pb-0" id="title">Import Data Pegawai</h5>
                    </div>
                    <!-- Title End -->
                </div>
            </div>
            <!-- Title and Top Buttons End -->

            <!-- Content Start -->
            <section class="scroll-section" id="contact">
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger alert-dismissable show fade" role="alert">
                        <div class="alert-body">
                            <?= session()->getFlashdata('error') ?>
                            <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissable show fade" role="alert">
                        <div class="alert-body">
                            <?= session()->getFlashdata('success') ?>
                            <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="card mt-4 mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Unit</th>
                                        <th scope="col">Last Update</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $key => $value) : ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $value->nama_org_satu ?></td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <form class="card mb-5 tooltip-end-top" action="<?= site_url('masterdata/prosesimport') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <!-- Floating Label Start -->
                    <div class="card">
                        <div class="card-body">

                            <div class="form-floating">
                                <input type="file" class="dropzone dropzone-floating-label form-control" name="file_excel">
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6">
                                    <!-- <a href="<?= base_url('template/files/kode_organisasi.xlsx') ?>" data-target="_blank" class="btn btn-icon btn-icon-end btn-info">
                                    <span>Download Kode Organisasi</span>
                                    <i data-cs-icon="download"></i>
                                </a> -->
                                    <a href="<?= base_url('template/files/template_import_dapeg.xlsx') ?>" data-target="_blank" class="btn btn-icon btn-icon-end btn-secondary">
                                        <span>Download Template</span>
                                        <i data-cs-icon="download"></i>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <div class="float-end">
                                        <button class="btn btn-icon btn-icon-end btn-primary" type="submit">
                                            <span>Upload Data</span>
                                            <i data-cs-icon="upload"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Floating Label End -->
                </form>
            </section>
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
    <script src="<?= base_url() ?>/template/js/cs/dropzone.templates.js"></script>
    <script src="<?= base_url() ?>/template/js/forms/controls.dropzone.js"></script>
    <script src="<?= base_url() ?>/template/js/common.js"></script>
    <script src="<?= base_url() ?>/template/js/scripts.js"></script>
    <!-- Page Specific Scripts End -->

    <?= $this->endSection() ?>