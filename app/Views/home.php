<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Home</title>
<?= $this->endSection() ?>

<?= $this->section('cssheader') ?>
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/bootstrap.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/OverlayScrollbars.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/select2.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/select2-bootstrap4.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/bootstrap-datepicker3.standalone.min.css" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="page-title-container">
    <div class="row">
        <!-- Title Start -->
        <div class="col-12">
            <h5 class="mb-0 pb-0 text-center" id="title">MenuUUUU</h5>
        </div>
        <!-- Title End -->
    </div>
</div>
<!-- Title and Top Buttons End -->

<!-- Content Start -->
<div class="row g-3 row-cols-1 row-cols-lg-4 row-cols-xxl-4 mb-5">
    <div class="col">
        <div class="card h-100">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?= base_url() ?>/template/img/illustration/access-token.png" class="theme-filter" alt="experiment" />
                    <div class="d-flex flex-column sh-5">
                        <a href="<?= site_url('dashboard/dashtd') ?>" class="heading stretched-link">Dashboards</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?= base_url() ?>/template/img/illustration/icon-database.png" class="theme-filter" alt="performance" />
                    <div class="d-flex flex-column sh-5">
                        <a href="<?= site_url('strukturorg') ?>" class="heading stretched-link">Struktur Organisasi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?= base_url() ?>/template/img/illustration/icon-support.png" class="theme-filter" alt="performance" />
                    <div class="d-flex flex-column sh-5">
                        <a href="<?= site_url('strukturorg/monitoringftk') ?>" class="heading stretched-link">Monitoring FTK</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?= base_url() ?>/template/img/illustration/icon-analytics.png" class="theme-filter" alt="performance" />
                    <div class="d-flex flex-column sh-5">
                        <a href="<?= site_url('dashboard') ?>" class="heading stretched-link">e-Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-title-container">
    <div class="row">
        <!-- Title Start -->
        <div class="col-12">
            <h5 class="mb-0 pb-0 text-center" id="title">Career Management</h5>
        </div>
        <!-- Title End -->
    </div>
</div>
<div class="row g-3 row-cols-1 row-cols-lg-4 row-cols-xxl-4 mb-5">
    <div class="col">
        <div class="card h-100">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?= base_url() ?>/template/img/illustration/icon-storage.png" class="theme-filter" alt="storage" />
                    <div class="d-flex flex-column sh-5">
                        <a href="<?= site_url('career') ?>" class="heading stretched-link">???</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?= base_url() ?>/template/img/illustration/icon-documentation.png" class="theme-filter" alt="storage" />
                    <div class="d-flex flex-column sh-5">
                        <a href="<?= site_url('career/fnp') ?>" class="heading stretched-link">Fit & Proper</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?= base_url() ?>/template/img/illustration/icon-integrate.png" class="theme-filter" alt="storage" />
                    <div class="d-flex flex-column sh-5">
                        <a href="<?= site_url('career/evaluasimutasi') ?>" class="heading stretched-link">Evaluasi Mutasi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?= base_url() ?>/template/img/illustration/icon-integrate.png" class="theme-filter" alt="storage" />
                    <div class="d-flex flex-column sh-5">
                        <a href="<?= site_url('pcs') ?>" class="heading stretched-link">Cari Kandidat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-title-container">
    <div class="row">
        <!-- Title Start -->
        <div class="col-12">
            <h5 class="mb-0 pb-0 text-center" id="title">Talent Development</h5>
        </div>
        <!-- Title End -->
    </div>
</div>
<div class="row g-3 row-cols-1 row-cols-lg-3 row-cols-xxl-3 mb-5">
    <div class="col">
        <div class="card h-100">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?= base_url() ?>/template/img/illustration/icon-phone.png" class="theme-filter" alt="performance" />
                    <div class="d-flex flex-column sh-5">
                        <a href="<?= site_url('talentdev') ?>" class="heading stretched-link">Internship</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?= base_url() ?>/template/img/illustration/icon-documentation.png" class="theme-filter" alt="experiment" />
                    <div class="d-flex flex-column sh-5">
                        <a href="<?= site_url('talentdev/eksternal') ?>" class="heading stretched-link">Diklat/Sertifikasi Eks</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?= base_url() ?>/template/img/illustration/icon-accounts.png" class="theme-filter" alt="experiment" />
                    <div class="d-flex flex-column sh-5">
                        <a href="<?= site_url('talentdev/internal') ?>" class="heading stretched-link">Penugasan Pusdiklat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-title-container">
    <div class="row">
        <!-- Title Start -->
        <div class="col-12">
            <h5 class="mb-0 pb-0 text-center" id="title">Anggaran</h5>
        </div>
        <!-- Title End -->
    </div>
</div>
<div class="row g-3 row-cols-1 row-cols-lg-3 row-cols-xxl-3 mb-5">
    <div class="col">
        <div class="card h-100">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?= base_url() ?>/template/img/illustration/icon-platforms.png" class="theme-filter" alt="storage" />
                    <div class="d-flex flex-column sh-5">
                        <a href="<?= site_url('anggaran/pos54') ?>" class="heading stretched-link">POS 52</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?= base_url() ?>/template/img/illustration/icon-platforms.png" class="theme-filter" alt="storage" />
                    <div class="d-flex flex-column sh-5">
                        <a href="<?= site_url('anggaran/pos54') ?>" class="heading stretched-link">POS 53</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card h-100">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?= base_url() ?>/template/img/illustration/icon-platforms.png" class="theme-filter" alt="storage" />
                    <div class="d-flex flex-column sh-5">
                        <a href="<?= site_url('anggaran/pos54') ?>" class="heading stretched-link">POS 54</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card h-100">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?= base_url() ?>/template/img/illustration/icon-platforms.png" class="theme-filter" alt="storage" />
                    <div class="d-flex flex-column sh-5">
                        <a href="<?= site_url('anggaran/pos54') ?>" class="heading stretched-link">POS 54</a>
                    </div>
                </div>
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
<script src="<?= base_url() ?>/template/js/vendor/select2.full.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/datepicker/locales/bootstrap-datepicker.es.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/jquery.validate/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/jquery.validate/additional-methods.min.js"></script>
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
<script src="<?= base_url() ?>/template/js/common.js"></script>
<script src="<?= base_url() ?>/template/js/scripts.js"></script>
<!-- Page Specific Scripts End -->

<?= $this->endSection() ?>