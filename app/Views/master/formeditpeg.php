<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Update Data Pegawai - HTD 4</title>
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
                    <h1 class="mb-0 pb-0 display-4" id="title">Update Data Pegawai</h1>
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
                        <a href="<?= site_url('masterdata') ?>" class="btn btn-icon btn-icon-only btn-foreground-alternate shadow add-dapeg" data-bs-toggle="tooltip" data-bs-placement="top" title="Back" type="button" data-bs-delay="0">
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
            <form class="card mb-5 tooltip-end-top" action="<?= site_url('masterdata/proseseditdapeg/' . $dapeg->nip) ?>" method="POST">
                <?= csrf_field() ?>
                <div class="card-body" id="contactForm">
                    <div class="mb-3 filled">
                        <i data-cs-icon="flash"></i>
                        <input class="form-control" placeholder="NIP" name="nip" onkeyup="kapital()" id="nip" value="<?= $dapeg->nip ?>" />
                    </div>
                    <div class="mb-3 filled">
                        <i data-cs-icon="user"></i>
                        <input class="form-control" placeholder="Nama Pegawai" name="nama_user" value="<?= $dapeg->nama_user ?>" />
                    </div>
                    <div class="mb-3 filled">
                        <i data-cs-icon="calendar"></i>
                        <input class="form-control" placeholder="Tanggal Lahir" name="tgl_lahir" id="datePickerFormat" value="<?= $dapeg->tgl_lahir ?>" />
                    </div>
                    <div class="input-group mb-3 filled">
                        <i data-cs-icon="email"></i>
                        <input type="text" class="form-control" placeholder="Email Corporate" name="email_korpo" aria-describedby="basic-addon2" value="<?= $dapeg->email_korpo ?>" />
                    </div>
                    <div class="mb-3 filled">
                        <i data-cs-icon="mobile"></i>
                        <input class="form-control" placeholder="No Handphone" name="no_hp" value="<?= $dapeg->no_hp ?>" />
                    </div>
                    <div class="mb-3 filled w-100">
                        <i data-cs-icon="diagram-1"></i>
                        <select id="contactDepartment" name="htd_area" data-placeholder="HTD Area">
                            <option label="&nbsp;"></option>
                            <?php foreach ($org_htd as $key => $value) : ?>
                                <option value="<?= $value->kode_org_htd ?>" <?= $value->kode_org_htd == $dapeg->htd_area ?  'selected' : null; ?>><?= $value->kode_org_htd ?>, <?= $value->nama_org_htd ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3 filled w-100">
                        <i data-cs-icon="building-large"></i>
                        <input type="hidden" value="<?= $dapeg->nip ?>" id="userId">
                        <input type="hidden" value="<?= $dapeg->unit_induk ?>" id="unitInduk">
                        <input type="hidden" value="<?= $dapeg->unit_pelaksana ?>" id="unitPelaksana">
                        <input type="hidden" name="ket_aktif" value="<?= $dapeg->ket_aktif ?>">
                        <select id="contactUnitinduk" name="unit_induk" data-placeholder="Unit Induk" class="unitInduk">
                            <option label="&nbsp;"></option>
                            <?php foreach ($org_satu as $key => $value) : ?>
                                <option value="<?= $value->kode_org_satu ?>" <?= $value->kode_org_satu == $dapeg->unit_induk ?  'selected' : null; ?>><?= $value->kode_org_satu ?>, <?= $value->nama_org_satu ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3 filled w-100">
                        <i data-cs-icon="building"></i>
                        <select id="contactUnitpelaksana" name="unit_pelaksana" data-placeholder="Unit Pelaksana" class="unitPelaksana">
                            <option label="&nbsp;"></option>
                            <?php foreach ($org_dua as $key => $value) : ?>
                                <option value="<?= $value->kode_org_dua ?>" <?= $value->kode_org_dua == $dapeg->unit_pelaksana ?  'selected' : null; ?>><?= $value->kode_org_dua ?>, <?= $value->nama_org_dua ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3 filled w-100">
                        <i data-cs-icon="building-small"></i>
                        <select id="contactSubunitpelaksana" name="sub_unit_pelaksana" data-placeholder="Sub Unit Pelaksana" class="subunitpelaksana">
                            <option label="&nbsp;"></option>
                            <?php foreach ($org_tiga as $key => $value) : ?>
                                <option value="<?= $value->kode_org_tiga ?>" <?= $value->kode_org_tiga == $dapeg->sub_unit_pelaksana ?  'selected' : null; ?>><?= $value->kode_org_tiga ?>, <?= $value->nama_org_tiga ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch justify-content-center">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="role_komite" value="1" <?= $dapeg->role_komite == 0 ?  null : 'checked'; ?> />
                            <label class="form-check-label" for="flexSwitchCheckDefault">Komite Appraisal</label>
                        </div>
                    </div>
                    <h2 class="small-title d-flex justify-content-center mt-3">Role HTD</h2>
                    <div class="row g-2 d-flex justify-content-center mb-3">
                        <div class="col-2">
                            <label class="form-check custom-card w-100 position-relative p-0 m-0">
                                <input type="radio" class="form-check-input position-absolute e-2 t-2 z-index-1" name="role_htd" value="4" <?= $dapeg->role_htd == 4 ?  'checked' : null; ?> />
                                <span class="card form-check-label w-100 custom-border">
                                    <span class="card-body text-center">
                                        <i data-cs-icon="user" class="text-primary"></i>
                                        <span class="heading mt-3 text-body text-primary d-block">Non HTD</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <div class="col-2">
                            <label class="form-check custom-card w-100 position-relative p-0 m-0">
                                <input type="radio" class="form-check-input position-absolute e-2 t-2 z-index-1" name="role_htd" value="0" <?= $dapeg->role_htd == 0 ?  'checked' : null; ?> />
                                <span class="card form-check-label w-100 custom-border">
                                    <span class="card-body text-center">
                                        <i data-cs-icon="user" class="text-primary"></i>
                                        <span class="heading mt-3 text-body text-primary d-block">Staf HTD</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <div class="col-2">
                            <label class="form-check custom-card w-100 position-relative p-0 m-0">
                                <input type="radio" class="form-check-input position-absolute e-2 t-2 z-index-1" name="role_htd" value="3" <?= $dapeg->role_htd == 3 ?  'checked' : null; ?> />
                                <span class="card form-check-label w-100 custom-border">
                                    <span class="card-body text-center">
                                        <i data-cs-icon="user" class="text-primary"></i>
                                        <span class="heading mt-3 text-body text-primary d-block">Asman HTD</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <div class="col-2">
                            <label class="form-check custom-card w-100 position-relative p-0 m-0">
                                <input type="radio" class="form-check-input position-absolute e-2 t-2 z-index-1" name="role_htd" value="2" <?= $dapeg->role_htd == 2 ?  'checked' : null; ?> />
                                <span class="card form-check-label w-100 custom-border">
                                    <span class="card-body text-center">
                                        <i data-cs-icon="user" class="text-primary"></i>
                                        <span class="heading mt-3 text-body text-primary d-block">MSB HTD</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <div class="col-2">
                            <label class="form-check custom-card w-100 position-relative p-0 m-0">
                                <input type="radio" class="form-check-input position-absolute e-2 t-2 z-index-1" name="role_htd" value="1" <?= $dapeg->role_htd == 1 ?  'checked' : null; ?> />
                                <span class="card form-check-label w-100 custom-border">
                                    <span class="card-body text-center">
                                        <i data-cs-icon="user" class="text-primary"></i>
                                        <span class="heading mt-3 text-body text-primary d-block">Vice President</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="mb-3 filled w-100">
                        <label class="form-label d-block d-flex justify-content-center mb-2">Role Admin</label>
                        <div class="d-flex justify-content-evenly">
                            <input type="checkbox" class="btn-check" id="btnCheckPrimaryOutline" name="role_admin" value="1" <?= $dapeg->role_admin == 1 ?  'checked' : null; ?> />
                            <label class="btn btn-outline-primary" for="btnCheckPrimaryOutline">Admin Suksesi</label>
                            <input type="checkbox" class="btn-check" id="btnCheckSecondaryOutline" name="role_adm_acc" value="1" <?= $dapeg->role_adm_acc == 1 ?  'checked' : null; ?> />
                            <label class="btn btn-outline-primary" for="btnCheckSecondaryOutline">Admin ACCESS</label>
                            <input type="checkbox" class="btn-check" id="btnCheckSecondaryOutline2" name="role_adm_eclinic" value="1" <?= $dapeg->role_adm_eclinic == 1 ?  'checked' : null; ?> />
                            <label class="btn btn-outline-primary" for="btnCheckSecondaryOutline2">Admin E-Clinic</label>
                            <input type="checkbox" class="btn-check" id="btnCheckSecondaryOutline3" name="role_adm_hi" value="1" <?= $dapeg->role_adm_hi == 1 ?  'checked' : null; ?> />
                            <label class="btn btn-outline-primary" for="btnCheckSecondaryOutline3">Admin HI</label>
                            <input type="checkbox" class="btn-check" id="btnCheckSecondaryOutline4" name="role_adm_org" value="1" <?= $dapeg->role_adm_org == 1 ?  'checked' : null; ?> />
                            <label class="btn btn-outline-primary" for="btnCheckSecondaryOutline4">Admin Organisasi</label>
                            <input type="checkbox" class="btn-check" id="btnCheckSecondaryOutline5" name="role_adm_kinerja" value="1" <?= $dapeg->role_adm_kinerja == 1 ?  'checked' : null; ?> />
                            <label class="btn btn-outline-primary" for="btnCheckSecondaryOutline5">Admin Kinerja</label>
                            <input type="checkbox" class="btn-check" id="btnCheckSecondaryOutline6" name="role_adm_diklat" value="1" <?= $dapeg->role_adm_diklat == 1 ?  'checked' : null; ?> />
                            <label class="btn btn-outline-primary" for="btnCheckSecondaryOutline6">Admin Diklat</label>
                            <input type="checkbox" class="btn-check" id="btnCheckSecondaryOutline7" name="role_adm_sertifikasi" value="1" <?= $dapeg->role_adm_sertifikasi == 1 ?  'checked' : null; ?> />
                            <label class="btn btn-outline-primary" for="btnCheckSecondaryOutline7">Admin Sertifikasi</label>

                        </div>
                    </div>
                </div>

                <div class="card-footer border-0 pt-0 d-flex justify-content-end align-items-center">
                    <div>
                        <button class="btn btn-icon btn-icon-end btn-primary" type="submit">
                            <span>Simpan</span>
                            <i data-cs-icon="chevron-right"></i>
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
<!-- <script src="<?= base_url() ?>/template/js/forms/layouts.js"></script> -->
<script src="<?= base_url() ?>/template/js/forms/controls.datepicker.js"></script>
<script src="<?= base_url() ?>/template/js/common.js"></script>
<script src="<?= base_url() ?>/template/js/scripts.js"></script>
<!-- Page Specific Scripts End -->

<script>
    $(document).ready(function() {
        const selectedPackage = $('#contactDepartment').val();
        const userId = $('#userId').val();
        // console.log("<?= site_url('masterdata/get_org_satu/') ?>" + selectedPackage + "/" + userId);
        $.ajax({
            url: "<?= site_url('masterdata/get_org_satu/') ?>" + selectedPackage + "/" + userId,
            dataType: "json",
            success: function(res) {
                $(".unitInduk").html(res)
            }
        });
    });

    $(document).ready(function() {
        const selectedPackage1 = $('#unitInduk').val();
        const userId = $('#userId').val();
        // console.log("<?= site_url('masterdata/get_org_dua/') ?>" + selectedPackage1 + "/" + userId);
        $.ajax({
            url: "<?= site_url('masterdata/get_org_dua/') ?>" + selectedPackage1 + "/" + userId,
            dataType: "json",
            success: function(res) {
                $(".unitPelaksana").html(res)
            }
        })
    });

    $(document).ready(function() {
        const selectedPackage2 = $('#unitPelaksana').val();
        const userId = $('#userId').val();
        $.ajax({
            url: "<?= site_url('masterdata/get_org_tiga/') ?>" + selectedPackage2 + "/" + userId,
            dataType: "json",
            success: function(res) {
                $(".subunitpelaksana").html(res)
            }
        })
    });

    $('#contactDepartment').on('change', function() {
        const selectedPackage = $('#contactDepartment').val();
        // console.log("<?= site_url('masterdata/get_org_satu/') ?>" + selectedPackage);
        $.ajax({
            url: "<?= site_url('masterdata/get_org_satu/') ?>" + selectedPackage,
            dataType: "json",
            success: function(res) {
                $(".unitInduk").html(res)
            }
        })
    });

    $('#contactUnitinduk').on('change', function() {
        const selectedPackage1 = $('#contactUnitinduk').val();

        $.ajax({
            url: "<?= site_url('masterdata/get_org_dua/') ?>" + selectedPackage1,
            dataType: "json",
            success: function(res) {
                $(".unitPelaksana").html(res)
            }
        })
    });

    $('#contactUnitpelaksana').on('change', function() {
        const selectedPackage2 = $('#contactUnitpelaksana').val();

        $.ajax({
            url: "<?= site_url('masterdata/get_org_tiga/') ?>" + selectedPackage2,
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
</script>

<?= $this->endSection() ?>