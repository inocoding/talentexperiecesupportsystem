<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Tambah Data Sertifikasi</title>
<?= $this->endSection() ?>

<?= $this->section('cssheader') ?>
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/bootstrap.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/OverlayScrollbars.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/select2.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/select2-bootstrap4.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/bootstrap-datepicker3.standalone.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/bootstrap-datepicker3.standalone.min.css" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row">
                <!-- Title Start -->
                <div class="col-12 col-md-7">
                    <h1 class="mb-0 pb-0 display-4" id="title">Tambah Data Sertifikasi</h1>
                </div>
                <!-- Title End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->

        <!-- Content Start -->
        <section class="scroll-section" id="contact">
            <div class="row">
                <div class="col mb-1">
                    <div class="d-inline-block me-0 me-sm-3 float-start float-md-none">
                        <!-- Back Button Start -->
                        <a href="<?= site_url('masterdata/sertifikasi') ?>" class="btn btn-icon btn-icon-only btn-foreground-alternate shadow add-dapeg" data-bs-toggle="tooltip" data-bs-placement="top" title="Back" type="button" data-bs-delay="0">
                            <i data-cs-icon="arrow-left"></i>
                        </a>
                        <!-- Back Button End -->
                    </div>
                </div>
            </div>
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissable show fade" role="alert">
                    <div class="alert-body">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissable show fade" role="alert">
                    <div class="alert-body">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                </div>
            <?php endif; ?>

            <form class="card mb-5 tooltip-end-top" action="<?= site_url('masterdata/adddatasert') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="card-body" id="contactForm">
                    <div class="mb-3 w-100">
                        <label class="form-label">NIP</label>
                        <select id="select2Basic" onkeyup="kapital()" name="kode_nip">
                            <option label="&nbsp;"></option>
                            <?php foreach ($user as $key => $value) : ?>
                                <option value="<?= $value->nip ?>"><?= $value->nip ?>; <?= $value->nama_user ?></option>
                            <?php endforeach; ?>
                        </select>
                        <!-- <input class="form-control" placeholder="NIP" name="nip" onkeyup="kapital()" id="nip" /> -->
                    </div>
                    <div class="datauser">

                    </div>
                    <!-- <div class="mb-3 filled w-100">
                        <i data-cs-icon="building-large"></i>
                        <input type="text" class="form-control" placeholder="Unit Induk" name="" readonly />
                    </div>
                    <div class="mb-3 filled w-100">
                        <i data-cs-icon="building"></i>
                        <input type="text" class="form-control" placeholder="Unit Pelaksana" name="" readonly />
                    </div>
                    <div class="mb-3 filled w-100">
                        <i data-cs-icon="building-small"></i>
                        <input type="text" class="form-control" placeholder="Sub Unit Pelaksana" name="" readonly />
                    </div> -->
                    <div class="mb-3 w-100">
                        <label class="form-label">Judul Sertifikasi</label>
                        <input type="text" class="form-control" name="judul_sertifikasi" />
                    </div>
                    <div class="mb-3 w-100">
                        <label class="form-label">Nama Profesi</label>
                        <select id="select2Basic5" onkeyup="kapital()" name="kode_profesi_sertifikasi">
                            <option label="&nbsp;"></option>
                            <?php foreach ($profesi as $key => $value) : ?>
                                <option value="<?= $value->kode_profesi ?>"><?= $value->kode_profesi ?>; <?= $value->nama_profesi ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3 w-100">
                        <label class="form-label">LSK</label>
                        <input type="text" class="form-control" name="lsk" />
                    </div>
                    <div class="mb-3 w-100">
                        <label class="form-label">Nomor Sertifikat</label>
                        <input type="text" class="form-control" name="no_sertifikat" />
                    </div>
                    <div class="mb-3 ">
                        <label class="form-label">Start Date</label>
                        <input class="form-control" name="start_date" id="datePickerFormat" />
                    </div>
                    <div class="mb-3 ">
                        <label class="form-label">End Date</label>
                        <input class="form-control" name="end_date" id="datePickerLocale" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Scan Sertifikat</label>
                        <input type="file" class="form-control" name="file_serti">
                    </div>
                </div>

                <div class="card-footer border-0 pt-0 d-flex justify-content-end align-items-center">
                    <div>
                        <button class="btn btn-icon btn-icon-end btn-primary" type="submit">
                            <i data-cs-icon="cloud-upload"></i>
                            <span>Simpan</span>
                        </button>
                    </div>
                </div>
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
<script src="<?= base_url() ?>/template/js/vendor/select2.full.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/datepicker/locales/bootstrap-datepicker.es.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/jquery.validate/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/jquery.validate/additional-methods.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/datepicker/locales/bootstrap-datepicker.es.min.js"></script>
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
<script src="<?= base_url() ?>/template/js/forms/layouts.js"></script>
<script src="<?= base_url() ?>/template/js/forms/controls.datepicker.js"></script>
<script src="<?= base_url() ?>/template/js/forms/controls.select2.js"></script>
<script src="<?= base_url() ?>/template/js/common.js"></script>
<script src="<?= base_url() ?>/template/js/scripts.js"></script>
<!-- Page Specific Scripts End -->

<script>
    $('#contactDepartment').on('change', function() {
        const selectedPackage = $('#contactDepartment').val();
        // console.log("<?= site_url('masterdata/get_org_satu/') ?>" + selectedPackage + "/" + 0);
        $.ajax({
            url: "<?= site_url('masterdata/get_org_satu/') ?>" + selectedPackage + "/" + 0,
            dataType: "json",
            success: function(res) {
                $(".unitInduk").html(res)
            }
        })
    });

    $('#contactUnitinduk').on('change', function() {
        const selectedPackage1 = $('#contactUnitinduk').val();

        $.ajax({
            url: "<?= site_url('masterdata/get_org_dua/') ?>" + selectedPackage1 + "/" + 0,
            dataType: "json",
            success: function(res) {
                $(".unitPelaksana").html(res)
            }
        })
    });

    $('#contactUnitpelaksana').on('change', function() {
        const selectedPackage2 = $('#contactUnitpelaksana').val();

        $.ajax({
            url: "<?= site_url('masterdata/get_org_tiga/') ?>" + selectedPackage2 + "/" + 0,
            dataType: "json",
            success: function(res) {
                $(".subunitpelaksana").html(res)
            }
        })
    });

    function kapital() {
        var x = document.getElementById("nip");
        x.value = x.value.toUpperCase();
    }

    $('#select2Basic').on('change', function() {
        const selectedPackage1 = $('#select2Basic').val();

        $.ajax({
            url: "<?= site_url('masterdata/get_dapeg_sert/') ?>" + selectedPackage1 + "/" + 0,
            dataType: "json",
            success: function(res) {
                $(".datauser").html(res)
            }
        })
    });
</script>

<?= $this->endSection() ?>