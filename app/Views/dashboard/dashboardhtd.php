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
<div class="page-title-container">
    <div class="row">
        <!-- Title Start -->
        <div class="col-12 col-md-7">
            <h4 class="mb-2 pb-0" id="title">Dashboard</h4>
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
                <div class="nav flex-column" role="tablist">
                    <a class="nav-link active px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#overviewTab" role="tab">
                        <i data-cs-icon="user" class="me-2" data-cs-size="17"></i>
                        <span class="align-middle">Demografi</span>
                    </a>
                    <a class="nav-link px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#projectsTab" role="tab">
                        <i data-cs-icon="building-small" class="me-2" data-cs-size="17"></i>
                        <span class="align-middle">Organisasi</span>
                    </a>
                    <a class="nav-link px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#friendsTab" role="tab">
                        <i data-cs-icon="destination" class="me-2" data-cs-size="17"></i>
                        <span class="align-middle">Karir</span>
                    </a>
                    <a class="nav-link px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#permissionsTab" role="tab">
                        <i data-cs-icon="electricity" class="me-2" data-cs-size="17"></i>
                        <span class="align-middle">Kinerja</span>
                    </a>
                    <a class="nav-link px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#hocrTab" role="tab">
                        <i data-cs-icon="maximize" class="me-2" data-cs-size="17"></i>
                        <span class="align-middle">HCR OCR</span>
                    </a>
                    <a class="nav-link px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#pembelajaranTab" role="tab">
                        <i data-cs-icon="responsive" class="me-2" data-cs-size="17"></i>
                        <span class="align-middle">Pembelajaran</span>
                    </a>
                    <a class="nav-link px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#sertifikasiTab" role="tab">
                        <i data-cs-icon="badge" class="me-2" data-cs-size="17"></i>
                        <span class="align-middle">Sertifikasi</span>
                    </a>
                    <a class="nav-link px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#accessTab" role="tab">
                        <i data-cs-icon="battery-full" class="me-2" data-cs-size="17"></i>
                        <span class="align-middle">Access</span>
                    </a>
                    <a class="nav-link px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#eclinicTab" role="tab">
                        <i data-cs-icon="heart" class="me-2" data-cs-size="17"></i>
                        <span class="align-middle">e-Clinic</span>
                    </a>
                    <a class="nav-link px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#ecareTab" role="tab">
                        <i data-cs-icon="support" class="me-2" data-cs-size="17"></i>
                        <span class="align-middle">e-Care</span>
                    </a>
                    <a class="nav-link px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#dapengTab" role="tab">
                        <i data-cs-icon="building" class="me-2" data-cs-size="17"></i>
                        <span class="align-middle">Data Pengusahaan</span>
                    </a>
                    <a class="nav-link px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#kalenderTab" role="tab">
                        <i data-cs-icon="calendar" class="me-2" data-cs-size="17"></i>
                        <span class="align-middle">Kalender</span>
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
            <div class="row g-2">
                <!-- Google Maps Start -->
                <section class="scroll-section" id="googleMaps">
                    <h2 class="small-title">Area Kerja</h2>
                    <div class="card mb-5 sh-50">
                        <div class="card-body h-100">
                            <iframe class="h-100 w-100" src="https://www.google.com/maps/embed/v1/view?zoom=5&center=0.9619%2C114.5548&key=AIzaSyBlUJJ-kfKvelFy2ubNhMcy-HVhjoApYbw" allowfullscreen></iframe>
                        </div>
                    </div>
                </section>
                <!-- Google Maps End -->
            </div>
            <!-- Stats Start -->
            <div class="d-flex justify-content-between">
                <h2 class="small-title">Demografi Pegawai</h2>
                <button class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small" type="button" data-bs-toggle="modal" data-bs-target="#demografipegawai">
                    <span class="align-bottom">Detail</span>
                    <i data-cs-icon="chevron-right" class="align-middle" data-cs-size="12"></i>
                </button>
            </div>
            <div class="mb-2">
                <div class="row g-2">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <div class="card hover-border-primary">
                            <div class="card-body">
                                <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                    <span>Pegawai</span>
                                    <i data-cs-icon="user" class="text-primary"></i>
                                </div>
                                <div class="cta-1 text-primary">4.132</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-6">
                        <div class="card hover-border-primary">
                            <div class="card-body">
                                <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                    <span>Pegawai Laki-Laki</span>
                                    <i data-cs-icon="user" class="text-primary"></i>
                                </div>
                                <div class="cta-1 text-primary">...</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-6">
                        <div class="card hover-border-primary">
                            <div class="card-body">
                                <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                    <span>Pegawai Wanita</span>
                                    <i data-cs-icon="user" class="text-info"></i>
                                </div>
                                <div class="cta-1 text-primary">...</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card hover-border-primary">
                            <div class="card-body">
                                <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                    <span>HCMS</span>
                                    <i data-cs-icon="user" class="text-primary"></i>
                                </div>
                                <div class="cta-1 text-primary">...</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card hover-border-primary">
                            <div class="card-body">
                                <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                    <span>NonHCMS</span>
                                    <i data-cs-icon="user" class="text-primary"></i>
                                </div>
                                <div class="cta-1 text-primary">...</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-2">
                        <div class="card hover-border-primary">
                            <div class="card-body">
                                <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                    <span>S3-S2</span>
                                    <i data-cs-icon="user" class="text-primary"></i>
                                </div>
                                <div class="cta-1 text-primary">...</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-2">
                        <div class="card hover-border-primary">
                            <div class="card-body">
                                <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                    <span>S1-D3</span>
                                    <i data-cs-icon="user" class="text-info"></i>
                                </div>
                                <div class="cta-1 text-primary">...</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-2">
                        <div class="card hover-border-primary">
                            <div class="card-body">
                                <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                    <span>SLTA</span>
                                    <i data-cs-icon="user" class="text-info"></i>
                                </div>
                                <div class="cta-1 text-primary">...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-2 mt-5">
                <div class="row g-2">
                    <div class="d-flex justify-content-between">
                        <h2 class="small-title">Demografi Alih Daya</h2>
                        <button class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small" type="button" data-bs-toggle="modal" data-bs-target="#demografipegawaiad">
                            <span class="align-bottom">Detail</span>
                            <i data-cs-icon="chevron-right" class="align-middle" data-cs-size="12"></i>
                        </button>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-12">
                        <div class="card hover-border-primary">
                            <div class="card-body">
                                <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                    <span>Alih Daya</span>
                                    <i data-cs-icon="user" class="text-primary"></i>
                                </div>
                                <div class="cta-1 text-primary">...</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-6">
                        <div class="card hover-border-primary">
                            <div class="card-body">
                                <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                    <span>Kontrak AP</span>
                                    <i data-cs-icon="user" class="text-info"></i>
                                </div>
                                <div class="cta-1 text-primary">...</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-6">
                        <div class="card hover-border-primary">
                            <div class="card-body">
                                <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                    <span>Kontrak Swasta</span>
                                    <i data-cs-icon="user" class="text-info"></i>
                                </div>
                                <div class="cta-1 text-primary">...</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card hover-border-primary">
                            <div class="card-body">
                                <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                    <span>Distribusi</span>
                                    <i data-cs-icon="user" class="text-primary"></i>
                                </div>
                                <div class="cta-1 text-primary">...</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card hover-border-primary">
                            <div class="card-body">
                                <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                    <span>Pembangkitan</span>
                                    <i data-cs-icon="user" class="text-primary"></i>
                                </div>
                                <div class="cta-1 text-primary">...</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card hover-border-primary">
                            <div class="card-body">
                                <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                    <span>Transmisi</span>
                                    <i data-cs-icon="user" class="text-info"></i>
                                </div>
                                <div class="cta-1 text-primary">...</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card hover-border-primary">
                            <div class="card-body">
                                <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                    <span>Niaga</span>
                                    <i data-cs-icon="user" class="text-info"></i>
                                </div>
                                <div class="cta-1 text-primary">...</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card hover-border-primary">
                            <div class="card-body">
                                <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                    <span>Driver</span>
                                    <i data-cs-icon="user" class="text-info"></i>
                                </div>
                                <div class="cta-1 text-primary">...</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card hover-border-primary">
                            <div class="card-body">
                                <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                    <span>Adm TLSK</span>
                                    <i data-cs-icon="user" class="text-info"></i>
                                </div>
                                <div class="cta-1 text-primary">...</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card hover-border-primary">
                            <div class="card-body">
                                <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                    <span>Harbilding</span>
                                    <i data-cs-icon="user" class="text-info"></i>
                                </div>
                                <div class="cta-1 text-primary">...</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card hover-border-primary">
                            <div class="card-body">
                                <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                    <span>Satpam</span>
                                    <i data-cs-icon="user" class="text-info"></i>
                                </div>
                                <div class="cta-1 text-primary">...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats End -->
            <!-- Activity Start -->
            <div class="mt-5 d-flex justify-content-between">
                <h2 class="small-title">Grafik</h2>
                <button class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small" type="button">
                    <!-- <span class="align-bottom">Detail</span>
                    <i data-cs-icon="chevron-right" class="align-middle" data-cs-size="12"></i> -->
                </button>
            </div>
            <div class="row">
                <div class="col-12 p-0 ">
                    <div class="glide" id="glideBasic">
                        <div class="glide__track" data-glide-el="track">
                            <div class="glide__slides">
                                <div class="glide__slide">
                                    <div class="card mb-5">
                                        <div class="card-body">
                                            <!-- Doughnut Chart Start -->
                                            <section class="scroll-section" id="doughnutChartTitle">
                                                <h2 class="small-title">Sebaran Jumlah Pegawai per Unit Induk</h2>
                                                <div class="sh-35">
                                                    <canvas id="doughnutChart2"></canvas>
                                                </div>
                                            </section>
                                            <!-- Doughnut Chart End -->
                                        </div>
                                    </div>
                                </div>
                                <div class="glide__slide">
                                    <div class="card mb-5">
                                        <div class="card-body">
                                            <!-- Doughnut Chart Start -->
                                            <section class="scroll-section" id="doughnutChartTitle">
                                                <h2 class="small-title">Sebaran Jumlah Alih Daya per Unit Induk</h2>
                                                <div class="sh-35">
                                                    <canvas id="doughnutChart3"></canvas>
                                                </div>
                                            </section>
                                            <!-- Doughnut Chart End -->
                                        </div>
                                    </div>
                                </div>
                                <div class="glide__slide">
                                    <div class="card mb-5">
                                        <div class="card-body">
                                            <!-- Doughnut Chart Start -->
                                            <section class="scroll-section" id="doughnutChartTitle">
                                                <h2 class="small-title">Sebaran Level Kompetensi Pegawai</h2>
                                                <div class="sh-35">
                                                    <canvas id="doughnutChart"></canvas>
                                                </div>
                                            </section>
                                            <!-- Doughnut Chart End -->
                                        </div>
                                    </div>
                                </div>
                                <div class="glide__slide">
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <!-- Doughnut Chart Start -->
                                            <section class="scroll-section" id="doughnutChartTitle">
                                                <h2 class="small-title">Sebaran Usia Pegawai</h2>
                                                <div class="sh-35">
                                                    <canvas id="doughnutChart1"></canvas>
                                                </div>
                                            </section>
                                            <!-- Doughnut Chart End -->
                                        </div>
                                    </div>
                                </div>
                                <div class="glide__slide">
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <!-- Doughnut Chart Start -->
                                            <section class="scroll-section" id="doughnutChartTitle">
                                                <h2 class="small-title">Sebaran Jenis Kelamin Pegawai</h2>
                                                <div class="sh-35">
                                                    <canvas id="doughnutChart4"></canvas>
                                                </div>
                                            </section>
                                            <!-- Doughnut Chart End -->
                                        </div>
                                    </div>
                                </div>
                                <div class="glide__slide">
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <!-- Doughnut Chart Start -->
                                            <section class="scroll-section" id="doughnutChartTitle">
                                                <h2 class="small-title">Sebaran Pendidikan Pegawai</h2>
                                                <div class="sh-35">
                                                    <canvas id="doughnutChart5"></canvas>
                                                </div>
                                            </section>
                                            <!-- Doughnut Chart End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <span class="glide__arrows slider-nav" data-glide-el="controls">
                                <button class="btn btn-icon btn-icon-only btn-outline-primary" data-glide-dir="<">
                                    <i data-cs-icon="chevron-left"></i>
                                </button>
                            </span>
                            <span class="glide__bullets" data-glide-el="controls[nav]"></span>
                            <span class="glide__arrows slider-nav" data-glide-el="controls">
                                <button class="btn btn-icon btn-icon-only btn-outline-primary" data-glide-dir=">">
                                    <i data-cs-icon="chevron-right"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <h2 class="small-title">FTK & Pagu</h2>
                <div class="col-12 col-md-6 col-xl-12 col-xxl-6">
                    <div class="card sh-13 mb-2">
                        <div class="card-body py-0 d-flex align-items-center">
                            <div class="row g-0 d-flex w-100">
                                <div class="col sh-8 d-flex flex-column justify-content-center custom-legend-container"></div>
                                <template class="custom-legend-item">
                                    <div class="text-small text-muted text"></div>
                                    <div class="cta-3 text-primary value"></div>
                                </template>
                                <div class="col-auto">
                                    <canvas id="smallDoughnutChart1" class="sw-8 sh-8"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-12 col-xxl-6">
                    <div class="card sh-13 mb-2">
                        <div class="card-body py-0 d-flex align-items-center">
                            <div class="row g-0 d-flex w-100">
                                <div class="col sh-8 d-flex flex-column justify-content-center custom-legend-container"></div>
                                <template class="custom-legend-item">
                                    <div class="text-small text-muted text"></div>
                                    <div class="cta-3 text-primary value"></div>
                                </template>
                                <div class="col-auto">
                                    <canvas id="smallDoughnutChart2" class="sw-8 sh-8"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-12 col-xxl-6">
                    <div class="card sh-13 mb-2">
                        <div class="card-body py-0 d-flex align-items-center">
                            <div class="row g-0 d-flex w-100">
                                <div class="col sh-8 d-flex flex-column justify-content-center custom-legend-container"></div>
                                <template class="custom-legend-item">
                                    <div class="text-small text-muted text"></div>
                                    <div class="cta-3 text-primary value"></div>
                                </template>
                                <div class="col-auto">
                                    <canvas id="smallDoughnutChart3" class="sw-8 sh-8"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-12 col-xxl-6">
                    <div class="card sh-13 mb-2">
                        <div class="card-body py-0 d-flex align-items-center">
                            <div class="row g-0 d-flex w-100">
                                <div class="col sh-8 d-flex flex-column justify-content-center custom-legend-container"></div>
                                <template class="custom-legend-item">
                                    <div class="text-small text-muted text"></div>
                                    <div class="cta-3 text-primary value"></div>
                                </template>
                                <div class="col-auto">
                                    <canvas id="smallDoughnutChart4" class="sw-8 sh-8"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-12 col-xxl-6">
                    <div class="card sh-13 mb-2">
                        <div class="card-body py-0 d-flex align-items-center">
                            <div class="row g-0 d-flex w-100">
                                <div class="col sh-8 d-flex flex-column justify-content-center custom-legend-container"></div>
                                <template class="custom-legend-item">
                                    <div class="text-small text-muted text"></div>
                                    <div class="cta-3 text-primary value"></div>
                                </template>
                                <div class="col-auto">
                                    <canvas id="smallDoughnutChart5" class="sw-8 sh-8"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-12 col-xxl-6">
                    <div class="card sh-13 mb-2">
                        <div class="card-body py-0 d-flex align-items-center">
                            <div class="row g-0 d-flex w-100">
                                <div class="col sh-8 d-flex flex-column justify-content-center custom-legend-container"></div>
                                <template class="custom-legend-item">
                                    <div class="text-small text-muted text"></div>
                                    <div class="cta-3 text-primary value"></div>
                                </template>
                                <div class="col-auto">
                                    <canvas id="smallDoughnutChart6" class="sw-8 sh-8"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Activity End -->
        </div>
        <!-- Overview Tab End -->

        <!-- Projects Tab Start -->
        <div class="tab-pane fade" id="projectsTab" role="tabpanel">
            <div class="mt-5 d-flex justify-content-between">
                <h2 class="small-title">Organisasi</h2>
                <button class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small" type="button" data-bs-toggle="modal" data-bs-target="#org">
                    <span class="align-bottom">Detail</span>
                    <i data-cs-icon="chevron-right" class="align-middle" data-cs-size="12"></i>
                </button>
            </div>
            <!-- Projects Content Start -->

            <div class="row g-2">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>Unit Induk</span>
                                <i data-cs-icon="building-large" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">6</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>Unit Pelaksana</span>
                                <i data-cs-icon="building" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">...</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>Sub Unit Pelaksana</span>
                                <i data-cs-icon="building-small" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">...</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>Kantor Pelayanan</span>
                                <i data-cs-icon="home-garage" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">...</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <h2 class="small-title mt-5">Struktur Organisasi</h2>
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="mb-3 row">
                                <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Unit Induk</label>
                                <div class="col-sm-8 col-md-9 col-lg-10">
                                    <select id="select2Basic" data-width="100%" name="">
                                        <option label="&nbsp;"></option>
                                        <option value="SRK">UIW Kalimantan Timur dan Kalimantan Utara</option>
                                        <option value="SRK">UIW Kalimantan Selatan dan Kalimantan Tengah</option>
                                        <option value="SRK">UIW Kalimantan Barat</option>
                                        <option value="SRK">UIP Kalimantan Bagian Timur</option>
                                        <option value="SRK">UIP Kalimantan Bagian Barat</option>
                                        <option value="SRK">UIKL Kalimantan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Unit Pelaksana</label>
                                <div class="col-sm-8 col-md-9 col-lg-10">
                                    <select id="select2Basic2" data-width="100%" name="">
                                        <option label="&nbsp;"></option>
                                        <option value="SRK">...</option>

                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Sub Unit Pelaksana</label>
                                <div class="col-sm-8 col-md-9 col-lg-10">
                                    <select id="select2Basic3" data-width="100%" name="">
                                        <option label="&nbsp;"></option>
                                        <option value="SRK">...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row mt-5">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-primary">Lihat</button>
                                </div>
                                <div class="col-sm-8 col-md-9 col-lg-10 float-right">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="diagram_container" class="mt-2" style="width: 100%; overflow-x: auto; background-color: #ffffff; border-radius: 15px;"></div>
            </div>

            <!-- Projects Content End -->
        </div>
        <!-- Projects Tab End -->

        <!-- Permissions Tab Start -->
        <div class="tab-pane fade" id="permissionsTab" role="tabpanel">
            <h2 class="small-title">Kinerja HTD</h2>
            <form class="row row-cols-lg-auto g-3 align-items-center">
                <div class="col-12">
                    <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                    <select class="form-select" id="inlineFormSelectPref">
                        <option selected>Semester 1</option>
                        <option value="1">Semester 2</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                    <select class="form-select" id="inlineFormSelectPref">
                        <option>2021</option>
                        <option selected value="1">2022</option>
                        <option value="2">2023</option>
                        <option value="3">2024</option>
                    </select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Lihat</button>
                </div>
            </form>

            <div class="row">
                <div class=" d-flex justify-content-between mt-5">
                    <h2 class="small-title">Nama KPI 1</h2>
                    <button class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small" type="button" data-bs-toggle="modal" data-bs-target="#detailkpi">
                        <span class="align-bottom">Detail</span>
                        <i data-cs-icon="chevron-right" class="align-middle" data-cs-size="12"></i>
                    </button>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="progress sh-2">
                            <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class=" d-flex justify-content-between mt-5">
                    <h2 class="small-title">Nama KPI 2</h2>
                    <button class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small" type="button" data-bs-toggle="modal" data-bs-target="#detailkpi">
                        <span class="align-bottom">Detail</span>
                        <i data-cs-icon="chevron-right" class="align-middle" data-cs-size="12"></i>
                    </button>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="progress sh-2">
                            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class=" d-flex justify-content-between mt-5">
                    <h2 class="small-title">Nama KPI 3</h2>
                    <button class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small" type="button" data-bs-toggle="modal" data-bs-target="#detailkpi">
                        <span class="align-bottom">Detail</span>
                        <i data-cs-icon="chevron-right" class="align-middle" data-cs-size="12"></i>
                    </button>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="progress sh-2">
                            <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">55%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Permissions Tab End -->

        <!-- Friends Tab Start -->
        <div class="tab-pane fade" id="friendsTab" role="tabpanel">
            <form class="row row-cols-lg-auto g-3 align-items-center">
                <div class="col-12">
                    <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                    <select class="form-select" id="inlineFormSelectPref">
                        <option>SMT - 1</option>
                        <option selected value="1">SMT - 2</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                    <select class="form-select" id="inlineFormSelectPref">
                        <option>2021</option>
                        <option selected value="1">2022</option>
                        <option value="2">2023</option>
                        <option value="3">2024</option>
                    </select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Lihat</button>
                </div>
            </form>
            <div class="mt-5 d-flex justify-content-between">
                <h2 class="small-title">Formasi Jabatan Struktural</h2>
                <button class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small" type="button" data-bs-toggle="modal" data-bs-target="#fjs">
                    <span class="align-bottom">Detail</span>
                    <i data-cs-icon="chevron-right" class="align-middle" data-cs-size="12"></i>
                </button>
            </div>
            <div class="row g-2">
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>FJ Struktural</span>
                                <i data-cs-icon="toy" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">107</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>FJ Struktural Terisi</span>
                                <i data-cs-icon="toy" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">100</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>FJ Struktural Kosong</span>
                                <i data-cs-icon="toy" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">7</div>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="small-title mt-5">Rata-rata Masa Kerja Jabatan Terakhir</h2>
            <div class="row g-2">
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>UIW Kaltimra</span>
                                <i data-cs-icon="watch" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">3.2 Tahun</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>UIP Kalbagtim</span>
                                <i data-cs-icon="watch" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">3 Tahun</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>UIW Kalselteng</span>
                                <i data-cs-icon="watch" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">3.2 Tahun</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>UIW Kalbar</span>
                                <i data-cs-icon="watch" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">3.2 Tahun</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>UIP Kalbagbar</span>
                                <i data-cs-icon="watch" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">3.2 Tahun</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>UIKL Kalimantan</span>
                                <i data-cs-icon="watch" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">3.2 Tahun</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 d-flex justify-content-between">
                <h2 class="small-title">Suksesi Jabatan</h2>
                <button class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small" type="button" data-bs-toggle="modal" data-bs-target="#suksesijabatan">
                    <span class="align-bottom">Detail</span>
                    <i data-cs-icon="chevron-right" class="align-middle" data-cs-size="12"></i>
                </button>
            </div>
            <div class="row g-2">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>Jumlah Peg. Promosi</span>
                                <i data-cs-icon="user" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">...</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>Jumlah Peg. Rotasi</span>
                                <i data-cs-icon="user" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">...</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>Jumlah Peg. Demosi</span>
                                <i data-cs-icon="user" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">...</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>Jumlah Peg. Resign</span>
                                <i data-cs-icon="user" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">...</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 d-flex justify-content-between">
                <h2 class="small-title">Diklat Penjenjangan & UPK</h2>
            </div>
            <div class="row g-2">
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>Selesai Dipen</span>
                                <i data-cs-icon="user" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">3/30</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>Selesai UPK</span>
                                <i data-cs-icon="user" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">5/25</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 d-flex justify-content-between">
                <h2 class="small-title">Pembinaan Talenta Pegawai</h2>
            </div>
            <div class="row g-2">
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>Pegawai Naik Grade</span>
                                <i data-cs-icon="user" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">30</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>Pegawai Naik Level Kompetensi</span>
                                <i data-cs-icon="user" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">45</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 d-flex justify-content-between">
                <h2 class="small-title">Kinerja Pegawai</h2>
                <!-- <button class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small" type="button">
                    <span class="align-bottom">Detail</span>
                    <i data-cs-icon="chevron-right" class="align-middle" data-cs-size="12"></i>
                  </button> -->
            </div>
            <div class="row">
                <!-- Line Chart Start -->
                <div class="col-12 col-xl-6">
                    <section class="scroll-section" id="lineChartTitle">
                        <h2 class="small-title">NSK</h2>
                        <div class="card mb-5">
                            <div class="card-body">
                                <div class="sh-35">
                                    <canvas id="lineChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Line Chart End -->
                <!-- Line Chart Start -->
                <div class="col-12 col-xl-6">
                    <section class="scroll-section" id="lineChartTitle">
                        <h2 class="small-title">NKI</h2>
                        <div class="card mb-5">
                            <div class="card-body">
                                <div class="sh-35">
                                    <canvas id="lineChart2"></canvas>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Line Chart End -->
                <!-- Line Chart Start -->
                <div class="col-12 col-xl-12">
                    <section class="scroll-section" id="lineChartTitle">
                        <h2 class="small-title">Talenta</h2>
                        <div class="card mb-5">
                            <div class="card-body">
                                <div class="sh-35">
                                    <canvas id="lineChart3"></canvas>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Line Chart End -->
            </div>
        </div>
        <!-- Friends Tab End -->

        <!-- hcrocr Tab Start -->
        <div class="tab-pane fade" id="hocrTab" role="tabpanel">
            <h2 class="small-title">HCR OCR</h2>
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>
        <!-- hcrocr Tab End -->

        <div class="tab-pane fade" id="dapengTab" role="tabpanel">
            <div class="col">
                <!-- Title and Top Buttons Start -->
                <div class="page-title-container">
                    <div class="row">
                        <!-- Title Start -->
                        <div class="col-12 col-md-7">
                            <h1 class="mb-0 pb-0 display-4" id="title">Data Pengusahaan</h1>
                        </div>
                        <!-- Title End -->
                        <form class="row row-cols-lg-auto g-3 align-items-center mb-3">
                            <div class="col-12">
                                <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                                <select class="form-select" id="inlineFormSelectPref">
                                    <option>2021</option>
                                    <option selected value="1">2022</option>
                                    <option value="2">2023</option>
                                    <option value="3">2024</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                                <select class="form-select" id="inlineFormSelectPref">
                                    <option>Unit Induk Pembangunan</option>
                                    <option selected value="1">Unit Induk Wilayah</option>
                                    <option value="2">Unit Induk Pembangkitan dan Penyaluran</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Lihat</button>
                            </div>
                        </form>
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
                                <!-- <input class="form-control datatable-search" placeholder="Search" data-datatable="#datatableRows" />
                                <span class="search-magnifier-icon">
                                    <i data-cs-icon="search"></i>
                                </span>
                                <span class="search-delete-icon d-none">
                                    <i data-cs-icon="close"></i>
                                </span> -->
                            </div>
                        </div>
                        <!-- Search End -->

                        <div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-end mb-1">
                            <div class="d-inline-block me-0 me-sm-3 float-start float-md-none">
                                <!-- Add Button Start -->

                                <!-- Add Button End -->

                                <!-- Edit Button Start -->

                                <!-- Edit Button End -->
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
                                            5 Items
                                        </span>
                                    </button>
                                    <div class="dropdown-menu shadow dropdown-menu-end">
                                        <a class="dropdown-item active" href="#">5 Items</a>
                                        <a class="dropdown-item " href="#">10 Items</a>
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
                                    <th class="text-muted text-small text-uppercase">No</th>
                                    <th class="text-muted text-small text-uppercase">Unit Induk</th>
                                    <th style="width: 150px;" class="text-muted text-small text-uppercase">JTM</th>
                                    <th style="width: 150px;" class="text-muted text-small text-uppercase">JTR</th>
                                    <th style="width: 150px;" class="text-muted text-small text-uppercase">Gardu Distribusi</th>
                                    <th style="width: 150px;" class="text-muted text-small text-uppercase">Rumah Tangga</th>
                                    <th style="width: 150px;" class="text-muted text-small text-uppercase">Bisnis</th>
                                    <th style="width: 150px;" class="text-muted text-small text-uppercase">Industri</th>
                                    <th style="width: 150px;" class="text-muted text-small text-uppercase">Sosial</th>
                                    <th style="width: 150px;" class="text-muted text-small text-uppercase">Gedung Pemerintah</th>
                                    <th style="width: 150px;" class="text-muted text-small text-uppercase">PJU</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>UIW Kaltimra</td>
                                    <td>9.673</td>
                                    <td>9.335</td>
                                    <td>10.705</td>
                                    <td style="width: 150px;">250.460 MWH <br> 1.109.528 Pelanggan </td>
                                    <td style="width: 150px;">98.492 MWH <br> 69.730 Pelanggan</td>
                                    <td style="width: 150px;">34.382 MWH <br> 553 Pelanggan</td>
                                    <td style="width: 150px;">19.752 MWH <br> 22.897 Pelanggan</td>
                                    <td style="width: 150px;">26.864 MWH <br> 8.832 Pelanggan</td>
                                    <td style="width: 150px;">620 MWH <br> 1.743 Pelanggan</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>UIW Kalselteng</td>
                                    <td>9.673</td>
                                    <td>9.335</td>
                                    <td>10.705</td>
                                    <td style="width: 150px;">250.460 MWH <br> 1.109.528 Pelanggan </td>
                                    <td style="width: 150px;">98.492 MWH <br> 69.730 Pelanggan</td>
                                    <td style="width: 150px;">34.382 MWH <br> 553 Pelanggan</td>
                                    <td style="width: 150px;">19.752 MWH <br> 22.897 Pelanggan</td>
                                    <td style="width: 150px;">26.864 MWH <br> 8.832 Pelanggan</td>
                                    <td style="width: 150px;">620 MWH <br> 1.743 Pelanggan</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>UIW Kalbar</td>
                                    <td>9.673</td>
                                    <td>9.335</td>
                                    <td>10.705</td>
                                    <td style="width: 150px;">250.460 MWH <br> 1.109.528 Pelanggan </td>
                                    <td style="width: 150px;">98.492 MWH <br> 69.730 Pelanggan</td>
                                    <td style="width: 150px;">34.382 MWH <br> 553 Pelanggan</td>
                                    <td style="width: 150px;">19.752 MWH <br> 22.897 Pelanggan</td>
                                    <td style="width: 150px;">26.864 MWH <br> 8.832 Pelanggan</td>
                                    <td style="width: 150px;">620 MWH <br> 1.743 Pelanggan</td>
                                </tr>
                            </tbody>
                        </table>
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

        <!-- hcrocr Tab Start -->
        <div class="tab-pane fade" id="accessTab" role="tabpanel">
            <h2 class="small-title">ACCESS</h2>
            <form class="row row-cols-lg-auto g-3 align-items-center mb-3">
                <div class="col-12">
                    <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                    <select class="form-select" id="inlineFormSelectPref">
                        <option selected value="1">2022</option>
                        <option>2023</option>
                        <option value="2">2024</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                    <select class="form-select" id="inlineFormSelectPref">
                        <option selected value="1">UIW Kaltimra</option>
                        <option>UIW Kalselteng</option>
                        <option value="2">UIW Kalbar</option>
                        <option value="3">UIP Kalbagtim</option>
                        <option value="3">UIP Kalbagbar</option>
                        <option value="3">UIKL Kalimantan</option>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Lihat</button>
                </div>
            </form>
            <div class="">
                <div class="">
                    <!-- Two Rows Start -->
                    <section class="scroll-section" id="twoRows">
                        <div class="row g-0">
                            <div class="col mb-2 justify-content-end align-items-center text-semi-large text-muted d-none d-md-flex">....</div>
                            <div class="col-auto sw-7 d-flex flex-column justify-content-center align-items-center position-relative me-4 ms-0 ms-md-4">
                                <div class="w-100 d-flex h-100"></div>
                                <div class="bg-foreground sw-7 sh-7 rounded-lg shadow d-flex flex-shrink-0 justify-content-center align-items-center mt-n2 position-relative">
                                    <div class="bg-gradient-primary sw-5 sh-5 rounded-md">
                                        <div class="text-white d-flex justify-content-center align-items-center h-100">
                                            <i data-cs-icon="check"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100 d-flex h-100 justify-content-center position-relative">
                                    <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                                </div>
                            </div>
                            <div class="col mb-2">
                                <div class="card h-100">
                                    <div class="card-body d-flex flex-column justify-content-start">
                                        <div class="d-flex flex-column">
                                            <a href="#" class="heading stretched-link">Mapping Talent & Pleno Materi</a>
                                            <div class="text-alternate d-md-none mb-2">....</div>
                                            <div class="text-muted">
                                                Penetapan peserta Accelerate berdasarkan Hasil Mapping Talent dan Pembahasan Pleno Materi dengan Narasumber
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-0">
                            <div class="col mb-2 justify-content-start align-items-center text-semi-large text-muted d-none d-md-flex order-md-3">....</div>
                            <div class="col-auto sw-7 d-flex flex-column justify-content-center align-items-center position-relative me-4 ms-0 ms-md-4 order-md-2">
                                <div class="w-100 d-flex h-100 justify-content-center position-relative">
                                    <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                                </div>
                                <div class="bg-foreground sw-7 sh-7 rounded-lg shadow d-flex flex-shrink-0 justify-content-center align-items-center mt-n2 position-relative">
                                    <div class="bg-gradient-primary sw-5 sh-5 rounded-md">
                                        <div class="text-white d-flex justify-content-center align-items-center h-100">
                                            <i data-cs-icon="clock"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100 d-flex h-100 justify-content-center position-relative">
                                    <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                                </div>
                            </div>
                            <div class="col mb-2 order-md-1">
                                <div class="card h-100">
                                    <div class="card-body d-flex flex-column justify-content-start">
                                        <div class="d-flex flex-column text-md-end">
                                            <a href="#" class="heading stretched-link">Coaching & Counseling</a>
                                            <div class="text-alternate d-md-none mb-2">....</div>
                                            <div class="text-muted">Coaching & Coonseling gap kompetensi oleh tim E-Clinic.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-0">
                            <div class="col mb-2 justify-content-end align-items-center text-semi-large text-muted d-none d-md-flex">....</div>
                            <div class="col-auto sw-7 d-flex flex-column justify-content-center align-items-center position-relative me-4 ms-0 ms-md-4">
                                <div class="w-100 d-flex h-100 justify-content-center position-relative">
                                    <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                                </div>
                                <div class="bg-foreground sw-7 sh-7 rounded-lg shadow d-flex flex-shrink-0 justify-content-center align-items-center mt-n2 position-relative">
                                    <div class="bg-gradient-primary sw-5 sh-5 rounded-md">
                                        <div class="text-white d-flex justify-content-center align-items-center h-100">
                                            <i data-cs-icon="clock"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100 d-flex h-100 justify-content-center position-relative">
                                    <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                                </div>
                            </div>
                            <div class="col mb-2">
                                <div class="card h-100">
                                    <div class="card-body d-flex flex-column justify-content-start">
                                        <div class="d-flex flex-column">
                                            <a href="#" class="heading stretched-link">Pembekalan Materi</a>
                                            <div class="text-alternate d-md-none mb-2">....</div>
                                            <div class="text-muted">
                                                Pembekalan materi best practice dari narasumber.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-0">
                            <div class="col mb-2 justify-content-start align-items-center text-semi-large text-muted d-none d-md-flex order-md-3">....</div>
                            <div class="col-auto sw-7 d-flex flex-column justify-content-center align-items-center position-relative me-4 ms-0 ms-md-4 order-md-2">
                                <div class="w-100 d-flex h-100 justify-content-center position-relative">
                                    <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                                </div>
                                <div class="bg-foreground sw-7 sh-7 rounded-lg shadow d-flex flex-shrink-0 justify-content-center align-items-center mt-n2 position-relative">
                                    <div class="bg-gradient-primary sw-5 sh-5 rounded-md">
                                        <div class="text-white d-flex justify-content-center align-items-center h-100">
                                            <i data-cs-icon="clock"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100 d-flex h-100 justify-content-center position-relative">
                                    <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                                </div>
                            </div>
                            <div class="col mb-2 order-md-1">
                                <div class="card h-100">
                                    <div class="card-body d-flex flex-column justify-content-start">
                                        <div class="d-flex flex-column text-md-end">
                                            <a href="#" class="heading stretched-link">Internship</a>
                                            <div class="text-alternate d-md-none mb-2">....</div>
                                            <div class="text-muted">Job Shadowing ke Unit Induk/Unit Pelaksana/Sub Unit Pelaksana.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-0">
                            <div class="col mb-2 justify-content-end align-items-center text-semi-large text-muted d-none d-md-flex">....</div>
                            <div class="col-auto sw-7 d-flex flex-column justify-content-center align-items-center position-relative me-4 ms-0 ms-md-4">
                                <div class="w-100 d-flex h-100 justify-content-center position-relative">
                                    <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                                </div>
                                <div class="bg-foreground sw-7 sh-7 rounded-lg shadow d-flex flex-shrink-0 justify-content-center align-items-center mt-n2 position-relative">
                                    <div class="bg-gradient-primary sw-5 sh-5 rounded-md">
                                        <div class="text-white d-flex justify-content-center align-items-center h-100">
                                            <i data-cs-icon="clock"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100 d-flex h-100 justify-content-center position-relative">
                                    <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                                </div>
                            </div>
                            <div class="col mb-2">
                                <div class="card h-100">
                                    <div class="card-body d-flex flex-column justify-content-start">
                                        <div class="d-flex flex-column">
                                            <a href="#" class="heading stretched-link">Review</a>
                                            <div class="text-alternate d-md-none mb-2">....</div>
                                            <div class="text-muted">
                                                Review hasil pengembangan kompetensi.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-0">
                            <div class="col mb-2 justify-content-start align-items-center text-semi-large text-muted d-none d-md-flex order-md-3">....</div>
                            <div class="col-auto sw-7 d-flex flex-column justify-content-center align-items-center position-relative me-4 ms-0 ms-md-4 order-md-2">
                                <div class="w-100 d-flex h-100 justify-content-center position-relative">
                                    <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                                </div>
                                <div class="bg-foreground sw-7 sh-7 rounded-lg shadow d-flex flex-shrink-0 justify-content-center align-items-center mt-n2 position-relative">
                                    <div class="bg-gradient-primary sw-5 sh-5 rounded-md">
                                        <div class="text-white d-flex justify-content-center align-items-center h-100">
                                            <i data-cs-icon="clock"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100 d-flex h-100 justify-content-center position-relative"></div>
                            </div>
                            <div class="col mb-2 order-md-1">
                                <div class="card h-100">
                                    <div class="card-body d-flex flex-column justify-content-start">
                                        <div class="d-flex flex-column text-md-end">
                                            <a href="#" class="heading stretched-link">Ready Talent</a>
                                            <div class="text-alternate d-md-none mb-2">....</div>
                                            <div class="text-muted">
                                                Rekomendasi dan penetapan talent yang memenuhi kriteria.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                    <!-- Two Rows End -->
                </div>
            </div>
        </div>
        <!-- hcrocr Tab End -->

        <!-- e-clinic Tab Start -->
        <div class="tab-pane fade" id="eclinicTab" role="tabpanel">
            <h2 class="small-title">e-Clinic</h2>
            <form class="row row-cols-lg-auto g-3 align-items-center mb-3">
                <div class="col-12">
                    <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                    <select class="form-select" id="inlineFormSelectPref">
                        <option selected value="1">2022</option>
                        <option>2023</option>
                        <option value="2">2024</option>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Lihat</button>
                </div>
            </form>
            <div class="row g-2 mb-5">
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>Pendaftar E-Clinic</span>
                                <i data-cs-icon="user" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">116</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>Selesai Sesi E-Clinic</span>
                                <i data-cs-icon="check-circle" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">100</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Rounded Bar Chart Start -->
            <div class="col-12 col-xl-12">
                <section class="scroll-section" id="roundedBarChartTitle">
                    <div class="d-flex justify-content-between">
                        <h2 class="small-title">E-Clinic Journey</h2>
                        <button class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small" type="button">
                            <span class="align-bottom">Detail</span>
                            <i data-cs-icon="chevron-right" class="align-middle" data-cs-size="12"></i>
                        </button>
                    </div>
                    <div class="card mb-5">
                        <div class="card-body">
                            <div class="sh-35">
                                <canvas id="roundedBarChart2"></canvas>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Rounded Bar Chart End -->

        </div>
        <!-- e-clinic Tab End -->

        <!-- e-care Tab Start -->
        <div class="tab-pane fade" id="ecareTab" role="tabpanel">
            <h2 class="small-title">e-Care</h2>
            <form class="row row-cols-lg-auto g-3 align-items-center mb-3">
                <div class="col-12">
                    <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                    <select class="form-select" id="inlineFormSelectPref">
                        <option selected value="1">2022</option>
                        <option>2023</option>
                        <option value="2">2024</option>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Lihat</button>
                </div>
            </form>
            <div class="row g-2 mb-5">
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>Jumlah Tiket</span>
                                <i data-cs-icon="user" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">116</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>Tiket Selesai</span>
                                <i data-cs-icon="check-circle" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">100</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Rounded Bar Chart Start -->
            <div class="col-12 col-xl-12">
                <section class="scroll-section" id="lineChartTitle">
                    <h2 class="small-title">Monitoring e-care</h2>
                    <div class="card mb-5">
                        <div class="card-body">
                            <div class="sh-35">
                                <canvas id="lineChart4"></canvas>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Rounded Bar Chart End -->

        </div>
        <!-- e-clinic Tab End -->

        <!-- hcrocr Tab Start -->
        <div class="tab-pane fade" id="kalenderTab" role="tabpanel">
            <h2 class="small-title">Kalender HTD Area 4</h2>
            <div class="container">
                <!-- Title and Top Buttons Start -->
                <div class="page-title-container">
                    <div class="row g-0">
                        <div class="col-auto mb-2 mb-md-0 me-auto">
                            <div class="w-auto sw-md-30">
                                <h1 class="mb-0 pb-0 display-4" id="title">Calendar</h1>
                                <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                                    <ul class="breadcrumb pt-0">
                                        <li class="breadcrumb-item">
                                            <a href="Dashboards.Default.html">Home</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="Apps.html">Apps</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="w-100 d-md-none"></div>
                        <div class="col-auto d-flex align-items-start justify-content-end">
                            <button type="button" class="btn btn-outline-primary btn-icon btn-icon-only ms-1" id="goPrev">
                                <i data-cs-icon="chevron-left"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary btn-icon btn-icon-only ms-1" id="goNext">
                                <i data-cs-icon="chevron-right"></i>
                            </button>
                        </div>
                        <div class="col col-md-auto d-flex align-items-start justify-content-end">
                            <button type="button" class="btn btn-outline-primary btn-icon btn-icon-start ms-1 w-100 w-md-auto" id="addNewEvent">
                                <i data-cs-icon="plus"></i>
                                <span>Add Event</span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Title and Top Buttons End -->

                <!-- Calendar Title Start -->
                <div class="d-flex justify-content-between">
                    <h2 class="small-title" id="calendarTitle">Title</h2>
                    <button class="btn btn-sm btn-icon btn-icon-only btn-foreground shadow align-top mt-n2" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                        <i data-cs-icon="more-horizontal" data-cs-size="15"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end shadow">
                        <a class="dropdown-item" href="#" id="monthView">Month</a>
                        <a class="dropdown-item" href="#" id="weekView">Week</a>
                        <a class="dropdown-item" href="#" id="dayView">Day</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" id="goToday">Today</a>
                    </div>
                </div>
                <!-- Calendar Title End -->

                <!-- Calendar Content Start -->
                <div class="card">
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
                <!-- Calendar Content End -->

                <!-- New Task Start -->
                <div class="modal modal-right fade" id="newEventModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle">Add Event</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body d-flex flex-column">
                                <div class="mb-3 top-label">
                                    <input class="form-control" id="eventTitle" />
                                    <span>TITLE</span>
                                </div>
                                <div class="mb-3 top-label">
                                    <select id="eventCategory">
                                        <option label="&nbsp;"></option>
                                        <option data-class="border-primary" value="Work">Work</option>
                                        <option data-class="border-tertiary" value="Personal">Personal</option>
                                        <option data-class="border-secondary" value="Education">Education</option>
                                    </select>
                                    <span>CATEGORY</span>
                                </div>
                                <div class="row g-0">
                                    <div class="col pe-2">
                                        <div class="mb-3 top-label">
                                            <input type="text" data-provide="datepicker" class="form-control" data-date-autoclose="true" id="eventStartDate" />
                                            <span>START DATE</span>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="mb-3 top-label custom-control-container time-picker-container">
                                            <input class="form-control time-picker" id="eventStartTime" />
                                            <span>START TIME</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-0">
                                    <div class="col pe-2">
                                        <div class="mb-3 top-label">
                                            <input type="text" data-provide="datepicker" class="form-control" data-date-autoclose="true" id="eventEndDate" />
                                            <span>END DATE</span>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="mb-3 top-label custom-control-container time-picker-container">
                                            <input class="form-control time-picker" id="eventEndTime" />
                                            <span>END TIME</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer border-0">
                                <button class="btn btn-icon btn-icon-only btn-outline-primary" type="button" data-delay='{"show":"500", "hide":"0"}' data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" id="deleteEvent">
                                    <i data-cs-icon="bin"></i>
                                </button>
                                <button class="btn btn-icon btn-icon-end btn-primary" type="button" id="saveEvent">
                                    <span>Save</span>
                                    <i data-cs-icon="check"></i>
                                </button>
                                <button class="btn btn-icon btn-icon-start btn-primary" type="button" id="addEvent">
                                    <i data-cs-icon="plus"></i>
                                    <span>Add</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- New Task End -->

                <!-- Delete Confirm Modal Start -->
                <div class="modal fade modal-close-out" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="verticallyCenteredLabel">Are you sure?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <span id="deleteConfirmDetail" class="fw-bold"></span>
                                <span>will be deleted. Are you sure?</span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                                <button type="button" id="deleteConfirmButton" class="btn btn-outline-primary">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Delete Confirm Modal End -->
            </div>
        </div>
        <!-- hcrocr Tab End -->

        <!-- pembelajaran Tab Start -->
        <div class="tab-pane fade" id="pembelajaranTab" role="tabpanel">
            <div class="row">
                <h2 class="small-title" style="margin-bottom: -30px;">Pembelajaran</h2>
                <form class="row row-cols-lg-auto g-3 align-items-center mb-3">
                    <div class="col-12">
                        <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                        <select class="form-select" id="inlineFormSelectPref">
                            <option>2021</option>
                            <option selected value="1">2022</option>
                            <option value="2">2023</option>
                            <option value="3">2024</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Lihat</button>
                    </div>
                </form>
                <!-- Rounded Bar Chart Start -->
                <div class="col-12 col-xl-12">
                    <section class="scroll-section" id="roundedBarChartTitle">
                        <div class="d-flex justify-content-between">
                            <h2 class="small-title">Realisasi Pembelajaran</h2>
                            <button class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small" type="button" data-bs-toggle="modal" data-bs-target="#realisasidiklat">
                                <span class="align-bottom">Detail</span>
                                <i data-cs-icon="chevron-right" class="align-middle" data-cs-size="12"></i>
                            </button>
                        </div>
                        <div class="card mb-5">
                            <div class="card-body">
                                <div class="sh-35">
                                    <canvas id="roundedBarChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Rounded Bar Chart End -->
                <!-- Custom Legend Chart Start -->
                <div class="col-12 col-xl-12">
                    <section class="scroll-section" id="customLegendBarTitle">
                        <div class="d-flex justify-content-between">
                            <h2 class="small-title">Jenis Pelaksanaan Pembelajaran Lulus</h2>
                        </div>
                        <div class="card mb-5 sh-45">
                            <div class="card-body">
                                <div class="custom-legend-container mb-3 pb-3 d-flex flex-row"></div>
                                <template class="custom-legend-item">
                                    <a href="#" class="d-flex flex-row g-0 align-items-center me-5">
                                        <div class="pe-2">
                                            <div class="icon-container border sw-5 sh-5 rounded-xl d-flex justify-content-center align-items-center">
                                                <i class="icon"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="text p mb-0 d-flex align-items-center text-small text-muted">Title</div>
                                            <div class="value cta-4">Value</div>
                                        </div>
                                    </a>
                                </template>
                                <div class="sh-30">
                                    <canvas id="customLegendBarChart"></canvas>
                                    <div class="custom-tooltip position-absolute bg-foreground rounded-md border border-separator pe-none p-3 d-flex z-index-1 align-items-center opacity-0 basic-transform-transition">
                                        <div class="icon-container border d-flex align-middle align-items-center justify-content-center align-self-center rounded-xl sh-5 sw-5 rounded-xl me-3">
                                            <span class="icon"></span>
                                        </div>
                                        <div>
                                            <span class="text d-flex align-middle text-muted align-items-center text-small">Bread</span>
                                            <span class="value d-flex align-middle align-items-center cta-4">300</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Custom Legend Chart End -->
            </div>
        </div>
        <!-- pembelajaran Tab End -->

        <!-- About Tab Start -->
        <div class="tab-pane fade" id="sertifikasiTab" role="tabpanel">
            <form class="row row-cols-lg-auto g-3 align-items-center mb-3">
                <div class="col-12">
                    <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                    <select class="form-select" id="inlineFormSelectPref">
                        <option>2021</option>
                        <option selected value="1">2022</option>
                        <option value="2">2023</option>
                        <option value="3">2024</option>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Lihat</button>
                </div>
            </form>
            <div class="mt-5 d-flex justify-content-between">
                <h2 class="small-title">Sertifikasi</h2>
                <button class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small" type="button" data-bs-toggle="modal" data-bs-target="#sertifikasiok">
                    <span class="align-bottom">Detail</span>
                    <i data-cs-icon="chevron-right" class="align-middle" data-cs-size="12"></i>
                </button>
            </div>
            <div class="row g-2">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>Rencana Sertifikasi</span>
                                <i data-cs-icon="toy" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">110</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>Sertifikasi Terlaksana</span>
                                <i data-cs-icon="toy" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">10</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>Sertifikat Aktif</span>
                                <i data-cs-icon="toy" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">...</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card hover-border-primary">
                        <div class="card-body">
                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                <span>Perlu Perpanjangan</span>
                                <i data-cs-icon="toy" class="text-primary"></i>
                            </div>
                            <div class="cta-1 text-primary">...</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 d-flex justify-content-between">
                <h2 class="small-title">Grafik</h2>
                <button class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small" type="button">
                    <!-- <span class="align-bottom">Detail</span>
                    <i data-cs-icon="chevron-right" class="align-middle" data-cs-size="12"></i> -->
                </button>
            </div>
            <div class="row">
                <!-- Rounded Bar Chart Start -->
                <div class="col-12 col-xl-12">
                    <section class="scroll-section" id="areaChartTitle">
                        <div class="d-flex justify-content-between">
                            <h2 class="small-title">Monitor Sertifikasi Pegawai</h2>
                            <!-- <button class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small" type="button">
                          <span class="align-bottom">Detail</span>
                          <i data-cs-icon="chevron-right" class="align-middle" data-cs-size="12"></i>
                        </button> -->
                        </div>
                        <div class="card mb-5">
                            <div class="card-body">
                                <div class="sh-35">
                                    <canvas id="areaChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Rounded Bar Chart End -->
            </div>
        </div>
        <!-- About Tab End -->

        <!-- About Tab Start -->
        <div class="tab-pane fade" id="aboutTab" role="tabpanel">
            <h2 class="small-title">About</h2>
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>
        <!-- About Tab End -->
    </div>
    <!-- Right Side End -->
</div>
<!-- Modal  Demografi Pegawai-->
<div class="modal fade" id="demografipegawai" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-semi-full modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Demografi Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive-sm table-hover mb-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Unit</th>
                                <th scope="col">Jumlah Pegawai</th>
                                <th scope="col">Laki-Laki</th>
                                <th scope="col">Perempuan</th>
                                <th scope="col">HCMS</th>
                                <th scope="col">Non HCMS</th>
                                <th scope="col">S3-S2</th>
                                <th scope="col">S1-D3</th>
                                <th scope="col">SLTA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>UIW Kaltimra</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>UIW Kalselteng</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>UIW Kalbar</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>UIP Kalbagtim</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>UIP Kalbagbar</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>UIKL Kalimantan</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal  Demografi Alih Daya-->
<div class="modal fade" id="demografipegawaiad" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-semi-full modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Demografi Alih Daya</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive-sm table-hover mb-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Unit</th>
                                <th scope="col">Jumlah Alih Daya</th>
                                <th scope="col">Kontrak AP</th>
                                <th scope="col">Kontrak Swasta</th>
                                <th scope="col">Alih Daya Teknik</th>
                                <th scope="col">Alih Daya Non Teknik</th>
                                <th scope="col">Hardung</th>
                                <th scope="col">Satpam</th>
                                <th scope="col">Driver</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>UIW Kaltimra</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>UIW Kalselteng</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>UIW Kalbar</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>UIP Kalbagtim</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>UIP Kalbagbar</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>UIKL Kalimantan</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal  Demografi Org-->
<div class="modal fade" id="org" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-semi-full modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Organisasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive-sm table-hover mb-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Unit Induk</th>
                                <th scope="col">Unit Pelaksana</th>
                                <th scope="col">Sub Unit Pelaksana</th>
                                <th scope="col">Kantor Pelayanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>UIW Kaltimra</td>
                                <td>
                                    <button class="btn btn-background-alternate p-0 text-small" type="button" data-bs-toggle="modal" data-bs-target="#up">8</button>
                                </td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>UIW Kalselteng</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>UIW Kalbar</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>UIP Kalbagtim</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>UIP Kalbagbar</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>UIKL Kalimantan</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal  Demografi UP-->
<div class="modal fade" id="up" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Unit Pelaksana [nama unit induk]</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive-sm table-hover mb-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Unit Pelaksana</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>UP3 Balikpapan</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>UP3 Samarinda</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>UP3 Bontang</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>UP3 Berau</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>UP3 Kaltara</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>UP2D Kaltimra</td>
                            </tr>
                            <tr>
                                <th scope="row">7</th>
                                <td>UP2K Prov Kaltim</td>
                            </tr>
                            <tr>
                                <th scope="row">8</th>
                                <td>UP2K Prov Kaltara</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal  FJS-->
<div class="modal fade" id="fjs" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-semi-full modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Formasi Jabatan Struktural</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive-sm table-hover mb-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="" rowspan="2" style="text-align: center;">NO</th>
                                <th scope="col" rowspan="2" style="text-align: center;">Unit Induk</th>
                                <th scope="col" colspan="3" style="text-align: center;">MA</th>
                                <th scope="col" colspan="3" style="text-align: center;">MM</th>
                                <th scope="col" colspan="3" style="text-align: center;">MD</th>
                                <th scope="col" colspan="3" style="text-align: center;">SPV-A</th>
                                <th scope="col" colspan="3" style="text-align: center;">SPV-D</th>
                            </tr>
                            <tr>
                                <th style="text-align: center;">FJ</th>
                                <th style="text-align: center;">Terisi</th>
                                <th style="text-align: center;">Kosong</th>
                                <th style="text-align: center;">FJ</th>
                                <th style="text-align: center;">Terisi</th>
                                <th style="text-align: center;">Kosong</th>
                                <th style="text-align: center;">FJ</th>
                                <th style="text-align: center;">Terisi</th>
                                <th style="text-align: center;">Kosong</th>
                                <th style="text-align: center;">FJ</th>
                                <th style="text-align: center;">Terisi</th>
                                <th style="text-align: center;">Kosong</th>
                                <th style="text-align: center;">FJ</th>
                                <th style="text-align: center;">Terisi</th>
                                <th style="text-align: center;">Kosong</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" style="text-align: center;">1</th>
                                <td>UIW Kaltimra</td>
                                <td style="text-align: center;">1</td>
                                <td style="text-align: center;">
                                    <button class="btn btn-background-alternate p-0 text-small" type="button" data-bs-toggle="modal" data-bs-target="#fjsmaterisi">1</button>
                                </td>
                                <td style="text-align: center;">
                                    <button class="btn btn-background-alternate p-0 text-small" type="button" data-bs-toggle="modal" data-bs-target="#fjsmakosong">0</button>
                                </td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">
                                    <button class="btn btn-background-alternate p-0 text-small" type="button" data-bs-toggle="modal" data-bs-target="#fjsmmterisi">...</button>
                                </td>
                                <td style="text-align: center;">
                                    <button class="btn btn-background-alternate p-0 text-small" type="button" data-bs-toggle="modal" data-bs-target="#fjsmmkosong">...</button>
                                </td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">
                                    <button class="btn btn-background-alternate p-0 text-small" type="button" data-bs-toggle="modal" data-bs-target="#fjsmdterisi">...</button>
                                </td>
                                <td style="text-align: center;">
                                    <button class="btn btn-background-alternate p-0 text-small" type="button" data-bs-toggle="modal" data-bs-target="#fjsmdkosong">...</button>
                                </td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">
                                    <button class="btn btn-background-alternate p-0 text-small" type="button" data-bs-toggle="modal" data-bs-target="#fjsspvaterisi">...</button>
                                </td>
                                <td style="text-align: center;">
                                    <button class="btn btn-background-alternate p-0 text-small" type="button" data-bs-toggle="modal" data-bs-target="#fjsspvakosong">...</button>
                                </td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">
                                    <button class="btn btn-background-alternate p-0 text-small" type="button" data-bs-toggle="modal" data-bs-target="#fjsspvdterisi">...</button>
                                </td>
                                <td style="text-align: center;">
                                    <button class="btn btn-background-alternate p-0 text-small" type="button" data-bs-toggle="modal" data-bs-target="#fjsspvdkosong">...</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align: center;">2</th>
                                <td>UIW Kalselteng</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align: center;">3</th>
                                <td>UIW Kalbar</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align: center;">4</th>
                                <td>UIP Kalbagtim</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align: center;">5</th>
                                <td>UIP Kalbagbar</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                            </tr>
                            <tr>
                                <th scope="row" style="text-align: center;">6</th>
                                <td>UIKL Kalimantan</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                                <td style="text-align: center;">...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal  Detail FJSMA-->
<div class="modal fade" id="fjsmaterisi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">FJ MA Terisi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive-sm table-hover mb-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Formasi Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>General Manager PT PLN (Persero) UIW Kaltimra</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal  Detail FJSMA-->
<div class="modal fade" id="fjsmakosong" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">FJ MA Kosong</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive-sm table-hover mb-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Formasi Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal  Detail FJSMA-->
<div class="modal fade" id="fjsmmterisi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">FJ MM Terisi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive-sm table-hover mb-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Formasi Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal  Detail FJSMA-->
<div class="modal fade" id="fjsmmkosong" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">FJ MM Kosong</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive-sm table-hover mb-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Formasi Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal  Detail FJSMA-->
<div class="modal fade" id="fjsmdterisi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">FJ MD Terisi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive-sm table-hover mb-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Formasi Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal  Detail FJSMA-->
<div class="modal fade" id="fjsmdkosong" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">FJ MD Kosong</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive-sm table-hover mb-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Formasi Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal  Detail FJSMA-->
<div class="modal fade" id="fjsspvaterisi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">FJ SPV-A Terisi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive-sm table-hover mb-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Formasi Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal  Detail FJSMA-->
<div class="modal fade" id="fjsspvamakosong" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">FJ SPV-A Kosong</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive-sm table-hover mb-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Formasi Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal  Detail FJSMA-->
<div class="modal fade" id="fjsspvdterisi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">FJ SPV-D Terisi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive-sm table-hover mb-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Formasi Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal  Detail FJSMA-->
<div class="modal fade" id="fjsspvdkosong" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">FJ SPV-D Kosong</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive-sm table-hover mb-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Formasi Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal  Demografi Org-->
<div class="modal fade" id="suksesijabatan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-semi-full modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Suksesi Jabatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive-sm table-hover mb-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Unit Induk</th>
                                <th scope="col">Jumlah Pegawai Promosi</th>
                                <th scope="col">Jumlah Pegawai Rotasi</th>
                                <th scope="col">Jumlah Pegawai Demosi</th>
                                <th scope="col">Jumlah Pegawai Resign</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>UIW Kaltimra</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>UIW Kalselteng</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>UIW Kalbar</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>UIP Kalbagtim</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>UIP Kalbagbar</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>UIKL Kalimantan</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal  Demografi Org-->
<div class="modal fade" id="dipenupk" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-semi-full modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Dipen & UPK</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive-sm table-hover mb-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Unit Induk</th>
                                <th scope="col">Diklat Penjenjangan</th>
                                <th scope="col">Jumlah Pegawai Rotasi</th>
                                <th scope="col">Jumlah Pegawai Demosi</th>
                                <th scope="col">Jumlah Pegawai Resign</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>UIW Kaltimra</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>UIW Kalselteng</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>UIW Kalbar</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>UIP Kalbagtim</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>UIP Kalbagbar</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>UIKL Kalimantan</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal  Demografi Org-->
<div class="modal fade" id="realisasidiklat" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-semi-full modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Realisasi Pembelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive-sm table-hover mb-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Unit Induk</th>
                                <th scope="col">Diundang</th>
                                <th scope="col">Lulus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>UIW Kaltimra</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>UIW Kalselteng</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>UIW Kalbar</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>UIP Kalbagtim</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>UIP Kalbagbar</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>UIKL Kalimantan</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal  Sertifikasi Oke-->
<div class="modal fade" id="sertifikasiok" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-semi-full modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Sertifikasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive-sm table-hover mb-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Unit Induk</th>
                                <th scope="col">Rencana Sertifikasi</th>
                                <th scope="col">Sertifikasi Terlaksana</th>
                                <th scope="col">Sertifikat Aktif</th>
                                <th scope="col">Perlu Perpanjangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>UIW Kaltimra</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>UIW Kalselteng</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>UIW Kalbar</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>UIP Kalbagtim</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>UIP Kalbagbar</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>UIKL Kalimantan</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal  Sertifikasi Oke-->
<div class="modal fade" id="detailkpi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-semi-full modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail [Nama KPI]</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive-sm table-hover mb-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Unit Induk</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Polarisasi</th>
                                <th scope="col">Target</th>
                                <th scope="col">Realisasi</th>
                                <th scope="col">Persentase Pencapaian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>UIW Kaltimra</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>UIW Kalselteng</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>UIW Kalbar</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>UIP Kalbagtim</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>UIP Kalbagbar</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>UIKL Kalimantan</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
<script src="<?= base_url() ?>/template/js/plugins/datatable.editablerows2.js"></script>
<script src="<?= base_url() ?>/template/js/common.js"></script>
<script src="<?= base_url() ?>/template/js/scripts.js"></script>
<!-- Page Specific Scripts End -->

<?= $this->endSection() ?>