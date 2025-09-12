<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit Data User</title>
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
                 <div class="btn-group">
                    <a href="<?= site_url('masterdata/dapeghtd') ?>" class="btn-link">
                        <i data-cs-icon="chevron-left" class="mt-2 me-2" data-cs-size="15"></i>
                    </a>
                    <h2 class="small-title mt-2">Edit Data User</h2>
                </div>
                <!-- Title End -->
            </div>
        </div>
        <!-- Title and Top Buttons End -->

        <!-- Content Start -->
        <form action="<?=site_url('masterdata/users/'.$user->nip)?>" method="post">
        <?= csrf_field() ?>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h6>Data User</h6>
                            <div class="row mb-2">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">NIP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nip" name="nip" value="<?= esc($user->nip)?>" disabled />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?=old('nama_user', $user->nama_user)?>" />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Tgl Lahir</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?=old('tgl_lahir', $user->tgl_lahir)?>" />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <span style="font-size: 10px;">*kosongkan bila password tidak diubah</span>
                                    <input type="password" class="form-control" id="password" name="password" />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Retype Password</label>
                                <div class="col-sm-10">
                                    <span style="font-size: 10px;">*kosongkan bila password tidak diubah</span>
                                    <input type="password" class="form-control" id="password_confirm" name="password_confirm" />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Role HTD</label>
                                <div class="col-sm-10">
                                    <select id="role_htd" name="role_htd" class="form-select">
                                        <?php
                                            $selectedRole = old('role_htd', $user->role_htd);
                                            $roles = ['0'=>'Staf', '1'=>'Asman', '2'=>'MSB', '3'=>'VP', '4'=>'EVP', '5'=>'Non HTD'];
                                            foreach($roles as $val=>$label):
                                        ?>
                                            <option value="<?= $val ?>" <?=($selectedRole == $val ? 'selected' : '' )?>><?= $label ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Unit HTD</label>
                                <div class="col-sm-10">
                                    <select id="select2Basic" name="htd_area" class="form-select">
                                        <option value="" >Pilih...</option>
                                        <?php foreach($orgs as $org): 
                                            $sel = old('htd_area', (string)$user->htd_area) == (string)$org->kode_org_htd ? 'selected' : '';
                                        ?>
                                            <option value="<?= $org->kode_org_htd ?>" <?= $sel ?> ><?= $org->nama_org_htd ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h6>Roles</h6>
                        <?php
                            // helper buat ngecek prioritas old()
                            $isChecked = function($field, $current){
                                $ov = old($field);
                                $val = ($ov !== null) ? $ov : $current;
                                return $val === '1' ? 'checked' : '';
                            };
                        ?>
                        <div class="row">
                            <div class="col-6">
                                <input type="hidden" name="role_organisasi" value="0">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="role_organisasi" value="1" <?= $isChecked('role_organisasi', $user->role_organisasi)?> id="role_organisasi" />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Role Organisasi</label>
                                </div>
                                <input type="hidden" name="role_user" value="0">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="role_user" value="1" <?= $isChecked('role_user', $user->role_user)?> id="role_user" />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Role User</label>
                                </div>
                                <input type="hidden" name="role_mutasi" value="0">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="role_mutasi" value="1" <?= $isChecked('role_mutasi', $user->role_mutasi)?> id="flexSwitchCheckDefault" />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Role Mutasi</label>
                                </div>
                                <input type="hidden" name="role_komite" value="0">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="role_komite" value="1" <?= $isChecked('role_komite', $user->role_komite)?> id="flexSwitchCheckDefault" />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Role Komite</label>
                                </div>
                                <input type="hidden" name="role_dapeg" value="0">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="role_dapeg" value="1" <?= $isChecked('role_dapeg', $user->role_dapeg)?> id="flexSwitchCheckDefault" />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Role Dapeg</label>
                                </div>
                                <input type="hidden" name="role_tugas_karya" value="0">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="role_tugas_karya" value="1" <?= $isChecked('role_tugas_karya', $user->role_tugas_karya)?> id="flexSwitchCheckDefault" />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Role Tugas Karya</label>
                                </div>
                                <input type="hidden" name="role_ptb" value="0">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="role_ptb" value="1" <?= $isChecked('role_ptb', $user->role_ptb)?> id="flexSwitchCheckDefault" />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Role PTB</label>
                                </div>
                                <input type="hidden" name="role_pensiun_dini" value="0">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="role_pensiun_dini" value="1" <?= $isChecked('role_pensiun_dini', $user->role_pensiun_dini)?> id="flexSwitchCheckDefault" />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Role Pensiun Dini</label>
                                </div>
                                <input type="hidden" name="role_resign" value="0">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="role_resign" value="1" <?= $isChecked('role_resign', $user->role_resign)?> id="flexSwitchCheckDefault" />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Role Resign</label>
                                </div>
                                <input type="hidden" name="role_mpp" value="0">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="role_mpp" value="1" <?= $isChecked('role_mpp', $user->role_mpp)?> id="flexSwitchCheckDefault" />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Role Mpp</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <input type="hidden" name="role_ojt" value="0">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="role_ojt" value="1" <?= $isChecked('role_ojt', $user->role_ojt)?> id="flexSwitchCheckDefault" />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Role OJT</label>
                                </div>
                                <input type="hidden" name="role_idt" value="0">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="role_idt" value="1" <?= $isChecked('role_idt', $user->role_idt)?> id="flexSwitchCheckDefault" />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Role IDT</label>
                                </div>
                                <input type="hidden" name="role_aps" value="0">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="role_aps" value="1" <?= $isChecked('role_aps', $user->role_aps)?> id="flexSwitchCheckDefault" />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Role APS</label>
                                </div>
                                <input type="hidden" name="role_fnp_admin" value="0">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="role_fnp_admin" value="1" <?= $isChecked('role_fnp_admin', $user->role_fnp_admin)?> id="flexSwitchCheckDefault" />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Role Admin FnP</label>
                                </div>
                                <input type="hidden" name="role_admin_komite" value="0">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="role_admin_komite" value="1" <?= $isChecked('role_admin_komite', $user->role_admin_komite)?> id="flexSwitchCheckDefault" />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Role Admin Komite</label>
                                </div>
                                <input type="hidden" name="role_fnp_penguji" value="0">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="role_fnp_penguji" value="1" <?= $isChecked('role_fnp_penguji', $user->role_fnp_penguji)?> id="flexSwitchCheckDefault" />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Role Penguji FnP</label>
                                </div>
                                <input type="hidden" name="ket_aktif" value="0">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="ket_aktif" value="1" <?= $isChecked('ket_aktif', $user->ket_aktif)?> id="flexSwitchCheckDefault" />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Aktif</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
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