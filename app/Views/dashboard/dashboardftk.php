<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Dashboard FTK</title>
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
<style>
    .th-sticky {
      position: sticky;
      top: 0;                 /* posisinya tetap di atas */
      background-color: #fff !important;
      z-index: 2;             /* supaya selalu di atas isi tabel */
    }

    .btn-mini {
        padding: 2px 6px;
        font-size: 0.75rem;
        line-height: 1;
        border-radius: 0.2rem;
     }

     .f-dj {
        font-size: 0.75rem;
     }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="page-title-container">
    <div class="row">
        <!-- Title Start -->
        <div class="col-12 col-md-7">
            <h4 class="mb-2 pb-0" id="title">Workforce Allocation Dashboard</h4>
            <blockquote class="blockquote">
                <footer class="blockquote-footer">
                    Daily Statistic of workforce allocation
                    <cite title="Source Title"></cite>
                </footer>
            </blockquote>
        </div>
        <!-- Title End -->
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card mt-1">
            <div class="card-body">
                <!-- start row filters -->
                <div class="row">
                    <div class="col-12">
                        <form class="row row-cols" >
                            <div class="col-4">
                                <blockquote class="blockquote" style="margin-bottom: -1px;">
                                    <footer class="blockquote-footer">
                                        <em>Area & Unit</em>
                                        <cite title="Source Title"></cite>
                                    </footer>
                                </blockquote>
                                <div class="input-group">
                                    <select class="form-select" id="inlineFormSelectPref">
                                        <option selected>Area (All)</option>
                                        <option value="1">HTD Area 1</option>
                                        <option value="2">HTD Area 2</option>
                                        <option value="3">HTD Area 3</option>
                                        <option value="3">HTD Area 4</option>
                                        <option value="3">HTD Area 5</option>
                                        <option value="3">HTD Area 6</option>
                                        <option value="3">HTD Area 7</option>
                                        <option value="3">HTD Area 8</option>
                                        <option value="3">HTD Area 9</option>
                                        <option value="3">HTD Area 10</option>
                                    </select>
                                    <select class="form-select" id="inlineFormSelectPref">
                                        <option selected>Unit</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <blockquote class="blockquote" style="margin-bottom: -1px;">
                                    <footer class="blockquote-footer">
                                        <em>Start Month & Year Data</em>
                                        <cite title="Source Title"></cite>
                                    </footer>
                                </blockquote>
                                <div class="input-group">
                                    <select class="form-select" id="inlineFormSelectPref">
                                        <option selected value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">Nopember</option>
                                        <option value="12">Desember</option>
                                    </select>
                                    <select class="form-select" id="inlineFormSelectPref">
                                        <option selected>2025</option>
                                        <option value="1">2026</option>
                                        <option value="2">2027</option>
                                        <option value="3">2028</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <blockquote class="blockquote" style="margin-bottom: -1px;">
                                    <footer class="blockquote-footer">
                                        <em>End Month & Year Data</em>
                                        <cite title="Source Title"></cite>
                                    </footer>
                                </blockquote>
                                <div class="input-group">
                                    <select class="form-select" id="inlineFormSelectPref">
                                        <option selected value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">Nopember</option>
                                        <option value="12">Desember</option>
                                    </select>
                                    <select class="form-select" id="inlineFormSelectPref">
                                        <option selected>2025</option>
                                        <option value="1">2026</option>
                                        <option value="2">2027</option>
                                        <option value="3">2028</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Row Filters -->
                <div class="row mt-4">
                    <!-- Start Row FTK % -->
                    <div class="col-3">
                        <div class="card border-primary">
                            <div class="card-body">
                                <!-- start judul -->
                                <div class="row" style="margin-top: -25px;">
                                    <div class="col-12 text-center">
                                        <p style="font-size: 12px;" class="fw-bold">% Realisasi FTK All - 07.2025 to 08.2025</p>
                                    </div>
                                </div>
                                <!-- End Judul -->
                                <!-- Start isi -->
                                 <div class="row">
                                    <!-- start isi kiri -->
                                    <div class="col-6">
                                        <h1 class="fw-bold">96,5 %</h1>
                                        <br>
                                        <p style="font-size: 12px; margin-top: -25px;">39.000 of 42.000</p>
                                    </div>
                                    <!-- end isi kiri -->
                                    <div class="col-6 d-flex align-items-center text-medium text-danger justify-content-center" >
                                        <i data-cs-icon="arrow-bottom" data-cs-size="16" class="me-1 fw-bold"></i>
                                        <span class="text-medium">-18.4%<br>-30 today</span>
                                    </div>
                                 </div>
                                <!-- End isi kiri -->
                                <!-- Start in out -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-grid gap-2">
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <button type="button" class="btn btn-icon btn-icon-start btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#semiFullIn">
                                                    <!-- <i data-cs-icon="user"></i> -->
                                                    <span>in: 5</span>
                                                </button>
                                                <button type="button" class="btn btn-icon btn-icon-start btn-secondary mb-1" data-bs-toggle="modal" data-bs-target="#semiFullOut">
                                                    <!-- <i data-cs-icon="user"></i> -->
                                                    <span>out: 35</span>
                                                </button>
                                            </div>
                                            <span class="" style="font-size: 12px; margin-top: -10px;"><small><em>*until end of 08.2025</em></small></span>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <!-- End in out -->
                                <!-- start chart -->
                                <div class="row g-0 d-flex w-100 align-items-center">
                                    <div class="col-6 d-flex flex-column justify-content-center">
                                        <div class="custom-tooltip">
                                            <div class="title heading"></div>
                                            <div class="text-small text-muted text"></div>
                                            <i class="icon d-inline-block align-middle me-1 text-primary" data-acorn-size="15"></i>
                                            <div class="cta-4 text-primary value d-inline-block align-middle"></div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <canvas id="smallLineChart1" class="sw-10 sw-xl-30 sh-5"></canvas>
                                    </div>
                                </div>
                                <!-- end of chart -->
                            </div>
                        </div>
                    </div>
                    <!-- End Row FTK % -->
                    <div class="col-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <blockquote class="blockquote" >
                                        <footer class="blockquote-footer" style="margin-top: -36px; margin-bottom: 15px;">
                                            <span>Realisasi FTK per Jenjang Jabatan</span>
                                            <a href="<?=base_url('strukturorg/monitoringftk')?>" class="text-primary float-end">View More <i data-cs-icon="chevron-right" class="align-middle" data-cs-size="12"></i></a>
                                        </footer>
                                    </blockquote>
                                    <div class="col-md-2">
                                        <div class="card text-center" style="margin-top: -30px;">
                                            <div class="card-body shadow-lg rounded">
                                                <div class="row">
                                                    <div class="col-12" style="margin-top: -5px; padding-left: 0px; padding-right: 0px;">
                                                        <strong>
                                                            <h6 class="fw-bold f-dj">MA : 88,4%</h6>
                                                        </strong>
                                                    </div>
                                                    <div class="col-lg-12" style="margin-top: -5px; font-size: 10px;">
                                                        <strong>
                                                            <h6 class=""><em>99 of 112</em></h6>
                                                        </strong>
                                                    </div>
                                                    <div class="col-lg-12 mb-2" style="margin-top: px; font-size: 14px;">
                                                        <strong>
                                                            <div class="d-flex gap-1 text-center" style="margin-left: -11px;">
                                                                <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Belum Terisi" >
                                                                    <a href="#" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#fjKosong" >13</a>
                                                                </span>
                                                                <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Sudah direncanakan Terisi" >
                                                                    <a href="#" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#fjprosesterisi" >03</a>
                                                                </span>
                                                                <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Terisi" >
                                                                    <a href="#" class="badge bg-success" data-bs-toggle="modal" data-bs-target="#fjterisi" >96</a>
                                                                </span>    
                                                            </div>
                                                        </strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card text-center" style="margin-top: -30px;">
                                            <div class="card-body shadow-lg rounded">
                                                <div class="row">
                                                    <div class="col-12" style="margin-top: -5px; padding-left: 0px; padding-right: 0px;">
                                                        <strong>
                                                            <h6 class="fw-bold f-dj">MM : 96,6%</h6>
                                                        </strong>
                                                    </div>
                                                    <div class="col-lg-12" style="margin-top: -5px; font-size: 10px;">
                                                        <strong>
                                                            <h6 class=""><em>461 of 477</em></h6>
                                                        </strong>
                                                    </div>
                                                    <div class="col-lg-12 mb-2" style="margin-top: px; font-size: 14px;">
                                                        <strong>
                                                            <div class="d-flex gap-1 text-center" style="margin-left: -11px;">
                                                                <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Belum Terisi" >
                                                                    <a href="#" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#fjKosong" >13</a>
                                                                </span>
                                                                <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Sudah direncanakan Terisi" >
                                                                    <a href="#" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#fjprosesterisi" >03</a>
                                                                </span>
                                                                <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Terisi" >
                                                                    <a href="#" class="badge bg-success" data-bs-toggle="modal" data-bs-target="#fjterisi" >96</a>
                                                                </span>    
                                                            </div>
                                                        </strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card text-center" style="margin-top: -30px;">
                                            <div class="card-body shadow-lg rounded">
                                                <div class="row">
                                                    <div class="col-12" style="margin-top: -5px; padding-left: 0px; padding-right: 0px;">
                                                        <strong>
                                                            <h6 class="fw-bold f-dj">MD : 97,7%</h6>
                                                        </strong>
                                                    </div>
                                                    <div class="col-lg-12" style="margin-top: -5px; font-size: 10px;">
                                                        <strong>
                                                            <h6 class=""><em>1.749 of 1.790</em></h6>
                                                        </strong>
                                                    </div>
                                                    <div class="col-lg-12 mb-2" style="margin-top: px; font-size: 14px;">
                                                        <strong>
                                                            <div class="d-flex gap-1 text-center" style="margin-left: -11px;">
                                                                <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Belum Terisi" >
                                                                    <a href="#" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#fjKosong" >13</a>
                                                                </span>
                                                                <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Sudah direncanakan Terisi" >
                                                                    <a href="#" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#fjprosesterisi" >03</a>
                                                                </span>
                                                                <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Terisi" >
                                                                    <a href="#" class="badge bg-success" data-bs-toggle="modal" data-bs-target="#fjterisi" >96</a>
                                                                </span>    
                                                            </div>
                                                        </strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card text-center" style="margin-top: -30px;">
                                            <div class="card-body shadow-lg rounded">
                                                <div class="row">
                                                    <div class="col-12" style="margin-top: -5px; padding-left: 0px; padding-right: 0px;">
                                                        <strong>
                                                            <h6 class="fw-bold f-dj">SPV A : 99,7%</h6>
                                                        </strong>
                                                    </div>
                                                    <div class="col-lg-12" style="margin-top: -5px; font-size: 10px; padding-left: 0px; padding-right: 0px;">
                                                        <strong>
                                                            <h6 class=""><em>3.341 of 3.350</em></h6>
                                                        </strong>
                                                    </div>
                                                    <div class="col-lg-12 mb-2" style="margin-top: px; font-size: 14px;">
                                                        <strong>
                                                            <div class="d-flex gap-1 text-center" style="margin-left: -11px;">
                                                                <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Belum Terisi" >
                                                                    <a href="#" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#fjKosong" >13</a>
                                                                </span>
                                                                <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Sudah direncanakan Terisi" >
                                                                    <a href="#" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#fjprosesterisi" >03</a>
                                                                </span>
                                                                <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Terisi" >
                                                                    <a href="#" class="badge bg-success" data-bs-toggle="modal" data-bs-target="#fjterisi" >96</a>
                                                                </span>    
                                                            </div>
                                                        </strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card text-center" style="margin-top: -30px;">
                                            <div class="card-body shadow-lg rounded">
                                                <div class="row">
                                                    <div class="col-12" style="margin-top: -5px; padding-left: 0px; padding-right: 0px;">
                                                        <strong>
                                                            <h6 class="fw-bold f-dj">SPV D : 99,8%</h6>
                                                        </strong>
                                                    </div>
                                                    <div class="col-lg-12" style="margin-top: -5px; font-size: 10px; padding-left: 0px; padding-right: 0px;">
                                                        <strong>
                                                            <h6 class=""><em>8.986 of 9.000</em></h6>
                                                        </strong>
                                                    </div>
                                                    <div class="col-lg-12 mb-2" style="margin-top: px; font-size: 14px;">
                                                        <strong>
                                                            <div class="d-flex gap-1 text-center" style="margin-left: -11px;">
                                                                <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Belum Terisi" >
                                                                    <a href="#" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#fjKosong" >13</a>
                                                                </span>
                                                                <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Sudah direncanakan Terisi" >
                                                                    <a href="#" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#fjprosesterisi" >03</a>
                                                                </span>
                                                                <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Terisi" >
                                                                    <a href="#" class="badge bg-success" data-bs-toggle="modal" data-bs-target="#fjterisi" >96</a>
                                                                </span>    
                                                            </div>
                                                        </strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card text-center" style="margin-top: -30px;">
                                            <div class="card-body shadow-lg rounded">
                                                <div class="row">
                                                    <div class="col-12" style="margin-top: -5px; padding-left: 0px; padding-right: 0px;">
                                                        <strong>
                                                            <h6 class="fw-bold f-dj">F : 98,3%</h6>
                                                        </strong>
                                                    </div>
                                                    <div class="col-lg-12" style="margin-top: -5px; font-size: 10px; padding-left: 5px; padding-right: 5px;">
                                                        <strong>
                                                            <h6 class=""><em>19.845 of 20.172</em></h6>
                                                        </strong>
                                                    </div>
                                                    <div class="col-lg-12 mb-2" style="margin-top: px; font-size: 14px;">
                                                        <strong>
                                                            <div class="d-flex gap-1 text-center" style="margin-left: -11px;">
                                                                <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Belum Terisi" >
                                                                    <a href="#" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#fjKosong" >13</a>
                                                                </span>
                                                                <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Sudah direncanakan Terisi" >
                                                                    <a href="#" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#fjprosesterisi" >03</a>
                                                                </span>
                                                                <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Terisi" >
                                                                    <a href="#" class="badge bg-success" data-bs-toggle="modal" data-bs-target="#fjterisi" >96</a>
                                                                </span>    
                                                            </div>
                                                        </strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <blockquote class="blockquote" >
                                        <footer class="blockquote-footer" style="margin-top: 25px; margin-bottom: px;">
                                            <span>Realisasi FTK per Level Organisasi</span>
                                            
                                        </footer>
                                    </blockquote>
                                    <div class="col-4">
                                        <div class="card text-center" style="margin-top: -10px; padding-bottom: 0;">
                                            <div class="card-body shadow-lg rounded">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <strong>
                                                            <h6 class="fw-bold" style="margin-top: -15px;">Kantor Induk</h6>
                                                        </strong>
                                                    </div>
                                                    <div class="col-12">
                                                        <i data-cs-icon="building-large" class="align-middle float-start" data-cs-size="16"></i>
                                                        <p class="float-end" style="margin-top: px;">1 Unit</p>
                                                    </div>
                                                    <div class="col-12" style="margin-top: -15px;">
                                                        <i data-cs-icon="user" class="align-middle float-start" data-cs-size="16"></i>
                                                        <p class="float-end" style="margin-top: px;">135 Pegawai</p>
                                                    </div>
                                                    <div class="col-12" style="margin-top: -15px;">
                                                        <i data-cs-icon="divide" class="align-middle float-start" data-cs-size="16" style="transform: rotate(-45deg);"></i>
                                                        <p class="float-end" style="margin-top: px;">20%</p>
                                                    </div>
                                                    <div class="col-12" style="margin-top: px; font-size: 14px;">
                                                        <strong>
                                                            <div class="d-flex gap-1 text-center float-start" style="margin-left: px;">
                                                                <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Belum Terisi" >
                                                                    <a href="#" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#fjKosong" >13</a>
                                                                </span>
                                                                <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Sudah direncanakan Terisi" >
                                                                    <a href="#" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#fjprosesterisi" >03</a>
                                                                </span>
                                                                <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Terisi" >
                                                                    <a href="#" class="badge bg-success" data-bs-toggle="modal" data-bs-target="#fjterisi" >96</a>
                                                                </span>    
                                                            </div>
                                                        </strong>
                                                        <a href="#" class="text-scondary float-end" style="font-size: 12px;">View More <i data-cs-icon="chevron-right" class="align-middle" data-cs-size="12"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="card text-center" style="margin-top: -10px; padding-bottom: 0;">
                                            <div class="card-body shadow-lg rounded">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <strong>
                                                            <h6 class="fw-bold" style="margin-top: -15px;">Unit Pelaksana</h6>
                                                        </strong>
                                                    </div>
                                                    <div class="col-12">
                                                        <i data-cs-icon="building" class="align-middle float-start" data-cs-size="16"></i>
                                                        <p class="float-end" style="margin-top: px;">13 Unit</p>
                                                    </div>
                                                    <div class="col-12" style="margin-top: -15px;">
                                                        <i data-cs-icon="user" class="align-middle float-start" data-cs-size="16"></i>
                                                        <p class="float-end" style="margin-top: px;">235 Pegawai</p>
                                                    </div>
                                                    <div class="col-12" style="margin-top: -15px;">
                                                        <i data-cs-icon="divide" class="align-middle float-start" data-cs-size="16" style="transform: rotate(-45deg);"></i>
                                                        <p class="float-end" style="margin-top: px;">31%</p>
                                                    </div>
                                                    <div class="col-12" style="margin-top: px; font-size: 14px;">
                                                        <strong>
                                                            <div class="d-flex gap-1 text-center float-start" style="margin-left: px;">
                                                                <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Belum Terisi" >
                                                                    <a href="#" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#fjKosong" >13</a>
                                                                </span>
                                                                <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Sudah direncanakan Terisi" >
                                                                    <a href="#" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#fjprosesterisi" >03</a>
                                                                </span>
                                                                <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Terisi" >
                                                                    <a href="#" class="badge bg-success" data-bs-toggle="modal" data-bs-target="#fjterisi" >96</a>
                                                                </span>    
                                                            </div>
                                                        </strong>
                                                        <a href="#" class="text-scondary float-end" data-bs-toggle="modal" data-bs-target="#moreUP" style="font-size: 12px;">View More <i data-cs-icon="chevron-right" class="align-middle" data-cs-size="12"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="card text-center" style="margin-top: -10px; padding-bottom: 0;">
                                            <div class="card-body shadow-lg rounded">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <strong>
                                                            <h6 class="fw-bold" style="margin-top: -15px;">Sub Unit Pelaksana</h6>
                                                        </strong>
                                                    </div>
                                                    <div class="col-12">
                                                        <i data-cs-icon="building-small" class="align-middle float-start" data-cs-size="16"></i>
                                                        <p class="float-end" style="margin-top: px;">165 Unit</p>
                                                    </div>
                                                    <div class="col-12" style="margin-top: -15px;">
                                                        <i data-cs-icon="user" class="align-middle float-start" data-cs-size="16"></i>
                                                        <p class="float-end" style="margin-top: px;">365 Pegawai</p>
                                                    </div>
                                                    <div class="col-12" style="margin-top: -15px;">
                                                        <i data-cs-icon="divide" class="align-middle float-start" data-cs-size="16" style="transform: rotate(-45deg);"></i>
                                                        <p class="float-end" style="margin-top: px;">49%</p>
                                                    </div>
                                                    <div class="col-12" style="margin-top: px; font-size: 14px;">
                                                        <strong>
                                                            <div class="d-flex gap-1 text-center float-start" style="margin-left: px;">
                                                                <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Belum Terisi" >
                                                                    <a href="#" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#fjKosong" >13</a>
                                                                </span>
                                                                <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Sudah direncanakan Terisi" >
                                                                    <a href="#" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#fjprosesterisi" >03</a>
                                                                </span>
                                                                <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Terisi" >
                                                                    <a href="#" class="badge bg-success" data-bs-toggle="modal" data-bs-target="#fjterisi" >96</a>
                                                                </span>    
                                                            </div>
                                                        </strong>
                                                        <a href="#" class="text-scondary float-end" style="font-size: 12px;">View More <i data-cs-icon="chevron-right" class="align-middle" data-cs-size="12"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <blockquote class="blockquote" >
                                        <footer class="blockquote-footer" style="margin-top: 25px; margin-bottom: px;">
                                            <span class=""><em>Distributions of Competencies by Profession's Branchs (%)</em></span>
                                            <button  class="btn btn-link text-primary float-end" data-bs-toggle="modal" data-bs-target="#legendKompt"><em>Legend</em> <i data-cs-icon="chevron-right" class="align-middle" data-cs-size="12"></i></button>
                                        </footer>
                                    </blockquote>
                                    <div class="col-12">
                                        <div class="card text-center mb-3" style="margin-top: -20px; padding-bottom: 0;">
                                            <div class="card-body shadow-lg rounded">
                                                <div class="sh-35">
                                                    <canvas id="roundedBarChart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <blockquote class="blockquote" >
                                        <footer class="blockquote-footer" style="margin-top: px; margin-bottom: px;">
                                            <span class="">Pegawai Pensiun</span>
                                            <button  class="btn btn-link text-primary float-end" data-bs-toggle="modal" data-bs-target="#"><em>view more</em> <i data-cs-icon="chevron-right" class="align-middle" data-cs-size="12"></i></button>
                                        </footer>
                                    </blockquote>
                                    <div class="col-12">
                                        <div class="card text-center" style="margin-top: -20px; padding-bottom: 0;">
                                            <div class="card-body shadow-lg rounded">
                                                <div class="row">
                                                    <div class="col-4 d-flex align-items-center text-center" style="justify-content: center;">
                                                        <h1 class="display-1 text-center">365</h1>
                                                    </div>
                                                    <div class="col-8" style="max-height: 300px; overflow-y: auto;">
                                                        <table class="table table-hover table-sm" style="font-size: 12px;">
                                                            <thead>
                                                                <tr>
                                                                    <th class="th-sticky" scope="col">No</th>
                                                                    <th class="th-sticky" scope="col">Nama</th>
                                                                    <th class="th-sticky" scope="col">NIP</th>
                                                                    <th class="th-sticky" scope="col">Unit</th>
                                                                    <th class="th-sticky" scope="col">Tanggal Pensiun</th>
                                                                    <th class="th-sticky" scope="col">Status</th>
                                                                    <th class="th-sticky" scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">1</th>
                                                                    <td>Mark</td>
                                                                    <td>891023ZY</td>
                                                                    <td>UID Aceh</td>
                                                                    <td>UID Kaltimra</td>
                                                                    <td>Approved</td>
                                                                    <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">2</th>
                                                                    <td>Jacob</td>
                                                                    <td>8914101ZY</td>
                                                                    <td>Kantor Pusat</td>
                                                                    <td>UID Jateng & DIY</td>
                                                                    <td>Cetak SK</td>
                                                                    <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">3</th>
                                                                    <td >Larry the Bird</td>
                                                                    <td>@twitter</td>
                                                                    <td>@twitter</td>
                                                                    <td>@twitter</td>
                                                                    <td>@twitter</td>
                                                                    <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">4</th>
                                                                    <td >Larry the Bird</td>
                                                                    <td>@twitter</td>
                                                                    <td>@twitter</td>
                                                                    <td>@twitter</td>
                                                                    <td>@twitter</td>
                                                                    <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">5</th>
                                                                    <td >Larry the Bird</td>
                                                                    <td>@twitter</td>
                                                                    <td>@twitter</td>
                                                                    <td>@twitter</td>
                                                                    <td>@twitter</td>
                                                                    <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">5</th>
                                                                    <td >Larry the Bird</td>
                                                                    <td>@twitter</td>
                                                                    <td>@twitter</td>
                                                                    <td>@twitter</td>
                                                                    <td>@twitter</td>
                                                                    <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">5</th>
                                                                    <td >Larry the Bird</td>
                                                                    <td>@twitter</td>
                                                                    <td>@twitter</td>
                                                                    <td>@twitter</td>
                                                                    <td>@twitter</td>
                                                                    <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- start modal ftk in -->
<div class="modal fade scroll-out" id="semiFullIn" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="overlayScrollLongLabel">
    <div class="modal-dialog modal-semi-full modal-dialog-centered modal-dialog-scrollable short">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Daftar Pegawai Masuk <strong>All Area - All Unit</strong> <em>07.2025 s.d 08.2025</em></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="scroll-track-visible">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="th-sticky" scope="col">No</th>
                                <th class="th-sticky" scope="col">Nama</th>
                                <th class="th-sticky" scope="col">NIP</th>
                                <th class="th-sticky" scope="col">Unit Asal</th>
                                <th class="th-sticky" scope="col">Unit Tujuan</th>
                                <th class="th-sticky" scope="col">Status</th>
                                <th class="th-sticky" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>891023ZY</td>
                                <td>UID Aceh</td>
                                <td>UID Kaltimra</td>
                                <td>Approved</td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>8914101ZY</td>
                                <td>Kantor Pusat</td>
                                <td>UID Jateng & DIY</td>
                                <td>Cetak SK</td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal ftk in -->
<!-- start modal ftk out -->
<div class="modal fade scroll-out" id="semiFullOut" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-semi-full modal-dialog-centered modal-dialog-scrollable short">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Daftar Pegawai Keluar <strong>All Area - All Unit</strong> <em>07.2025 s.d 08.2025</em></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="scroll-track-visible">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="th-sticky" scope="col">No</th>
                                <th class="th-sticky" scope="col">Nama</th>
                                <th class="th-sticky" scope="col">NIP</th>
                                <th class="th-sticky" scope="col">Unit Asal</th>
                                <th class="th-sticky" scope="col">Unit Tujuan</th>
                                <th class="th-sticky" scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td>@fat</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">7</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">8</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">9</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">10</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">11</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">12</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">13</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">14</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">15</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">16</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">17</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">18</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">19</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">20</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">21</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">22</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">23</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">24</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">25</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">26</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">27</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">28</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">29</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">30</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">31</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">32</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">33</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">34</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">35</th>
                                <td >Larry the Bird</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal ftk out -->
<!-- start modal fjKosong -->
<div class="modal fade scroll-out" id="fjKosong" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-semi-full modal-dialog-centered modal-dialog-scrollable short">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Daftar Formasi Jabatan Kosong Jenjang <strong>MA</strong> <em>07.2025 s.d 08.2025</em></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="scroll-track-visible">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="th-sticky" scope="col">No</th>
                                <th class="th-sticky" scope="col">Formasi Jabatan</th>
                                <th class="th-sticky" scope="col">PoG</th>
                                <th class="th-sticky" scope="col">Unit</th>
                                <th class="th-sticky" scope="col">Tanggal Kosong</th>
                                <th class="th-sticky" scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2025</td>
                                <td>Belum Terisi</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2025</td>
                                <td>Belum Terisi</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2025</td>
                                <td>Belum Terisi</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2025</td>
                                <td>Belum Terisi</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2025</td>
                                <td>Belum Terisi</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2025</td>
                                <td>Belum Terisi</td>
                            </tr>
                            <tr>
                                <th scope="row">7</th>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2025</td>
                                <td>Belum Terisi</td>
                            </tr>
                            <tr>
                                <th scope="row">8</th>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2025</td>
                                <td>Belum Terisi</td>
                            </tr>
                            <tr>
                                <th scope="row">9</th>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2025</td>
                                <td>Belum Terisi</td>
                            </tr>
                            <tr>
                                <th scope="row">10</th>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2025</td>
                                <td>Belum Terisi</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal fjkosong -->
<!-- start modal fjproses -->
<div class="modal fade scroll-out" id="fjprosesterisi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-semi-full modal-dialog-centered modal-dialog-scrollable short">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Daftar Formasi Jabatan Proses Terisi <strong>MA</strong> <em>07.2025 s.d 08.2025</em></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="scroll-track-visible">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="th-sticky" scope="col">No</th>
                                <th class="th-sticky" scope="col">Nama</th>
                                <th class="th-sticky" scope="col">NIP</th>
                                <th class="th-sticky" scope="col">PeG</th>
                                <th class="th-sticky" scope="col">Formasi Jabatan</th>
                                <th class="th-sticky" scope="col">PoG</th>
                                <th class="th-sticky" scope="col">Unit</th>
                                <th class="th-sticky" scope="col">Tanggal Kosong</th>
                                <th class="th-sticky" scope="col">Tanggal Aktivasi</th>
                                <th class="th-sticky" scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Fulan</td>
                                <td>700723XX</td>
                                <td>20</td>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2025</td>
                                <td>01.08.2025</td>
                                <td>Cetak SK</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Fulan</td>
                                <td>700723XX</td>
                                <td>20</td>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2025</td>
                                <td>01.08.2025</td>
                                <td>Cetak SK</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Fulan</td>
                                <td>700723XX</td>
                                <td>20</td>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2025</td>
                                <td>01.08.2025</td>
                                <td>Cetak SK</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal fjproses -->
<!-- start modal fjterisi -->
<div class="modal fade scroll-out" id="fjterisi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-semi-full modal-dialog-centered modal-dialog-scrollable short">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Daftar Formasi Jabatan Terisi <strong>MA</strong> <em>07.2025 s.d 08.2025</em></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="scroll-track-visible">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="th-sticky" scope="col">No</th>
                                <th class="th-sticky" scope="col">Nama</th>
                                <th class="th-sticky" scope="col">NIP</th>
                                <th class="th-sticky" scope="col">PeG</th>
                                <th class="th-sticky" scope="col">Formasi Jabatan</th>
                                <th class="th-sticky" scope="col">PoG</th>
                                <th class="th-sticky" scope="col">Unit</th>
                                <th class="th-sticky" scope="col">Tanggal Terisi</th>
                                <th class="th-sticky" scope="col">Masa Jabatan</th>
                                <th class="th-sticky" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Fulan</td>
                                <td>700723XX</td>
                                <td>20</td>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2023</td>
                                <td>2 tahun 0 bulan</td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Fulan</td>
                                <td>700723XX</td>
                                <td>20</td>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2023</td>
                                <td>2 tahun 0 bulan</td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Fulan</td>
                                <td>700723XX</td>
                                <td>20</td>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2023</td>
                                <td>2 tahun 0 bulan</td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Fulan</td>
                                <td>700723XX</td>
                                <td>20</td>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2023</td>
                                <td>2 tahun 0 bulan</td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Fulan</td>
                                <td>700723XX</td>
                                <td>20</td>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2023</td>
                                <td>2 tahun 0 bulan</td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>Fulan</td>
                                <td>700723XX</td>
                                <td>20</td>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2023</td>
                                <td>2 tahun 0 bulan</td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">7</th>
                                <td>Fulan</td>
                                <td>700723XX</td>
                                <td>20</td>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2023</td>
                                <td>2 tahun 0 bulan</td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">8</th>
                                <td>Fulan</td>
                                <td>700723XX</td>
                                <td>20</td>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2023</td>
                                <td>2 tahun 0 bulan</td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">9</th>
                                <td>Fulan</td>
                                <td>700723XX</td>
                                <td>20</td>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2023</td>
                                <td>2 tahun 0 bulan</td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">10</th>
                                <td>Fulan</td>
                                <td>700723XX</td>
                                <td>20</td>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2023</td>
                                <td>2 tahun 0 bulan</td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">11</th>
                                <td>Fulan</td>
                                <td>700723XX</td>
                                <td>20</td>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2023</td>
                                <td>2 tahun 0 bulan</td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">12</th>
                                <td>Fulan</td>
                                <td>700723XX</td>
                                <td>20</td>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2023</td>
                                <td>2 tahun 0 bulan</td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">13</th>
                                <td>Fulan</td>
                                <td>700723XX</td>
                                <td>20</td>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2023</td>
                                <td>2 tahun 0 bulan</td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">14</th>
                                <td>Fulan</td>
                                <td>700723XX</td>
                                <td>20</td>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2023</td>
                                <td>2 tahun 0 bulan</td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">96</th>
                                <td>Fulan</td>
                                <td>700723XX</td>
                                <td>20</td>
                                <td>General Manager UIxx</td>
                                <td>21</td>
                                <td>UID Kalbar</td>
                                <td>01.07.2023</td>
                                <td>2 tahun 0 bulan</td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal fjterisi -->
<!-- start modal moreUP -->
<div class="modal fade scroll-out" id="moreUP" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-semi-full modal-dialog-centered modal-dialog-scrollable short">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Daftar <strong>Unit Pelaksana</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="scroll-track-visible">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="th-sticky" scope="col">No</th>
                                <th class="th-sticky" scope="col">Unit Pelaksana</th>
                                <th class="th-sticky" scope="col">Jumlah Pegawai</th>
                                <th class="th-sticky" scope="col">MD</th>
                                <th class="th-sticky" scope="col">SPV A</th>
                                <th class="th-sticky" scope="col">SPV D</th>
                                <th class="th-sticky" scope="col">Fungsional</th>
                                <th class="th-sticky" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>UP3 Axxx</td>
                                <td>25</td>
                                <td>
                                    <div class="d-flex gap-1 text-center float-start" style="margin-left: px;">
                                        <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Belum Terisi" >
                                            <a href="#" class="badge bg-danger" data-bs-toggle="" data-bs-target="" >1</a>
                                        </span>
                                        <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Sudah direncanakan Terisi" >
                                            <a href="#" class="badge bg-warning" data-bs-toggle="" data-bs-target="" >0</a>
                                        </span>
                                        <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Terisi" >
                                            <a href="#" class="badge bg-success" data-bs-toggle="" data-bs-target="" >0</a>
                                        </span>    
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex gap-1 text-center float-start" style="margin-left: px;">
                                        <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Belum Terisi" >
                                            <a href="#" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#fjKosong" >13</a>
                                        </span>
                                        <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Sudah direncanakan Terisi" >
                                            <a href="#" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#fjprosesterisi" >03</a>
                                        </span>
                                        <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Terisi" >
                                            <a href="#" class="badge bg-success" data-bs-toggle="modal" data-bs-target="#fjterisi" >96</a>
                                        </span>    
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex gap-1 text-center float-start" style="margin-left: px;">
                                        <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Belum Terisi" >
                                            <a href="#" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#fjKosong" >13</a>
                                        </span>
                                        <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Sudah direncanakan Terisi" >
                                            <a href="#" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#fjprosesterisi" >03</a>
                                        </span>
                                        <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Terisi" >
                                            <a href="#" class="badge bg-success" data-bs-toggle="modal" data-bs-target="#fjterisi" >96</a>
                                        </span>    
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex gap-1 text-center float-start" style="margin-left: px;">
                                        <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Belum Terisi" >
                                            <a href="#" class="badge bg-danger" data-bs-toggle="modal" data-bs-target="#fjKosong" >13</a>
                                        </span>
                                        <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Sudah direncanakan Terisi" >
                                            <a href="#" class="badge bg-warning" data-bs-toggle="modal" data-bs-target="#fjprosesterisi" >03</a>
                                        </span>
                                        <span class="d-inline-block text-sm" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Jumlah FJ Terisi" >
                                            <a href="#" class="badge bg-success" data-bs-toggle="modal" data-bs-target="#fjterisi" >96</a>
                                        </span>    
                                    </div>
                                </td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>UP3 Axxx</td>
                                <td>25</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>UP3 Axxx</td>
                                <td>25</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>UP3 Axxx</td>
                                <td>25</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>UP3 Axxx</td>
                                <td>25</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>UP3 Axxx</td>
                                <td>25</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">7</th>
                                <td>UP3 Axxx</td>
                                <td>25</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">8</th>
                                <td>UP3 Axxx</td>
                                <td>25</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">9</th>
                                <td>UP3 Axxx</td>
                                <td>25</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">10</th>
                                <td>UP3 Axxx</td>
                                <td>25</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><a href="http://" target="_blank" rel="noopener noreferrer"><i data-cs-icon="shortcut" data-cs-size="12"></i></a></td>
                            </tr>
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal moreUP -->
<!-- start modal legendKomp -->
<div class="modal fade scroll-out" id="legendKompt" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-semi-full modal-dialog-centered modal-dialog-scrollable short">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><em>Legenda</em></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="scroll-track-visible">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="th-sticky" scope="col">Code</th>
                                <th class="th-sticky" scope="col">Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">ARK</th>
                                <td>Risiko, Kepatuhan dan Audit</td>
                            </tr>
                            <tr>
                                <th scope="row">DST</th>
                                <td>Distribusi</td>
                            </tr>
                            <tr>
                                <th scope="row">DST</th>
                                <td>Distribusi</td>
                            </tr>
                            <tr>
                                <th scope="row">DST</th>
                                <td>Distribusi</td>
                            </tr>
                            <tr>
                                <th scope="row">DST</th>
                                <td>Distribusi</td>
                            </tr>
                            <tr>
                                <th scope="row">DST</th>
                                <td>Distribusi</td>
                            </tr>
                            <tr>
                                <th scope="row">DST</th>
                                <td>Distribusi</td>
                            </tr>
                            <tr>
                                <th scope="row">DST</th>
                                <td>Distribusi</td>
                            </tr>
                            <tr>
                                <th scope="row">DST</th>
                                <td>Distribusi</td>
                            </tr>
                            <tr>
                                <th scope="row">DST</th>
                                <td>Distribusi</td>
                            </tr>
                            <tr>
                                <th scope="row">DST</th>
                                <td>Distribusi</td>
                            </tr>
                            <tr>
                                <th scope="row">DST</th>
                                <td>Distribusi</td>
                            </tr>
                            <tr>
                                <th scope="row">DST</th>
                                <td>Distribusi</td>
                            </tr>
                            <tr>
                                <th scope="row">DST</th>
                                <td>Distribusi</td>
                            </tr>
                            <tr>
                                <th scope="row">DST</th>
                                <td>Distribusi</td>
                            </tr>
                            <tr>
                                <th scope="row">DST</th>
                                <td>Distribusi</td>
                            </tr>
                            <tr>
                                <th scope="row">DST</th>
                                <td>Distribusi</td>
                            </tr>
                            <tr>
                                <th scope="row">DST</th>
                                <td>Distribusi</td>
                            </tr>
                            <tr>
                                <th scope="row">DST</th>
                                <td>Distribusi</td>
                            </tr>
                            <tr>
                                <th scope="row">DST</th>
                                <td>Distribusi</td>
                            </tr>
                            <tr>
                                <th scope="row">DST</th>
                                <td>Distribusi</td>
                            </tr>
                            <tr>
                                <th scope="row">DST</th>
                                <td>Distribusi</td>
                            </tr>
                            <tr>
                                <th scope="row">DST</th>
                                <td>Distribusi</td>
                            </tr>
                            <tr>
                                <th scope="row">DST</th>
                                <td>Distribusi</td>
                            </tr>
                            <tr>
                                <th scope="row">DST</th>
                                <td>Distribusi</td>
                            </tr>
                            <tr>
                                <th scope="row">TIF</th>
                                <td>Teknologi Informasi</td>
                            </tr>
                            <tr>
                                <th scope="row">TRS</th>
                                <td>Transmisi</td>
                            </tr>
                            <tr>
                                <th scope="row">UJK</th>
                                <td>Pengujian dan Kalibrasi</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal legendkomp -->

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