<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Tambah Evaluasi Mutasi</title>
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
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/quill.bubble.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/quill.snow.css" />



<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Form Row Start -->
<section class="scroll-section" id="formRow">
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
    <div class="btn-group">
        <a href="<?= site_url('career/evaluasimutasi') ?>" class="btn-link">
            <i data-cs-icon="chevron-left" class="mt-2 me-2" data-cs-size="15"></i>
        </a>
        <h2 class="small-title mt-2">Tambah Data Evaluasi</h2>
    </div>
    <form action="<?= site_url('career/saveeval') ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="row">
            <div class="col-12 col-xl-12 col-xxl-12 mb-4">
                <div class="">
                    <div class="">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="inputPassword4" class="form-label">Dasar Mutasi</label>
                                <div class="input-group">
                                    <select class="form-select noDasarMutasi" id="select2Basic6" name="id_dasar_mutasi" aria-label="Example select with button addon">
                                        <option selected></option>
                                        <?php foreach ($dm as $key => $value) : ?>
                                            <option value="<?= $value->id_dm ?>"><?= $value->no_dm ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#semiFullExample" style="border-radius: 10px; width:10px; margin-left:2px;">
                                        <i data-cs-icon="plus" class="me-2" data-cs-size="15" style="margin-left:-8px;"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="inputPassword4" class="form-label">Dari</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#semiFullExample2">
                                            <i data-cs-icon="more-vertical" class="icon" data-cs-size="18"></i>
                                        </a>
                                    </span>
                                    <input type="text" class="form-control" id="jenis_dm" name="unit_pengaju" readonly />
                                    <!-- 31 -->

                                </div>
                                <input type="hidden" class="form-control" id="no_dasar_mutasi" name="dasar_mutasi" readonly />
                                <input type="hidden" class="form-control" id="idDasarMutasi" name="" readonly />
                            </div>
                            <div class="col-md-3">
                                <label for="inputPassword4" class="form-label">Tanggal Dasar Mutasi</label>
                                <input type="text" class="form-control" id="tgl_dm" name="tgl_dasar_mutasi" readonly />
                            </div>
                            <div class="col-3">
                                <label for="inputAddress2" class="form-label">Tanggal Disposisi</label>
                                <input type="text" class="form-control" id="tgl_dispo_dm" name="tgl_disposisi" readonly />
                            </div>
                            <div class="col-md-3 mt-1">
                                <label for="inputPassword4" class="form-label">Jenis Mutasi</label>
                                <select id="select2Basic8" onkeyup="kapital()" name="jenis_mutasi" class="w-100 form-control">
                                    <option label="&nbsp;"></option>
                                    <option value="1">LOLOS BUTUH</option>
                                    <option value="2">APS</option>
                                    <option value="3">BURSA</option>
                                    <option value="4">ROTASI INTERNAL DIVISI</option>
                                    <option value="9">ROTASI INTERNAL DIREKTORAT</option>
                                    <option value="5">BERANGKAT PTB</option>
                                    <option value="6">KEMBALI PTB</option>
                                    <option value="7">PROMOSI</option>
                                    <option value="8">DEMOSI</option>
                                    <option value="10">TUGAS KARYA</option>
                                    <option value="11">KEMBALI TUGAS KARYA</option>
                                    <option value="12">IDT</option>
                                    <option value="13">KEMBALI IDT</option>
                                    <option value="14">PERPANJANGAN TUGAS KARYA</option>
                                    <option value="15">PERPANJANGAN IDT</option>
                                </select>
                            </div>
                            <div class="col-3 mt-1">
                                <label for="inputAddress2" class="form-label">Alasan Mutasi</label>
                                <input type="text" class="form-control" id="inputAddress2" name="alasan_mutasi" />
                            </div>
                            <div class="col-md-3 mt-1">
                                <label for="inputEmail4" class="form-label">HTD Area</label><span><small>(untuk koordinasi)</small></span>
                                <input type="" class="form-control for_collab" id="inputEmail4" name="for_collab_htd_area" readonly />
                            </div>
                            <div class="col-md-3 mt-1">
                                <label for="inputEmail4" class="form-label">PIC Mutasi</label>
                                <input type="" class="form-control" id="inputEmail4" value="<?= userLogin()->nama_user ?>" readonly />
                                <input type="hidden" class="form-control" name="pic_mutasi" value="<?= userLogin()->nip ?>" readonly />
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-xl-4 col-xxl-4">
                <div class="card mb-5">
                    <div class="card-header">
                        <h2 class="small-title" style="margin-bottom: -100px; margin-top:-10px;">Input Data</h2>
                    </div>
                    <div class="card-body" style="margin-top: -20px;">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="inputEmail4" class="form-label">NIP</label>
                                <input type="" class="form-control nipToEval" name="kode_nip" id="username" onkeyup="kapital()" />
                            </div>
                            <div class="col-12 mt-1 mb-1">
                                <label for="inputCity" class="form-label">
                                    <a href="https://docs.google.com/spreadsheets/d/1PZv8pfV2ezWkXvxyVWJ3tljt3RPnLQvk/edit#gid=974318673" target="_blank" rel="noopener noreferrer"><u>Dahan Profesi Jabatan Saat Ini</u></a>
                                </label>
                                <select id="select2Basic4" onkeyup="kapital()" name="dahan_profesi_skrg" class="w-100">
                                    <option label="&nbsp;"></option>
                                    <?php foreach ($profesi as $key => $value) : ?>
                                        <option value="<?= $value->dahan_profesi ?>"><?= $value->nama_profesi ?> - <?= $value->dahan_profesi ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-12 mt-1 mb-1">
                                <label for="inputCity" class="form-label">
                                    % Realisasi FTK UP/SUP Asal
                                </label>
                                <input type="" class="form-control" id="inputftkupsupasal" name="ftkupsupasal" />
                                <span class="text-muted" id="" style="font-size: smaller;">pemisah desimal menggunakan tanda titik (*bila ada)</span>
                            </div>
                            <div class="col-12 mt-1 mb-1">
                                <label for="inputCity" class="form-label">Proyeksi Unit Induk Tujuan</label>
                                <select id="select2Basic2" onkeyup="kapital()" name="unit_tujuan" class="w-100 form-control proyeksi-unit">
                                    <option label="&nbsp;"></option>
                                    <?php foreach ($org as $key => $value) : ?>
                                        <option value="<?= $value->kode_org_satu ?>"><?= $value->nama_org_satu ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12 mt-1 mb-1 d-none" id="boxDivTujuan">
                                <label for="inputCity" class="form-label">Proyeksi Divisi Tujuan</label>
                                <select id="select2Basic3" onkeyup="kapital()" name="div_tujuan" class="w-100 form-control divisi-tujuan">
                                    <option label="&nbsp;"></option>
                                    <?php foreach ($divtj as $key => $value) : ?>
                                        <option value="<?= $value->nick_name_org_div ?>"><?= $value->nick_name_org_div ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12 mt-1 mb-1 d-none" id="boxOrgDuaTujuan">
                                <label for="inputCity" class="form-label">Proyeksi Unit Pelaksana Tujuan</label>
                                <select id="select2Basic14" onkeyup="kapital()" name="org_dua_tujuan" class="w-100 form-control unitPelaksana">

                                </select>
                            </div>
                            <div class="col-12 mt-1 mb-1 d-none" id="boxOrgTigaTujuan">
                                <label for="inputCity" class="form-label">Proyeksi Sub Unit Pelaksana Tujuan</label>
                                <select id="select2Basic13" onkeyup="kapital()" name="org_tiga_tujuan" class="w-100 form-control divisi-tujuan">

                                </select>
                            </div>
                            <div class="col-md-12 mt-1 mb-1">
                                <label for="inputCity" class="form-label">
                                    % Realisasi FTK UP/SUP Tujuan
                                </label>
                                <input type="" class="form-control" id="inputftkupsup" name="ftkupsup" />
                                <span class="text-muted" id="" style="font-size: smaller;">pemisah desimal menggunakan tanda titik (*bila ada)</span>
                            </div>
                            <!-- <div class="col-12 mt-1 mb-1 d-none" id="boxbidangkp">
                                <label for="inputCity" class="form-label">Bidang</label>
                                <select id="select2Basic15" name="" class="w-100 form-control bidangkp">

                                </select>
                            </div> -->
                            <!-- <div class="col-12 mt-1 mb-1 " id="boxsubidgkp">
                                <label for="inputCity" class="form-label">Sub Bidang</label>
                                <select id="select2Basic" name="" class="w-100 form-control subidkp">

                                </select>
                            </div> -->
                            <div class="col-md-12 mt-1 mb-1">
                                <label for="inputCity" class="form-label">
                                    <a href="https://www.google.com/maps/" target="_blank" rel="noopener noreferrer"><u>Jarak Antar Unit (KM)</u></a>
                                </label>
                                <input type="" class="form-control" id="jarakUnit" name="jarak_antar_unit" />
                                <span class="text-muted" id="" style="font-size: smaller;"></span>
                            </div>
                            <div class="col-12 mt-1 mb-1">
                                <label for="inputCity" class="form-label">Proyeksi Dahan Profesi Jabatan Tujuan</label>
                                <select id="select2Basic5" onkeyup="kapital()" name="dahan_profesi_tujuan" class="w-100">
                                    <option label="&nbsp;"></option>
                                    <?php foreach ($profesi as $key => $value) : ?>
                                        <option value="<?= $value->dahan_profesi ?>"><?= $value->nama_profesi ?> - <?= $value->dahan_profesi ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-12 mt-1 mb-1">
                                <label for="inputCity" class="form-label">Kode Org Tujuan </label>
                                <input type="" class="form-control" id="kodeOrgTujuan" name="kode_org_unit_tujuan" />
                                <span class="text-muted" id="" style="font-size: smaller;"></span>
                            </div>
                            <div class="col-md-12 mt-1 mb-1">
                                <label for="inputCity" class="form-label">PoG Jabatan Tujuan</label>
                                <input type="" class="form-control" id="pogBaru" name="pog_baru" onkeyup="kapital()" />
                            </div>
                            <div class="col-md-12 mt-1 mb-1">
                                <label for="inputCity" class="form-label">Proyeksi Jabatan Tujuan (Lengkap)</label>
                                <textarea type="text" class="form-control" id="inputCity" name="proyeksi_jabatan_baru" rows="5"></textarea>
                            </div>
                            <hr class="mt-4">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="inputGroupFile02" name="cv_peg_eval">
                                <input type="hidden" name="tgl_upload_cv" value="<?= date('Y-m-d') ?>">
                                <label class="input-group-text" for="inputGroupFile02">Upload CV</label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 col-xl-8 col-xxl-8 mb-5">
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="row">
                            <?= date('') ?>
                            <div class="col-md-3 mt-1">
                                <label for="inputEmail4" class="form-label">NIP</label>
                                <input type="" class="form-control" id="nipEval" name="nip_eval" readonly />
                                <input type="hidden" class="form-control" id="kodeOrgUnit" name="kode_org_unit_eval" readonly />
                                <input type="hidden" class="form-control" id="jabatanLengkap" name="jabatan_lengkap" readonly />
                            </div>
                            <div class="col-md-7 mt-1">
                                <label for="inputPassword4" class="form-label">Nama</label>
                                <input type="" class="form-control" id="namaEval" name="nama_eval" readonly />
                            </div>
                            <div class="col-2 mt-1">
                                <label for="inputAddress" class="form-label"><small>PeG Saat ini</small></label>
                                <input type="text" class="form-control" id="pegEval" name="peg_eval" readonly />
                            </div>
                            <div class="col-md-10 mt-1">
                                <label for="inputCity" class="form-label">Jabatan Saat Ini</label>
                                <input type="text" class="form-control" id="jabatanSaatIni" name="jabatan_saat_ini" readonly>
                            </div>
                            <div class="col-md-2 mt-1">
                                <label for="inputCity" class="form-label"><small>PoG Saat ini</small></label>
                                <input type="text" class="form-control" id="pogSaatIni" name="pog_saat_ini" readonly />
                            </div>
                            <div class="col-md-4 mt-1">
                                <label for="inputCity" class="form-label">Jenjab</label>
                                <input type="text" class="form-control" id="jenjabEval" readonly />
                                <input type="hidden" class="form-control" id="jenjabEval2" name="jenjab_eval" readonly />
                            </div>
                            <div class="col-md-4 mt-1">
                                <label for="inputCity" class="form-label">Masa Jabatan Terakhir</label>
                                <input type="text" class="form-control" id="masaJabatanTerakhir" name="" readonly />
                                <input type="hidden" class="form-control" id="masaJabatanTerakhir2" name="masa_jabatan_terakhir" readonly />
                                <input type="hidden" class="form-control" id="tgljabtrk" name="tgl_jabtrk" readonly />
                            </div>
                            <div class="col-md-4 mt-1">
                                <label for="inputCity" class="form-label">Masa Kerja</label>
                                <input type="text" class="form-control" id="masaKerja" readonly />
                                <input type="hidden" class="form-control" id="masaKerja2" name="masa_kerja" readonly />
                                <input type="hidden" class="form-control" id="boxTglPegTtp" name="tgl_peg_ttp" readonly />
                            </div>
                            <div class="col-md-2 mt-1">
                                <label for="inputCity" class="form-label">Unit Induk</label>
                                <input type="text" class="form-control" id="unitAsal" name="unit_asal" readonly />
                                <input type="hidden" class="form-control" id="kodeUnitAsal" name="kode_unit_asal" readonly />
                            </div>
                            <div class="col-md-5 mt-1">
                                <label for="inputCity" class="form-label">Unit Pelaksana</label>
                                <input type="text" class="form-control" id="unitPelaksana1" name="unit_pelaksana_eval" readonly />
                            </div>
                            <div class="col-md-5 mt-1">
                                <label for="inputCity" class="form-label">Sub Unit Pelaksana</label>
                                <input type="text" class="form-control" id="subUnitPelaksana1" name="sub_unit_pelaksana_eval" readonly />
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="inputCity" class="form-label">FTK Unit Asal</label>
                                <input type="text" class="form-control" id="realisasiFtkUnitAsal" readonly />
                                <input type="hidden" class="form-control" id="realisasiFtkUnitAsal2" name="realisasi_ftk_unit_asal" readonly />
                            </div>
                            <div class="col-md-3 mt-1">
                                <label for="inputCity" class="form-label">FTK Nasional</label>
                                <input type="text" class="form-control" id="realFtkNasional" readonly />
                                <input type="hidden" class="form-control" id="realFtkNasional2" name="real_ftk_nasional" readonly />
                            </div>
                            <div class="col-md-3 mt-1">
                                <label for="inputCity" class="form-label">FTK Acuan</label>
                                <input type="text" class="form-control" id="realFtkAcuan" readonly />
                            </div>
                            <div class="col-6 mt-1">
                                <label for="inputAddress2" class="form-label">Pendidikan</label>
                                <input type="text" class="form-control" id="pendidikan" name="pendidikan" readonly />
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="inputCity" class="form-label">Status Suami/Istri</label>
                                <input type="text" class="form-control" id="statusPasangan" name="status_pasangan" readonly />
                                <input type="hidden" class="form-control" id="statusPerkawinan" name="status_perkawinan" readonly />
                            </div>
                            <div class="col-md-3 mt-1">
                                <label for="inputCity" class="form-label">Status Hukdis</label>
                                <input type="text" class="form-control" id="statusHukdis" name="status_hukdis" readonly />
                            </div>
                            <div class="col-md-3 mt-1">
                                <label for="inputCity" class="form-label">Status SP</label>
                                <input type="text" class="form-control" id="inputCity" name="status_pengurus_sp" readonly />
                            </div>
                            <div class="col-md-3 mt-1">
                                <label for="inputCity" class="form-label">Kota Lahir</label>
                                <input type="text" class="form-control" id="kotaLahir" name="kota_lahir" readonly />
                            </div>
                            <div class="col-md-3 mt-1">
                                <label for="inputCity" class="form-label">Kota Rumah</label>
                                <input type="text" class="form-control" id="kotaRumah" name="kota_rumah" readonly />
                            </div>
                            <hr class="mt-4">
                            <div class="col-md-2 mt-1">
                                <label for="inputCity" class="form-label">PoG Jabatan Baru</label>
                                <input type="text" class="form-control" id="pogJabBaruView" readonly />
                            </div>
                            <div class="col-md-5 mt-1">
                                <label for="inputCity" class="form-label">Real FTK Tujuan Saat Ini</label>
                                <input type="text" class="form-control" id="realisasiFtkUnitTujuan" readonly />
                                <input type="hidden" class="form-control" id="realisasiFtkUnitTujuan2" name="realisasi_ftk_unit_tujuan" readonly />
                                <input type="hidden" class="form-control" name="timestapm_entry" value="<?= date('Y-m-d H:i:s') ?>" />
                            </div>
                            <div class="col-md-5 mt-1">
                                <label for="inputCity" class="form-label">Estimasi Real FTK Tujuan Bulan Depan</label>
                                <input type="text" class="form-control" id="estimasiFtkTujuan" readonly />
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="checkData" />
                                    <label class="form-check-label" for="gridCheck">saya telah memeriksa data ini</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-grid gap-2 col-12 mx-auto d-none" style="margin-top: -20px; margin-bottom: -20px;" id="boxFooter">
                            <button class="btn btn-primary btn-eval-kriteria" type="button">Evaluasi Kriteria</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Compact Start -->
        <section class="scroll-section" style="margin-top: 5px;" id="addCardOverlaySpinner">
            <h2 class="small-title">Hasil Evaluasi Kriteria</h2>
            <div class="row g-0">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-0 mb-n5 mb-sm-0 d-flex justify-content-center align-items-center">
                                <div class="col-6 col-sm-1 text-center d-flex justify-content-center align-items-center flex-column mb-4 mb-sm-0">
                                    <p class="text-small text-info">1</p>
                                    <div class="bg-gradient-light sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center mb-1" type="button" data-bs-container="body" data-bs-toggle="popover" data-bs-html="true" data-bs-placement="top" data-bs-content="<small class='text-center'>PeG: 11 <br> PoG Tujuan: 11</small>">
                                        <i data-cs-icon="user" class=""></i><span class="badge d-none" id="notifPeGPoG" style="font-size: 9px;"></span>
                                        <input type="hidden" name="notif_pegpog" id="notifPeGPoG2">
                                    </div>
                                    <div class="text-small text-muted mb-1">PeG-PoG</div>
                                    <div class="text-small text-primary d-none" id="textPeGPoG"></div>
                                    <input type="hidden" name="text_pegpog" id="textPeGPoG2">
                                </div>
                                <div class="col-6 col-sm-1 text-center d-flex justify-content-center align-items-center flex-column mb-4 mb-sm-0">
                                    <p class="text-small text-info">2</p>
                                    <div class="bg-gradient-light sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center mb-1" type="button" data-bs-container="body" data-bs-toggle="popover" data-bs-html="true" data-bs-placement="top" data-bs-content="<small class='text-center'>FTK Asal: 96% (> Rata-Rata Nasional) <br> FTK Tujuan: 83% (< Rata-Rata Nasional) <br> FTK Rata2 Nasional: 95.5%</small>">
                                        <i data-cs-icon="building-small" class=""></i><span class="badge d-none" id="notifFtk" style="font-size: 9px;"></span>
                                        <input type="hidden" name="notif_ftk" id="notifFtk2">
                                    </div>
                                    <div class="text-small text-muted mb-1">FTK</div>
                                    <div class="text-small text-primary d-none" id="textFtk"></div>
                                    <input type="hidden" name="text_ftk" id="textFtk2">
                                </div>
                                <div class="col-6 col-sm-1 text-center d-flex justify-content-center align-items-center flex-column mb-4 mb-sm-0">
                                    <p class="text-small text-info">3</p>
                                    <div class="bg-gradient-light sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center mb-1" type="button" data-bs-container="body" data-bs-toggle="popover" data-bs-html="true" data-bs-placement="top">
                                        <i data-cs-icon="support" class=""></i><span class="badge d-none" id="notifRekan" style="font-size: 9px;"></span>
                                        <input type="hidden" name="notif_rekan" id="notifRekan2">
                                    </div>
                                    <div class="text-small text-muted mb-1">Rekan</div>
                                    <div class="text-small text-primary d-none" id="textRekan"></div>
                                    <input type="hidden" name="text_rekan" id="textRekan2">
                                    <input type="hidden" name="text_rekan_tujuan" id="textRekan3">
                                </div>
                                <div class="col-6 col-sm-1 text-center d-flex justify-content-center align-items-center flex-column mb-4 mb-sm-0">
                                    <p class="text-small text-info">4</p>
                                    <div class="bg-gradient-light sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center mb-1" type="button" data-bs-container="body" data-bs-toggle="popover" data-bs-html="true" data-bs-placement="top" data-bs-content="<small class='text-center'>Tgl Masuk: 01.04.2014 <br> Masa Kerja: 9 Th 9 Bulan</small>">
                                        <i data-cs-icon="hourglass" class=""></i><span class="badge bg-info d-none" id="notifMasaKerja" style="font-size: 9px;"></span>
                                        <input type="hidden" name="notif_masa_kerja" id="notifMasaKerja2">
                                    </div>
                                    <div class="text-small text-muted mb-1">Masa Kerja</div>
                                    <div class="text-small text-primary d-none" id="textMasaKerja"></div>
                                    <input type="hidden" name="text_masa_kerja" id="textMasaKerja2">
                                </div>
                                <div class="col-6 col-sm-1 text-center d-flex justify-content-center align-items-center flex-column mb-4 mb-sm-0">
                                    <p class="text-small text-info">5</p>
                                    <div class="bg-gradient-light sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center mb-1" type="button" data-bs-container="body" data-bs-toggle="popover" data-bs-html="true" data-bs-placement="top" data-bs-content="<small class='text-center'>Tgl Jab. Terakhir: 01.05.2021 <br> Mas Jab. Terakhir: 1 th 8 Bulan</small>">
                                        <i data-cs-icon="calendar" class=""></i><span class="badge bg-info d-none" id="notifMasaJabTrkhir" style="font-size: 9px;">Ok</span>
                                        <input type="hidden" name="notif_masa_jab_trkhir" id="notifMasaJabTrkhir2">
                                    </div>
                                    <div class="text-small text-muted mb-1">Masa Jab. Terakhir</div>
                                    <div class="text-small text-primary d-none" id="textMasaJabTrkhir"></div>
                                    <input type="hidden" name="text_masa_jab_trkhir" id="textMasaJabTrkhir2">
                                </div>
                                <!-- <div class="col-6 col-sm-1 text-center d-flex justify-content-center align-items-center flex-column mb-4 mb-sm-0">
                                    <p class="text-small text-info">5</p>
                                    <div class="bg-gradient-light sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center mb-1" type="button" data-bs-container="body" data-bs-toggle="popover" data-bs-html="true" data-bs-placement="top" data-bs-content="<small class='text-center'>Ybs saat ini adalah non struktural</small>">
                                        <i data-cs-icon="refresh-horizontal" class=""></i><span class="badge bg-info d-none" style="font-size: 9px;">Ok</span>
                                    </div>
                                    <div class="text-small text-muted mb-1">Kali Jabat</div>
                                    <div class="text-small text-primary d-none">-</div>
                                </div> -->
                                <!-- <div class="col-6 col-sm-1 text-center d-flex justify-content-center align-items-center flex-column mb-4 mb-sm-0">
                                    <p>6</p>
                                    <div class="bg-gradient-light sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center mb-1" type="button" data-bs-container="body" data-bs-toggle="popover" data-bs-html="true" data-bs-placement="top" data-bs-content="<small class='text-center'>Pendidikan: S1 Listrik <br> Proyeksi Jab.: Technician Pengembangan Sistem Ketenagalistrikan </small>">
                                        <i data-cs-icon="anchor" class=""></i>
                                    </div>
                                    <div class="text-small text-muted mb-1">Sesuai Pendidikan</div>
                                    <div class="text-small text-primary">Memenuhi</div>
                                </div> -->
                                <div class="col-6 col-sm-1 text-center d-flex justify-content-center align-items-center flex-column mb-4 mb-sm-0">
                                    <p class="text-small text-info">6</p>
                                    <div class="bg-gradient-light sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center mb-1" type="button" data-bs-container="body" data-bs-toggle="popover" data-bs-html="true" data-bs-placement="top" data-bs-content="<small class='text-center'>Profesi Asal: Operasi Sistem Distribusi (DIS.1.3.1.3) <br> Profesi Tujuan: Perencanaan Distribusi (DIS.1.3.1.1)</small>">
                                        <i data-cs-icon="link" class=""></i><span class="badge bg-info d-none" id="notifProfesi" style="font-size: 9px;"></span>
                                        <input type="hidden" name="notif_profesi" id="notifProfesi2">
                                    </div>
                                    <div class="text-small text-muted mb-1">Profesi</div>
                                    <div class="text-small text-primary d-none" id="textProfesi"></div>
                                    <input type="hidden" name="text_profesi" id="textProfesi2">
                                    <input type="hidden" name="text_peta_risk" id="ilPetaRisk2">
                                </div>
                                <!-- <div class="col-6 col-sm-1 text-center d-flex justify-content-center align-items-center flex-column mb-4 mb-sm-0">
                                    <p class="text-small text-info">6</p>
                                    <div class="bg-gradient-light sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center mb-1" type="button" data-bs-container="body" data-bs-toggle="popover" data-bs-html="true" data-bs-placement="top" data-bs-content="<small class='text-center'>Lokasi Asal: <br> Lokasi Tujuan: </small>">
                                        <i data-cs-icon="pin" class=""></i><span class="badge bg-info d-none" style="font-size: 9px;">Ok</span>
                                    </div>
                                    <div class="text-small text-muted mb-1">Lokasi Kerja</div>
                                    <div class="text-small text-primary d-none">Memenuhi</div>
                                </div> -->
                                <div class="col-6 col-sm-1 text-center d-flex justify-content-center align-items-center flex-column mb-4 mb-sm-0">
                                    <p class="text-small text-info">7</p>
                                    <div class="bg-gradient-light sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center mb-1" type="button" data-bs-container="body" data-bs-toggle="popover" data-bs-html="true" data-bs-placement="top" data-bs-content="<small class='text-center'>Mutasi dari kota A ke Kota B memerlukan SPPD</small>">
                                        <input type="hidden" name="notif_sppd" id="notifsppd2">
                                        <i data-cs-icon="plane" class=""></i><span class="badge bg-info d-none" id="notifsppd" style="font-size: 9px;">Ok</span>
                                    </div>
                                    <div class="text-small text-muted mb-1">SPPD</div>
                                    <div class="text-small text-primary d-none" id="textsppd"></div>
                                    <input type="hidden" name="text_sppd" id="textsppd2">
                                </div>
                                <div class="col-6 col-sm-1 text-center d-flex justify-content-center align-items-center flex-column mb-4 mb-sm-0">
                                    <p class="text-small text-info">8</p>
                                    <div class="bg-gradient-light sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center mb-1" type="button" data-bs-container="body" data-bs-toggle="popover" data-bs-html="true" data-bs-placement="top" data-bs-content="<small class='text-center'>Nama: Fulana <br> NIP: 8xxxxxx <br> Unit: UID Jatim <br> status: Istri</small>">
                                        <i data-cs-icon="tea" class=""></i><span class="badge bg-info d-none" id="notifPAP" style="font-size: 9px;"></span>
                                        <input type="hidden" name="notif_pap" id="notifPAP2">
                                    </div>
                                    <div class="text-small text-muted mb-1">PAP</div>
                                    <div class="text-small text-primary d-none" id="textPAP"></div>
                                    <input type="hidden" name="text_pap" id="textPAP2">
                                    <input type="hidden" name="nama_pap" id="ilNamaPAP2">
                                    <input type="hidden" name="nip_pap" id="ilnipPAP2">
                                    <input type="hidden" name="unit_pap" id="ilunitPAP2">
                                    <input type="hidden" name="unit_pelaksana_pap" id="ilunitPelaksanaPAP2">
                                    <input type="hidden" name="sub_unit_pap" id="ilsubunitPelaksanaPAP2">
                                    <input type="hidden" name="ket_pap" id="ilketPAP2">
                                </div>
                                <div class="col-6 col-sm-1 text-center d-flex justify-content-center align-items-center flex-column mb-4 mb-sm-0">
                                    <p class="text-small text-info">9</p>
                                    <div class="bg-gradient-light sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center mb-1" type="button" data-bs-container="body" data-bs-toggle="popover" data-bs-html="true" data-bs-placement="top" data-bs-content="<small class='text-center'>-</small>">
                                        <i data-cs-icon="twitter" class=""></i><span class="badge bg-info d-none" id="notifSP" style="font-size: 9px;"></span>
                                        <input type="hidden" name="notif_sp" id="notifSP2">
                                    </div>
                                    <div class="text-small text-muted mb-1">Pengurus SP</div>
                                    <div class="text-small text-primary d-none" id="textSP"></div>
                                    <input type="hidden" name="text_sp" id="textSP2">
                                    <input type="hidden" name="unit_sp" id="ilunitSP2">
                                    <input type="hidden" name="jab_sp" id="iljabatanSP2">
                                    <input type="hidden" name="org_sp" id="ilorgSP2">
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <div class="accordion-header " id="headingOne">
                                        <button class="accordion-button collapsed text-medium fst-italic" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Detailed Information
                                        </button>
                                    </div>
                                    <div id="collapseOne" class="accordion-collapse collapsed" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body text-medium">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <table class="table table-sm table-borderless">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Jenis Mutasi</td>
                                                                        <td>:</td>
                                                                        <td id="ilJenisMutasi"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-lg-6 col-6 mt-1 mb-1">
                                                    <div class="card border-primary">
                                                        <div class="card-header text-primary" style="padding: 3%;">PeG PoG</div>
                                                        <div class="card-body text-primary" style="padding: 3%;">
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <table class="table table-sm table-borderless">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>PeG</td>
                                                                                <td>:</td>
                                                                                <td id="ilPeG"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>PoG Tujuan</td>
                                                                                <td>:</td>
                                                                                <td id="ilPoG"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-lg-6 col-6 mt-1 mb-1">
                                                    <div class="card border-danger text-danger">
                                                        <div class="card-header" style="padding: 3%;">FTK</div>
                                                        <div class="card-body" style="padding: 3%;">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <table class="table table-sm">
                                                                        <thead>
                                                                            <th>FTK</th>
                                                                            <th>Realisasi (%)</th>
                                                                            <th>Kategory</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>FTK Asal</td>
                                                                                <td id="ftkAsalReal"></td>
                                                                                <td id="ftkAsalKat"></td>
                                                                                <input type="hidden" name="kategori_ftk_asal" id="ftkAsalKat2">
                                                                            </tr>
                                                                            <tr>
                                                                                <td>FTK Tujuan</td>
                                                                                <td id="ftkTujuanReal"></td>
                                                                                <td id="ftkTujuanKat"></td>
                                                                                <input type="hidden" name="kategori_ftk_tujuan" id="ftkTujuanKat2">
                                                                            </tr>
                                                                            <tr class="">
                                                                                <td>FTK UP/SUP Asal</td>
                                                                                <td id="ftkUpSupasal"></td>
                                                                                <td id="ftkUpSupKatasal"></td>
                                                                                <input type="hidden" name="kategoriftkupsupasal" id="ftkUpSupasalKat2">
                                                                            </tr>
                                                                            <tr class="">
                                                                                <td>FTK UP/SUP Tujuan</td>
                                                                                <td id="ftkUpSup"></td>
                                                                                <td id="ftkUpSupKat"></td>
                                                                                <input type="hidden" name="kategoriftkupsup" id="ftkUpSupKat2">
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-lg-6 col-6 mt-1 mb-1">
                                                    <div class="card border-primary">
                                                        <div class="card-header text-primary" style="padding: 3%;">Rekan Asal</div>
                                                        <div class="card-body text-primary" style="padding: 3%;">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <table class="table table-sm">
                                                                        <thead>
                                                                            <th>No</th>
                                                                            <th>Nama</th>
                                                                            <th>NIP</th>
                                                                            <th>Jabatan</th>
                                                                        </thead>
                                                                        <tbody class="d-none" id="boxDataRekan">

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-lg-6 col-6 mt-1 mb-1">
                                                    <div class="card border-primary">
                                                        <div class="card-header text-primary" style="padding: 3%;">Rekan Tujuan</div>
                                                        <div class="card-body text-primary" style="padding: 3%;">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <table class="table table-sm">
                                                                        <thead>
                                                                            <th>No</th>
                                                                            <th>Nama</th>
                                                                            <th>NIP</th>
                                                                            <th>Jabatan</th>
                                                                        </thead>
                                                                        <tbody class="d-none" id="boxDataRekanTujuan">

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-lg-6 col-6 mt-1 mb-1">
                                                    <div class="card border-primary">
                                                        <div class="card-header text-primary" style="padding: 3%;">Masa Kerja</div>
                                                        <div class="card-body text-primary" style="padding: 3%;">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <table class="table table-sm table-borderless">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Tgl Peg. Tetap</td>
                                                                                <td>:</td>
                                                                                <td id="ilTglPegwTtp"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Tgl Evaluasi</td>
                                                                                <td>:</td>
                                                                                <td id="ilTglEvaluasi"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Masa Kerja</td>
                                                                                <td>:</td>
                                                                                <td id="ilMasaKerja"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-lg-6 col-6 mt-1 mb-1">
                                                    <div class="card border-primary">
                                                        <div class="card-header text-primary" style="padding: 3%;">Masa Jabatan Terakhir</div>
                                                        <div class="card-body text-primary" style="padding: 3%;">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <table class="table table-sm table-borderless">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Tgl Jabatan Terakhir</td>
                                                                                <td>:</td>
                                                                                <td id="ilTglJabTrkhr"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Tgl Evaluasi</td>
                                                                                <td>:</td>
                                                                                <td id="ilTglEvaluasi2"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Masa Jabatan Terakhir</td>
                                                                                <td>:</td>
                                                                                <td id="ilMasaJabTrkhr"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-4 col-lg-6 col-6 mt-1 mb-1">
                                                    <div class="card border-primary">
                                                        <div class="card-header text-primary" style="padding: 3%;">Kali Menjabat</div>
                                                        <div class="card-body text-primary" style="padding: 3%;">
                                                            <h5 class="card-title text-primary">Primary card title</h5>
                                                            <p class="card-text">Brownie ice cream marshmallow topping.</p>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <div class="col-md-4 col-lg-6 col-6 mt-1 mb-1">
                                                    <div class="card border-primary">
                                                        <div class="card-header text-primary" style="padding: 3%;">Kesesuaian Dahan Profesi</div>
                                                        <div class="card-body text-primary" style="padding: 3%;">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <table class="table table-sm table-borderless">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Dahan Profesi Saat Ini</td>
                                                                                <td>:</td>
                                                                                <td id="ilProfesiSkrg"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Dahan Profesi Tujuan</td>
                                                                                <td>:</td>
                                                                                <td id="ilProfesiTujuan"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Evaluasi Risiko Profesi</td>
                                                                                <td>:</td>
                                                                                <td id="ilPetaRisk"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-4 col-lg-6 col-6 mt-1 mb-1">
                                                    <div class="card border-primary">
                                                        <div class="card-header text-primary" style="padding: 3%;">Lokasi Kerja</div>
                                                        <div class="card-body text-primary" style="padding: 3%;">
                                                            <h5 class="card-title text-primary">Primary card title</h5>
                                                            <p class="card-text">Brownie ice cream marshmallow topping.</p>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <!-- <div class="col-md-4 col-lg-6 col-6 mt-1 mb-1">
                                                    <div class="card border-primary">
                                                        <div class="card-header text-primary" style="padding: 3%;">SPPD</div>
                                                        <div class="card-body text-primary" style="padding: 3%;">
                                                            <h5 class="card-title text-primary">Primary card title</h5>
                                                            <p class="card-text">Brownie ice cream marshmallow topping.</p>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <div class="col-md-4 col-lg-6 col-6 mt-1 mb-1">
                                                    <div class="card border-primary">
                                                        <div class="card-header text-primary" style="padding: 3%;">Pengurus Serikat Pekerja</div>
                                                        <div class="card-body text-primary" style="padding: 3%;">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <table class="table table-sm table-borderless">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Jabatan SP</td>
                                                                                <td>:</td>
                                                                                <td id="iljabatanSP"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Unit SP</td>
                                                                                <td>:</td>
                                                                                <td id="ilunitSP"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>org_sp</td>
                                                                                <td>:</td>
                                                                                <td id="ilorgSP"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-lg-6 col-6 mt-1 mb-1">
                                                    <div class="card border-primary">
                                                        <div class="card-header text-primary" style="padding: 3%;">Pernikahan Antar Pegawai</div>
                                                        <div class="card-body text-primary" style="padding: 3%;">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <table class="table table-sm table-borderless">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Nama</td>
                                                                                <td>:</td>
                                                                                <td id="ilNamaPAP"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>NIP</td>
                                                                                <td>:</td>
                                                                                <td id="ilnipPAP"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Unit Induk/Divisi</td>
                                                                                <td>:</td>
                                                                                <td id="ilunitPAP"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Unit Pelaksana</td>
                                                                                <td>:</td>
                                                                                <td id="ilunitPelaksanaPAP"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Sub Unit Pelaksana</td>
                                                                                <td>:</td>
                                                                                <td id="ilsubunitPelaksanaPAP"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Ket</td>
                                                                                <td>:</td>
                                                                                <td id="ilketPAP"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-lg-6 col-6 mt-1 mb-1">
                                                    <div class="card border-primary">
                                                        <div class="card-header text-primary" style="padding: 3%;">SPPD</div>
                                                        <div class="card-body text-primary" style="padding: 3%;">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <table class="table table-sm table-borderless">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Estimasi Biaya SPPD</td>
                                                                                <td>:</td>
                                                                                <td id="estiSppd"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Realisasi Biaya SPPD Unit Asal</td>
                                                                                <td>:</td>
                                                                                <td id="estiSppdUnit"></td>
                                                                                <input type="hidden" name="real_spdm" id="realspdmnumber">
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Pagu SPPD Mutasi Unit Asal</td>
                                                                                <td>:</td>
                                                                                <td id="paguSppdmutasi"></td>
                                                                                <input type="hidden" name="pagu_spdm" id="paguspdmnumber">
                                                                            </tr>
                                                                            <tr>
                                                                                <td>% Realisasi</td>
                                                                                <td>:</td>
                                                                                <td id="estiPersenRealisasi"></td>
                                                                                <input type="hidden" name="persenspdm" id="estiPersenRealisasinumber">
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
        </section>
        <!-- Compact End -->
        <!-- Responsive Tabs Start -->
        <section class="scroll-section mt-4" id="responsiveTabs">
            <h2 class="small-title">Evaluasi PIC</h2>
            <div class="card mb-3">
                <div class="card-header border-0 pb-0">
                    <ul class="nav nav-tabs nav-tabs-line card-header-tabs responsive-tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#first" role="tab" type="button" aria-selected="true">
                                Catatan & Rekomendasi PIC
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#second" role="tab" type="button" aria-selected="false">Pemeriksa</button>
                        </li>

                        <!-- An empty list to put overflowed links -->
                        <li class="nav-item dropdown ms-auto pe-0 d-none responsive-tab-dropdown">
                            <button class="btn btn-icon btn-icon-only btn-foreground mt-2" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-acorn-icon="more-horizontal"></i>
                            </button>
                            <ul class="dropdown-menu mt-2 dropdown-menu-end"></ul>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="first" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                    <label for="inputCity" class="form-label">Rekomendasi</label>
                                    <select id="select2Basic9" onkeyup="kapital()" name="hasil_evaluasi_1" class="w-100" required>
                                        <option label="&nbsp;"></option>
                                        <option value="1">Dapat ditindaklanjuti</option>
                                        <option value="0">Belum dapat ditindaklanjuti</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-8">
                                    <label for="inputCity" class="form-label">Catatan Evaluasi</label>
                                    <div class="editor-container">
                                        <!-- <div class="html-editor sh-19" id="quillEditor"></div> -->
                                        <textarea type="text" class="form-control" id="" name="catatan_1" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="second" role="tabpanel">
                            <label for="inputCity" class="form-label">Pemeriksa 1</label>
                            <select id="select2Basic10" onkeyup="kapital()" name="pemeriksa_1" class="w-100 mb-3" required>
                                <option label="&nbsp;"></option>
                                <option value="8409394Z">ANDRISA</option>
                                <option value="8508381Z">DIAH DAYANTI</option>
                            </select>
                            <br>
                            <label for="inputCity" class="form-label">Pemeriksa 2</label>
                            <select id="select2Basic11" onkeyup="kapital()" name="pemeriksa_2" class="w-100" required>
                                <option label="&nbsp;"></option>
                                <option value="8108241Z">GREGORIUS HELMY WIDYAPAMUNGKAS</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-secondary me-md-2" type="submit" name="draft">Simpan Draft</button>
                        <button class="btn btn-primary" id="tombolKirimEval" type="submit" name="kirim">Kirim</button>
                    </div>
                </div>
            </div>
            <!-- Responsive Tabs End -->
    </form>
</section>
<!-- Form Row End -->
<!-- Modal  Launch Xxlarge1-->
<div class="modal fade" id="semiFullExample" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Dasar Mutasi </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= site_url('career/adddm') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="inputPassword4" class="form-label">Jenis</label>
                            <div class="input-group">
                                <select name="jenis_dm" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon" required>
                                    <option selected>Choose...</option>
                                    <option value="1">Nota Dinas</option>
                                    <option value="2">Surat</option>
                                    <option value="3">Evaluasi Burnout</option>
                                    <option value="4">Evaluasi Manajemen</option>
                                    <option value="5">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="inputPassword4" class="form-label">Tanggal Dasar Mutasi</label>
                            <input name="tgl_dm" class="form-control" id="datePickerFormat" required />
                        </div>
                        <div class="col-md-4">
                            <label for="inputAddress2" class="form-label">Tanggal Disposisi</label>
                            <input name="tgl_dispo_dm" class="form-control" id="datePickerLocale" required />
                        </div>
                        <div class="col-md-4">
                            <label for="inputAddress2" class="form-label mt-2">Nomor Dasar Mutasi</label>
                            <input name="no_dm" type="text" class="form-control" required />
                        </div>
                        <div class="col-md-8">
                            <label for="inputAddress2" class="form-label mt-2">Perihal</label>
                            <input name="perihal_dm" type="text" class="form-control" required />
                        </div>
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label mt-2">Dari</label>
                            <select class="form-select" id="" name="asal_dm" aria-label="" required>
                                <option label="&nbsp;"></option>
                                <?php foreach ($sj as $key => $value) : ?>
                                    <option value="<?= $value->nama_sj ?>"><?= $value->nama_sj ?></option>
                                <?php endforeach; ?>
                            </select>
                            <!-- <input name="asal_dm" type="text" class="form-control" /> -->
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress2" class="form-label mt-2">Kepada</label>
                            <select class="form-select" id="" name="tujuan_dm" aria-label="" required>
                                <option label="&nbsp;"></option>
                                <option value="EVP HTD">EVP HTD</option>
                                <option value="VP Bang TLN Korporat">VP Bang TLN Korporat</option>
                            </select>
                            <!-- <input name="tujuan_dm" type="text" class="form-control" /> -->
                        </div>
                        <div class="col-md-12">
                            <label for="inputAddress2" class="form-label mt-2">Jumlah Usulan/Kebutuhan</label>
                            <input name="jml_usulan" type="number" class="form-control" required />
                        </div>
                        <div class="col-md-12">
                            <label for="inputAddress2" class="form-label mt-2">Catatan</label>
                            <textarea class="form-control" name="catatan_dm" id="" rows="2"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="inputAddress2" class="form-label mt-2">Lampiran</label>
                            <input type="file" class="form-control" id="inputGroupFile01" name="lampiran_dm">
                        </div>
                        <span><small>*bila ada</small></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal  Launch Xxlarge2-->
<div class="modal fade" id="semiFullExample2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Dasar Mutasi </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="inputPassword4" class="form-label">Jenis</label>
                            <input class="form-control" id="jenis_dm_detail" readonly />
                        </div>
                        <div class="col-md-4">
                            <label for="inputPassword4" class="form-label">Tanggal Dasar Mutasi</label>
                            <input class="form-control" id="tgl_dm_detail" readonly />
                        </div>
                        <div class="col-md-4">
                            <label for="inputAddress2" class="form-label">Tanggal Disposisi</label>
                            <input class="form-control" id="tgl_dispo_dm_detail" readonly />
                        </div>
                        <div class="col-md-4">
                            <label for="inputAddress2" class="form-label mt-2">Nomor Dasar Mutasi</label>
                            <input type="text" class="form-control" id="no_dm" readonly />
                        </div>
                        <div class="col-md-8">
                            <label for="inputAddress2" class="form-label mt-2">Perihal</label>
                            <input type="text" class="form-control" id="perihal_dm" readonly />
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress2" class="form-label mt-2">Dari</label>
                            <input type="text" class="form-control" id="asal_dm" readonly />
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress2" class="form-label mt-2">Kepada</label>
                            <input type="text" class="form-control" id="tujuan_dm" readonly />
                        </div>
                        <div class="col-md-12">
                            <label for="inputAddress2" class="form-label mt-2">Catatan</label>
                            <textarea class="form-control" name="" id="catatan_dm" rows="2" readonly></textarea>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="inputAddress2" class="form-label mt-2">
                                <i data-cs-icon="attachment" class="icon" data-cs-size="15"></i>
                            </label>
                            <a href="" target="_blank" id="no_dm_link" rel="noopener noreferrer"></a>
                        </div>
                    </div>
                </div>
            </form>
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
<script src="<?= base_url() ?>/template/js/vendor/quill.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/quill.active.js"></script>

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
<script src="<?= base_url() ?>/template/js/forms/controls.datepicker.js"></script>
<script src="<?= base_url() ?>/template/js/cs/datatable.extend.js"></script>
<script src="<?= base_url() ?>/template/js/plugins/datatable.editablerows33.js"></script>
<script src="<?= base_url() ?>/template/js/components/spinners.js"></script>
<script src="<?= base_url() ?>/template/js/forms/controls.editor.js"></script>
<script src="<?= base_url() ?>/template/js/common.js"></script>
<script src="<?= base_url() ?>/template/js/scripts.js"></script>
<script src="<?= base_url() ?>/template/js/cs/dropzone.templates.js"></script>
<script src="<?= base_url() ?>/template/js/forms/controls.dropzone.js"></script>
<!-- Page Specific Scripts End -->

<script>
    $(document).ready(function() {

        $('#checkData').click(function() {
            if ($(this).is(':checked')) {
                $("#boxFooter").removeClass("d-none");
                $("#boxFooter").show(100);
            } else {
                $("#boxFooter").hide(100);
                $("#boxFooter").addClass("d-none");
            }
        });

        $('.proyeksi-unit').on('change', function() {
            const proyeksiUnit = $('.proyeksi-unit').val();
            if (proyeksiUnit != 1000) {
                $.ajax({
                    url: "<?= site_url('masterdata/get_org_dua/') ?>" + proyeksiUnit + "/" + 0,
                    dataType: "json",
                    success: function(res) {
                        $('#boxOrgDuaTujuan').removeClass('d-none');
                        $('#boxOrgDuaTujuan').show(100);
                        console.log('hasil query org dua :' + res);
                        $("#select2Basic14").html(res)
                    }
                })
            }
        })

        $('.divisi-tujuan').on('change', function() {
            const a = $('.divisi-tujuan').val();
            $.ajax({
                url: "<?= site_url('masterdata/get_bidang/') ?>" + a + "/" + 0,
                dataType: "json",
                success: function(res) {
                    $('#boxbidangkp').removeClass('d-none');
                    $('#boxbidangkp').show(100);
                    console.log('hasil query org dua :' + res);
                    $("#select2Basic15").html(res)
                }
            })
        })

        $('#select2Basic14').on('change', function() {
            const proyeksiUnitPelaksana = $('#select2Basic14').val();

            $.ajax({
                url: "<?= site_url('masterdata/get_org_tiga/') ?>" + proyeksiUnitPelaksana + "/" + 0,
                dataType: "json",
                success: function(res) {
                    $('#boxOrgTigaTujuan').removeClass('d-none');
                    $('#boxOrgTigaTujuan').show(100);
                    $("#select2Basic13").html(res)
                }
            })

        })

        $('.proyeksi-unit').on('change', function() {
            const proyeksiUnit = $('.proyeksi-unit').val();
            if (proyeksiUnit == 1000) {
                $('#boxDivTujuan').removeClass('d-none');
                $('#boxDivTujuan').show(100);

                // const collab1 = $('.for_collab').val();

            } else {
                $('#boxDivTujuan').hide(100);
                $('#boxDivTujuan').addClass('d-none');
                $.ajax({
                    url: "<?= site_url('career/get_ftk_unit/') ?>" + proyeksiUnit,
                    dataType: "json",
                    success: function(ftkunit) {
                        const ftkunitnya = (ftkunit[0]["real_total"] / ftkunit[0]["pagu_total"]) * 100;
                        const nama_unit = ftkunit[0]["tx_div"];
                        $("#realisasiFtkUnitTujuan").val(ftkunitnya.toFixed(2) + "%");
                        $("#realisasiFtkUnitTujuan2").val(ftkunitnya.toFixed(2));

                        $.ajax({
                            url: "<?= site_url('career/get_jml_eval/') ?>" + proyeksiUnit,
                            dataType: "json",
                            success: function(estimasi) {
                                const estitambah = parseInt(estimasi);
                                const real = parseInt(ftkunit[0]["real_total"]);
                                const pagu = parseInt(ftkunit[0]["pagu_total"]);
                                const real2 = (real + estitambah);
                                const ftkestimasi = (real2 / pagu) * 100;
                                $("#estimasiFtkTujuan").val(ftkestimasi.toFixed(2) + "%");
                            }
                        })
                    }

                })
                // const collab1 = $('.for_collab').val();
                // $('.for_collab').val(collab1 + ' & ' + proyeksiUnit);
            }


        })

        $('.divisi-tujuan').on('change', function() {
            const divTujuan = $('.divisi-tujuan').val();
            $.ajax({
                url: "<?= site_url('career/get_ftk_div/') ?>" + divTujuan,
                dataType: "json",
                success: function(ftkdivtj) {
                    const ftkdivnya = (ftkdivtj[0]["real_total"] / ftkdivtj[0]["pagu_total"]) * 100;
                    $("#realisasiFtkUnitTujuan").val(ftkdivnya.toFixed(2) + "%")
                    $("#realisasiFtkUnitTujuan2").val(ftkdivnya.toFixed(2))

                    $.ajax({
                        url: "<?= site_url('career/get_jml_eval/') ?>" + divTujuan,
                        dataType: "json",
                        success: function(estimasi) {
                            const estitambah = parseInt(estimasi);
                            const real = parseInt(ftkdivtj[0]["real_total"]);
                            const pagu = parseInt(ftkdivtj[0]["pagu_total"]);
                            const real2 = (real + estitambah);
                            const ftkestimasi = (real2 / pagu) * 100;
                            $("#estimasiFtkTujuan").val(ftkestimasi.toFixed(2) + "%");
                        }
                    })
                }

            })
        })

        $('#pogBaru').on('change', function() {
            const pogBaru = $('#pogBaru').val();
            $('#pogJabBaruView').val(pogBaru)
        })




    });

    $('.noDasarMutasi').on('change', function() {
        const idDm = $('.noDasarMutasi').val();
        $.ajax({
            url: "<?= site_url('career/get_jenis_dm/') ?>" + idDm,
            dataType: "json",
            success: function(res) {
                $('#jenis_dm').val(res[0]["asal_dm"])
                if (res[0]["jenis_dm"] == 1) {
                    $("#jenis_dm_detail").val("Nota Dinas")
                }
                if (res[0]["jenis_dm"] == 2) {
                    $("#jenis_dm_detail").val("Surat")
                }
                if (res[0]["jenis_dm"] == 3) {
                    $("#jenis_dm_detail").val("Evaluasi Burnout")
                }
                if (res[0]["jenis_dm"] == 4) {
                    $("#jenis_dm_detail").val("Evaluasi Manajemen")
                }
                if (res[0]["jenis_dm"] == 5) {
                    $("#jenis_dm_detail").val("Lainnya")
                }
                $("#tgl_dm").val(res[0]["tgl_dm"])
                $("#tgl_dm_detail").val(res[0]["tgl_dm"])
                $("#tgl_dispo_dm").val(res[0]["tgl_dispo_dm"])
                $("#tgl_dispo_dm_detail").val(res[0]["tgl_dispo_dm"])
                $("#no_dm").val(res[0]["no_dm"])
                $("#idDasarMutasi").val(res[0]["id_dm"])
                $("#no_dasar_mutasi").val(res[0]["no_dm"])
                $("#perihal_dm").val(res[0]["perihal_dm"])
                $("#asal_dm").val(res[0]["asal_dm"])
                $("#tujuan_dm").val(res[0]["tujuan_dm"])
                $("#catatan_dm").val(res[0]["catatan_dm"])
                $("#no_dm_link").attr("href", "<?= base_url("template/files/dm/") ?>" + "/" + res[0]["lampiran_dm"])
                $("#no_dm_link").text(res[0]["lampiran_dm"])

            }
        })
    });

    $('.nipToEval').on('change', function() {
        const nip = $('.nipToEval').val();
        $.ajax({
            url: "<?= site_url('career/get_dapeg/') ?>" + nip,
            dataType: "json",
            success: function(res) {


                const tglm_posi = new Date(res[0]["tglm_posisi"])
                var date = new Date();
                var tahun = date.getFullYear();
                var bulan = date.getMonth();
                var tanggal = date.getDate();
                var hari = date.getDay();
                var jam = date.getHours();
                var menit = date.getMinutes();
                var detik = date.getSeconds();
                switch (hari) {
                    case 0:
                        hari = "Minggu";
                        break;
                    case 1:
                        hari = "Senin";
                        break;
                    case 2:
                        hari = "Selasa";
                        break;
                    case 3:
                        hari = "Rabu";
                        break;
                    case 4:
                        hari = "Kamis";
                        break;
                    case 5:
                        hari = "Jum'at";
                        break;
                    case 6:
                        hari = "Sabtu";
                        break;
                }
                switch (bulan) {
                    case 0:
                        bulan = "01";
                        break;
                    case 1:
                        bulan = "02";
                        break;
                    case 2:
                        bulan = "03";
                        break;
                    case 3:
                        bulan = "04";
                        break;
                    case 4:
                        bulan = "05";
                        break;
                    case 5:
                        bulan = "06";
                        break;
                    case 6:
                        bulan = "07";
                        break;
                    case 7:
                        bulan = "08";
                        break;
                    case 8:
                        bulan = "09";
                        break;
                    case 9:
                        bulan = "10";
                        break;
                    case 10:
                        bulan = "11";
                        break;
                    case 11:
                        bulan = "12";
                        break;
                }
                var tgl_today = tahun + "-" + bulan + "-" + tanggal;
                // const tgl_today = new Date("<?= date("Y-m-d"); ?>")
                console.log(tgl_today);

                function hitungdurasitahun(a, b) {
                    const tglm_posi = new Date(a)
                    const tgl_today = new Date(b)
                    const durasi_milidetik = tgl_today.getTime() - tglm_posi.getTime();
                    //durasi dalam bulan
                    const sisa_durasi_dlm_bulan = durasi_milidetik % (1000 * 3600 * 24 * 31);
                    const durasi_dlm_bulan = (durasi_milidetik - sisa_durasi_dlm_bulan) / (1000 * 3600 * 24 * 31);
                    //durasi dalam tahun
                    const sisa_durasi_dlm_tahun = durasi_dlm_bulan % 12;
                    const durasi_dlm_tahun = (durasi_dlm_bulan - sisa_durasi_dlm_tahun) / 12;
                    return durasi_dlm_tahun
                }

                function hitungdurasibulan(a, b) {
                    const tglm_posi = new Date(a)
                    const tgl_today = new Date(b)
                    const durasi_milidetik = tgl_today.getTime() - tglm_posi.getTime();
                    //durasi dalam bulan
                    const sisa_durasi_dlm_bulan = durasi_milidetik % (1000 * 3600 * 24 * 31); //dalam milidetik
                    const durasi_dlm_bulan = (durasi_milidetik - sisa_durasi_dlm_bulan) / (1000 * 3600 * 24 * 31); //dalam bulan
                    //durasi dalam tahun
                    const sisa_durasi_dlm_tahun = durasi_dlm_bulan % 12;
                    const durasi_dlm_tahun = (durasi_dlm_bulan - sisa_durasi_dlm_tahun) / 12;
                    return sisa_durasi_dlm_tahun;
                }

                function durasidalambulan(a, b) {
                    const tglm_posi = new Date(a)
                    const tgl_today = new Date(b)
                    const durasi_milidetik = tgl_today.getTime() - tglm_posi.getTime();
                    //durasi dalam bulan
                    const sisa_durasi_dlm_bulan = durasi_milidetik % (1000 * 3600 * 24 * 31);
                    const durasi_dlm_bulan = (durasi_milidetik - sisa_durasi_dlm_bulan) / (1000 * 3600 * 24 * 31);
                    //durasi dalam tahun
                    const sisa_durasi_dlm_tahun = durasi_dlm_bulan % 12;
                    const durasi_dlm_tahun = (durasi_dlm_bulan - sisa_durasi_dlm_tahun) / 12;
                    return durasi_dlm_bulan
                }
                const ftkUnitAsal = (res[0]["real_total"] / res[0]["pagu_total"]) * 100;


                $("#nipEval").val(res[0]["nip"])
                $("#kodeOrgUnit").val(res[0]["kode_org_unit"])
                $("#jabatanLengkap").val(res[0]["jabatan_lengkap"])
                $("#namaEval").val(res[0]["nama_user"])
                $("#pegEval").val(res[0]["grade"])
                $("#jabatanSaatIni").val(res[0]["sebutan_jabatan"])
                $("#pogSaatIni").val(res[0]["pog"])
                $("#jenjabEval").val(res[0]["tx_grpjab"])
                $("#jenjabEval2").val(res[0]["jenjab"])
                $("#tgljabtrk").val(res[0]["tglm_posisi"])
                $("#masaJabatanTerakhir").val(hitungdurasitahun(res[0]["tglm_posisi"], tgl_today) + " tahun " + hitungdurasibulan(res[0]["tglm_posisi"], "<?= date("Y-m-d"); ?>") + " bulan")
                $("#masaJabatanTerakhir2").val(durasidalambulan(res[0]["tglm_posisi"], tgl_today))
                $("#masaKerja").val(hitungdurasitahun(res[0]["tgl_peg_tetap"], tgl_today) + " tahun " + hitungdurasibulan(res[0]["tgl_peg_tetap"], "<?= date("Y-m-d"); ?>") + " bulan")
                $("#masaKerja2").val(durasidalambulan(res[0]["tgl_peg_tetap"], tgl_today))
                $('#boxTglPegTtp').val(res[0]["tgl_peg_tetap"]);
                if (res[0]["nama_org_satu"] == "Kantor Pusat") {
                    $("#unitAsal").val(res[0]["tx_org_05"])
                    $("#unitPelaksana1").val(res[0]["tx_org_06"])
                    $("#subUnitPelaksana1").val(res[0]["tx_org_07"])
                    $("#kodeUnitAsal").val(res[0]["unit_induk"])

                    $('.for_collab').val('Kantor Pusat')
                } else {
                    $("#unitAsal").val(res[0]["nama_org_satu"])
                    $("#unitPelaksana1").val(res[0]["nama_org_dua"])
                    $("#subUnitPelaksana1").val(res[0]["nama_org_tiga"])
                    $("#kodeUnitAsal").val(res[0]["unit_induk"])
                    $('.for_collab').val(res[0]["nama_org_htd"])
                }

                if (res[0]["nama_org_satu"] == "Kantor Pusat") {
                    const div = res[0]["tx_org_05"];
                    $.ajax({
                        url: "<?= site_url('career/get_ftk_div/') ?>" + div,
                        dataType: "json",
                        success: function(ftkdiv) {
                            const ftknya = (ftkdiv[0]["real_total"] / ftkdiv[0]["pagu_total"]) * 100;
                            $("#realisasiFtkUnitAsal").val(ftknya.toFixed(2) + "%")
                            $("#realisasiFtkUnitAsal2").val(ftknya.toFixed(2))
                        }

                    })
                } else {
                    $("#realisasiFtkUnitAsal").val(ftkUnitAsal.toFixed(2) + "%")
                    $("#realisasiFtkUnitAsal2").val(ftkUnitAsal.toFixed(2))
                }
                $("#pendidikan").val(res[0]["jn_pddkakh"])
                $("#statusPerkawinan").val(res[0]["status_perkawinan"])
                if (res[0]["pap"] == null) {
                    $("#statusPasangan").val("Bukan pegawai PLN")
                } else {
                    $("#statusPasangan").val(res[0]["pap"])
                }
                if (res[0]["hukdis"] == null) {
                    $("#statusHukdis").val("-")
                } else {
                    $("#statusHukdis").val(res[0]["hukdis"] + " / " + res[0]["tgl_selesai_hukdis"])
                }
                $("#kotaLahir").val(res[0]["tempat_lahir"])
                $("#kotaRumah").val(res[0]["kota_alamat"])
            }
        })
    });

    $('.nipToEval').on('change', function() {
        const nip = $('.nipToEval').val();
        $.ajax({
            url: "<?= site_url('career/get_ftk/123') ?>",
            dataType: "json",
            success: function(res) {
                const ftkNasional = (res[0]["real_total"] / res[0]["pagu_total"]) * 100;
                const ftkAcuan = 95;
                $("#realFtkNasional").val(ftkNasional.toFixed(2) + "%")
                $("#realFtkNasional2").val(ftkNasional.toFixed(2))
                $("#realFtkAcuan").val(ftkAcuan.toFixed(2) + "%")
            }
        })
    });

    $('.proyeksi-unit').on('change', function() {
        const unit1 = $('#subUnitPelaksana1').val();
        const unit2 = $('.proyeksi-unit').val();
        $('#textJarak').text(unit1 + ' ke ' + unit2)
    });


    $('#jarakUnit').on('change', function() {
        const unit1 = $('#subUnitPelaksana1').val();
        const unit2 = $('.proyeksi-unit').val();
        $('#textJarak').text(unit1 + ' ke ' + unit2)
    });



    function cekisian() {
        const pemeriksa = $('#select2Basic10').val()
        const pemeriksa2 = $('#select2Basic11').val()
        const rekomendasi = $('#select2Basic9').val()

        if (pemeriksa == '' && rekomendasi == '' && pemeriksa2 == '') {
            // alert
            alert('mohon lengkapi isian rekomendasi & pemeriksa')

        } else {

        }
    }

    $('.btn-eval-kriteria').on('click', function() {
        // evaluasi PeG-PoG
        const PeG = $('#pegEval').val().slice(0, 2);
        const PoG = $('#pogJabBaruView').val().slice(0, 2);

        const ftkAsal = $('#realisasiFtkUnitAsal2').val();
        const ftkTujuan = $('#realisasiFtkUnitTujuan2').val();
        const ftkNas = $('#realFtkNasional2').val();
        const rataFtkNas = 95;

        const MasaKerjaBulanEval = $('#masaKerja2').val();
        const masaJabatanTerakhirEval = $('#masaJabatanTerakhir2').val();
        const jenjabEval = $('#jenjabEval2').val();

        const profesiSaatIni = $('#select2Basic4').val();
        const profesiSaatTujuan = $('#select2Basic5').val();
        const statusPAP = $('#statusPasangan').val();
        const nipEval = $('#nipEval').val();
        const kodeRekan = $('#kodeOrgUnit').val();
        const kodeRekanTujuan = $('#kodeOrgTujuan').val();
        const unitAsal = $('#kodeUnitAsal').val();

        $.ajax({
            url: "<?= site_url('career/get_rekan/') ?>" + kodeRekan + "/" + jenjabEval + "/" + nipEval,
            dataType: "json",
            success: function(res) {
                $('#boxDataRekan').removeClass('d-none');
                $('#boxDataRekan').show(100);
                $("#boxDataRekan").html(res)
            }
        })

        $.ajax({
            url: "<?= site_url('career/get_rekan_tujuan/') ?>" + kodeRekanTujuan,
            dataType: "json",
            success: function(res) {
                $('#boxDataRekanTujuan').removeClass('d-none');
                $('#boxDataRekanTujuan').show(100);
                $("#boxDataRekanTujuan").html(res)
            }
        })



        $.ajax({
            url: "<?= site_url('career/get_rekan_count/') ?>" + kodeRekan + "/" + jenjabEval,
            dataType: "json",
            success: function(res) {
                const jmlrekan = res - 1;

                if (jmlrekan >= 1) {
                    $('#textRekan').text(jmlrekan);
                    $('#textRekan').removeClass('d-none');
                    $('#textRekan').show(100);
                    $('#notifRekan').text('Ok');
                    $('#notifRekan2').val('Ok');
                    $('#textRekan2').val(jmlrekan);
                    $('#notifRekan').removeClass('d-none');
                    $('#notifRekan').removeClass('bg-danger');
                    $('#notifRekan').addClass('bg-info');
                    $('#notifRekan').show(100);
                } else {
                    $('#textRekan').text(jmlrekan);
                    $('#textRekan').removeClass('d-none');
                    $('#textRekan').show(100);
                    $('#notifRekan').text('Cek');
                    $('#notifRekan2').val('Cek');
                    $('#notifRekan').removeClass('d-none');
                    $('#notifRekan').removeClass('bg-danger');
                    $('#notifRekan').addClass('bg-info');
                    $('#notifRekan').show(100);
                }

            }
        })

        const bulannow = new Date().getMonth();
        const tahunnow = new Date().getFullYear();
        console.log(bulannow)
        console.log(tahunnow)


        $.ajax({
            url: "<?= site_url('career/get_realisasi_spdm/') ?>" + unitAsal + "/" + bulannow + "/" + tahunnow,
            dataType: "json",
            success: function(res) {
                var realspdm = formatNumber(res[0]['rp_realisasi']);
                $('#estiSppdUnit').text('Rp ' + realspdm);
                $('#realspdmnumber').val(res[0]['rp_realisasi']);
            }
        })

        $.ajax({
            url: "<?= site_url('career/get_pagu_spdm/') ?>" + unitAsal + "/" + tahunnow,
            dataType: "json",
            success: function(res) {
                var realspdm = formatNumber(res[0]['rp_pagu']);
                $('#paguSppdmutasi').text('Rp ' + realspdm);
                $('#paguspdmnumber').val(res[0]['rp_pagu']);
            }
        })

        $.ajax({
            url: "<?= site_url('career/get_persen_spdm/') ?>" + unitAsal + "/" + bulannow + "/" + tahunnow,
            dataType: "json",
            success: function(res) {
                const data = res * 100;
                $('#estiPersenRealisasi').text(data.toFixed(2) + "%");
                $('#estiPersenRealisasinumber').val(data.toFixed(2));
            }
        })

        $.ajax({
            url: "<?= site_url('career/get_rekan_tujuan_count/') ?>" + kodeRekanTujuan,
            dataType: "json",
            success: function jmlrekantujuan(res) {
                const contentBefore = $('#textRekan').text();
                console.log(contentBefore);
                const contentAfter = $('#textRekan').text(contentBefore + ' : ' + res);
                $('#textRekan3').val(res);
            }
        })

        $.ajax({
            url: "<?= site_url('career/get_sp/') ?>" + nipEval,
            dataType: "json",
            success: function(res) {


                if (res[0]['nip_pengsp'] == null) {
                    // bukan pengurus sp
                    $('#notifSP').text('Bkn');
                    $('#notifSP2').val('Bkn');
                    $('#notifSP').removeClass('d-none');
                    $('#notifSP').removeClass('bg-danger');
                    $('#notifSP').addClass('bg-info');
                    $('#notifSP').show(100);
                    $('#textSP').text('Bukan Pengurus');
                    $('#textSP2').val('Bukan Pengurus');
                    $('#textSP').removeClass('d-none');
                    $('#textSP').show(100);
                    $('#iljabatanSP').text('-');
                    $('#iljabatanSP2').val('-');
                    $('#ilunitSP').text('-');
                    $('#ilunitSP2').val('-');
                    $('#ilorgSP').text('-');
                    $('#ilorgSP2').val('-');
                } else {
                    const jabatanSP = res[0]['jabatan_sp'];
                    const unitSP = res[0]['unit_sp'];
                    const orgSP = res[0]['org_sp'];

                    $('#notifSP').text('Iya');
                    $('#notifSP2').val('Iya');
                    $('#notifSP').removeClass('d-none');
                    $('#notifSP').removeClass('bg-info');
                    $('#notifSP').addClass('bg-danger');
                    $('#notifSP').show(100);
                    $('#textSP').text('Pengurus SP');
                    $('#textSP2').val('Pengurus SP');
                    $('#textSP').removeClass('d-none');
                    $('#textSP').show(100);
                    $('#iljabatanSP').text(jabatanSP);
                    $('#iljabatanSP2').val(jabatanSP);
                    $('#ilunitSP').text(unitSP);
                    $('#ilunitSP2').val(unitSP);
                    $('#ilorgSP').text(orgSP);
                    $('#ilorgSP2').val(orgSP);
                }

            }
        })

        if (statusPAP == 'Bukan pegawai PLN') {
            $('#notifPAP').text('Ok');
            $('#notifPAP2').val('Ok');
            $('#notifPAP').removeClass('d-none');
            $('#notifPAP').removeClass('bg-danger');
            $('#notifPAP').addClass('bg-info');
            $('#notifPAP').show(100);
            $('#textPAP').text('Memenuhi');
            $('#textPAP2').val('Memenuhi');
            $('#textPAP').removeClass('d-none');
            $('#textPAP').show(100);
            $('#ilNamaPAP').text('-');
            $('#ilNamaPAP2').val('-');
            $('#ilnipPAP').text('-');
            $('#ilnipPAP2').val('-');
            $('#ilunitPAP').text('-');
            $('#ilunitPAP2').val('-');
            $('#ilunitPelaksanaPAP').text('-');
            $('#ilunitPelaksanaPAP2').val('-');
            $('#ilsubunitPelaksanaPAP').text('-');
            $('#ilsubunitPelaksanaPAP2').val('-');
            $('#ilketPAP').text('-');
            $('#ilketPAP2').text('-');
        } else {
            $.ajax({
                url: "<?= site_url('career/get_pap/') ?>" + nipEval,
                dataType: "json",
                success: function(res) {
                    const idPasangan = res[0]["id_pasangan"];
                    $.ajax({
                        url: "<?= site_url('career/get_dapeg/') ?>" + idPasangan,
                        dataType: "json",
                        success: function(res) {
                            const unitIndukPasangan = res[0]["unit_induk"];
                            const unitPelaksanaPasangan = res[0]["unit_pelaksana"];
                            const subunitPelaksanaPasangan = res[0]["sub_unit_pelaksana"];
                            const namaunitIndukPasangan = res[0]["nama_org_satu"];
                            const namaunitPelaksanaPasangan = res[0]["nama_org_dua"];
                            const namasubunitPelaksanaPasangan = res[0]["nama_org_tiga"];
                            const namaPasangan = res[0]["nama_user"];
                            const nipPasangan = res[0]["nip"];
                            const divPasangan = res[0]["tx_org_05"];
                            const unitTujuanPegawai = $('#select2Basic2').val();
                            const unitPelaksanaTujuanPegawai = $('#select2Basic14').val();
                            const subunitPelaksanaTujuanPegawai = $('#select2Basic13').val();

                            if (unitTujuanPegawai == 1000) {
                                const divTujuanPegawai = $('#select2Basic3').val();
                                if (divTujuanPegawai == divPasangan) {
                                    // tidak memenuhi
                                    $('#notifPAP').text('not');
                                    $('#notifPAP2').val('not');
                                    $('#notifPAP').removeClass('d-none');
                                    $('#notifPAP').removeClass('bg-info');
                                    $('#notifPAP').addClass('bg-danger');
                                    $('#notifPAP').show(100);
                                    $('#textPAP').text('Tdk Memenuhi');
                                    $('#textPAP2').val('Tdk Memenuhi');
                                    $('#textPAP').removeClass('d-none');
                                    $('#textPAP').show(100);
                                    $('#ilNamaPAP').text(namaPasangan);
                                    $('#ilNamaPAP2').val(namaPasangan);
                                    $('#ilnipPAP').text(nipPasangan);
                                    $('#ilnipPAP2').val(nipPasangan);
                                    $('#ilunitPAP').text(divPasangan);
                                    $('#ilunitPAP2').val(divPasangan);
                                    $('#ilunitPelaksanaPAP').text(namaunitPelaksanaPasangan);
                                    $('#ilunitPelaksanaPAP2').val(namaunitPelaksanaPasangan);
                                    $('#ilsubunitPelaksanaPAP').text(namasubunitPelaksanaPasangan);
                                    $('#ilsubunitPelaksanaPAP2').val(namasubunitPelaksanaPasangan);
                                    $('#ilketPAP').text('Pasangan terdapat pada Divisi yang sama');
                                    $('#ilketPAP2').val('Pasangan terdapat pada Divisi yang sama');
                                } else {
                                    // memenuhi
                                    $('#notifPAP').text('Ok');
                                    $('#notifPAP2').val('Ok');
                                    $('#notifPAP').removeClass('d-none');
                                    $('#notifPAP').removeClass('bg-danger');
                                    $('#notifPAP').addClass('bg-info');
                                    $('#notifPAP').show(100);
                                    $('#textPAP').text('Memenuhi');
                                    $('#textPAP2').val('Memenuhi');
                                    $('#textPAP').removeClass('d-none');
                                    $('#textPAP').show(100);
                                    $('#ilNamaPAP').text(namaPasangan);
                                    $('#ilNamaPAP2').val(namaPasangan);
                                    $('#ilnipPAP').text(nipPasangan);
                                    $('#ilnipPAP2').val(nipPasangan);
                                    $('#ilunitPAP').text(divPasangan);
                                    $('#ilunitPAP2').val(divPasangan);
                                    $('#ilunitPelaksanaPAP').text(namaunitPelaksanaPasangan);
                                    $('#ilunitPelaksanaPAP2').val(namaunitPelaksanaPasangan);
                                    $('#ilsubunitPelaksanaPAP').text(namasubunitPelaksanaPasangan);
                                    $('#ilsubunitPelaksanaPAP2').val(namasubunitPelaksanaPasangan);
                                    $('#ilketPAP').text('-');
                                    $('#ilketPAP2').text('-');
                                }
                            } else {
                                if (unitIndukPasangan == unitTujuanPegawai && unitPelaksanaTujuanPegawai == unitPelaksanaPasangan && subunitPelaksanaTujuanPegawai == subunitPelaksanaPasangan) {
                                    // tidak memenuhi
                                    $('#notifPAP').text('not');
                                    $('#notifPAP2').val('not');
                                    $('#notifPAP').removeClass('d-none');
                                    $('#notifPAP').removeClass('bg-info');
                                    $('#notifPAP').addClass('bg-danger');
                                    $('#notifPAP').show(100);
                                    $('#textPAP').text('Tdk Memenuhi');
                                    $('#textPAP2').val('Tdk Memenuhi');
                                    $('#textPAP').removeClass('d-none');
                                    $('#textPAP').show(100);
                                    $('#ilNamaPAP').text(namaPasangan);
                                    $('#ilNamaPAP2').val(namaPasangan);
                                    $('#ilnipPAP').text(nipPasangan);
                                    $('#ilnipPAP2').val(nipPasangan);
                                    $('#ilunitPAP').text(divPasangan);
                                    $('#ilunitPAP2').val(divPasangan);
                                    $('#ilunitPelaksanaPAP').text(namaunitPelaksanaPasangan);
                                    $('#ilunitPelaksanaPAP2').val(namaunitPelaksanaPasangan);
                                    $('#ilsubunitPelaksanaPAP').text(namasubunitPelaksanaPasangan);
                                    $('#ilsubunitPelaksanaPAP2').val(namasubunitPelaksanaPasangan);
                                    $('#ilketPAP').text('Pasangan terdapat pada Divisi yang sama');
                                    $('#ilketPAP2').val('Pasangan terdapat pada Divisi yang sama');
                                } else {
                                    // memenuhi
                                    $('#notifPAP').text('Ok');
                                    $('#notifPAP2').val('Ok');
                                    $('#notifPAP').removeClass('d-none');
                                    $('#notifPAP').removeClass('bg-danger');
                                    $('#notifPAP').addClass('bg-info');
                                    $('#notifPAP').show(100);
                                    $('#textPAP').text('Memenuhi');
                                    $('#textPAP2').val('Memenuhi');
                                    $('#textPAP').removeClass('d-none');
                                    $('#textPAP').show(100);
                                    $('#ilNamaPAP').text(namaPasangan);
                                    $('#ilNamaPAP2').val(namaPasangan);
                                    $('#ilnipPAP').text(nipPasangan);
                                    $('#ilnipPAP2').val(nipPasangan);
                                    $('#ilunitPAP').text(divPasangan);
                                    $('#ilunitPAP2').val(divPasangan);
                                    $('#ilunitPelaksanaPAP').text(namaunitPelaksanaPasangan);
                                    $('#ilunitPelaksanaPAP2').val(namaunitPelaksanaPasangan);
                                    $('#ilsubunitPelaksanaPAP').text(namasubunitPelaksanaPasangan);
                                    $('#ilsubunitPelaksanaPAP2').val(namasubunitPelaksanaPasangan);
                                    $('#ilketPAP').text('-');
                                    $('#ilketPAP2').text('-');
                                }
                            }

                        }
                    })

                }
            })
        }

        // mulai tampil tanggal
        var date = new Date();
        var tahun = date.getFullYear();
        var bulan = date.getMonth();
        var tanggal = date.getDate();
        var hari = date.getDay();
        var jam = date.getHours();
        var menit = date.getMinutes();
        var detik = date.getSeconds();
        switch (hari) {
            case 0:
                hari = "Minggu";
                break;
            case 1:
                hari = "Senin";
                break;
            case 2:
                hari = "Selasa";
                break;
            case 3:
                hari = "Rabu";
                break;
            case 4:
                hari = "Kamis";
                break;
            case 5:
                hari = "Jum'at";
                break;
            case 6:
                hari = "Sabtu";
                break;
        }
        switch (bulan) {
            case 0:
                bulan = "01";
                break;
            case 1:
                bulan = "02";
                break;
            case 2:
                bulan = "03";
                break;
            case 3:
                bulan = "04";
                break;
            case 4:
                bulan = "05";
                break;
            case 5:
                bulan = "06";
                break;
            case 6:
                bulan = "07";
                break;
            case 7:
                bulan = "08";
                break;
            case 8:
                bulan = "09";
                break;
            case 9:
                bulan = "10";
                break;
            case 10:
                bulan = "11";
                break;
            case 11:
                bulan = "12";
                break;
        }
        if (tanggal < 10) {
            var tampilTanggal = tahun + "-" + bulan + "-" + "0" + tanggal;
        } else {
            var tampilTanggal = tahun + "-" + bulan + "-" + tanggal;
        }

        function categoryFtk(a, b) {
            if (a < b) {
                return 1
            } else if (a == b) {
                return 2
            } else if (a > b) {
                return 3
            }
            // a = ftk unit asal atau tujuan
            // b = rata-rata ftk nasional (95%)
        }

        const categoryFtkAsal = categoryFtk(ftkAsal, rataFtkNas);
        const categoryFtkTujuan = categoryFtk(ftkTujuan, rataFtkNas);
        console.log('ftk asal : ' + categoryFtkAsal)
        console.log('ftk tujuan : ' + categoryFtkTujuan)
        const iljenisMutasi = $('#select2Basic8').val();

        if (iljenisMutasi == 1) {
            $('#ilJenisMutasi').text("Lolos Butuh")
        } else if (iljenisMutasi == 2) {
            $('#ilJenisMutasi').text("APS")
        } else if (iljenisMutasi == 3) {
            $('#ilJenisMutasi').text("Bursa")
        } else if (iljenisMutasi == 4) {
            $('#ilJenisMutasi').text("Rotasi Internal Divisi")
        } else if (iljenisMutasi == 5) {
            $('#ilJenisMutasi').text("Berangkat PTB")
        } else if (iljenisMutasi == 6) {
            $('#ilJenisMutasi').text("Kembali PTB")
        } else if (iljenisMutasi == 7) {
            $('#ilJenisMutasi').text("Promosi")
        } else if (iljenisMutasi == 8) {
            $('#ilJenisMutasi').text("Demosi")
        }

        // Risiko kecil = Memenuhi
        $('#notifProfesi').text('Ok');
        $('#notifProfesi').removeClass('d-none');
        $('#notifProfesi').removeClass('bg-danger');
        $('#notifProfesi').addClass('bg-info');
        $('#notifProfesi').show(100);
        $('#textProfesi').text('Memenuhi');
        $('#textProfesi').removeClass('d-none');
        $('#textProfesi').show(100);
        $('#ilProfesiSkrg').text($('#select2Basic4').val());
        $('#ilProfesiTujuan').text($('#select2Basic5').val());
        $('#ilPetaRisk').text('Risiko Rendah');
        $('#notifProfesi2').val('Ok');
        $('#textProfesi2').val('Memenuhi');
        $('#ilPetaRisk2').val('Risiko Rendah');

        // Risiko Sedang = Memenuhi
        $('#notifProfesi').text('Ok');
        $('#notifProfesi').removeClass('d-none');
        $('#notifProfesi').removeClass('bg-danger');
        $('#notifProfesi').addClass('bg-info');
        $('#notifProfesi').show(100);
        $('#textProfesi').text('Memenuhi');
        $('#textProfesi').removeClass('d-none');
        $('#textProfesi').show(100);
        $('#ilProfesiSkrg').text($('#select2Basic4').val());
        $('#ilProfesiTujuan').text($('#select2Basic5').val());
        $('#ilPetaRisk').text('Risiko Sedang');
        $('#notifProfesi2').val('Ok');
        $('#textProfesi2').val('Memenuhi');
        $('#ilPetaRisk2').val('Risiko Sedang');

        // Risiko Tinggi = Tdk Memenuhi
        $('#notifProfesi').text('Not');
        $('#notifProfesi').removeClass('d-none');
        $('#notifProfesi').removeClass('bg-info');
        $('#notifProfesi').addClass('bg-danger');
        $('#notifProfesi').show(100);
        $('#textProfesi').text('Tdk Memenuhi');
        $('#textProfesi').removeClass('d-none');
        $('#textProfesi').show(100);
        $('#ilProfesiSkrg').text($('#select2Basic4').val());
        $('#ilProfesiTujuan').text($('#select2Basic5').val());
        $('#ilPetaRisk').text('Risiko Tinggi');
        $('#notifProfesi2').val('Not');
        $('#textProfesi2').val('Tdk Memenuhi');
        $('#ilPetaRisk2').val('Risiko Tinggi');


        // mulai perhitungan kategori profesi
        if (profesiSaatIni == profesiSaatTujuan) {
            // Risiko Kecil
            // Risiko kecil = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Rendah');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Rendah');

        } else if (profesiSaatIni == 'Energi Primer' && profesiSaatTujuan == 'Pembangkit') {
            // Risiko Sedang
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Energi Primer' && profesiSaatTujuan == 'Operasi Sistem') {
            // Risiko Tinggi
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Energi Primer' && profesiSaatTujuan == 'Transmisi') {
            // Risiko Tinggi
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Energi Primer' && profesiSaatTujuan == 'Distribusi') {
            // Risiko Sedang
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Energi Primer' && profesiSaatTujuan == 'Komersial') {
            // Risiko Sedang
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Energi Primer' && profesiSaatTujuan == 'Enjiniring') {
            // Risiko Tinggi
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Energi Primer' && profesiSaatTujuan == 'Konstruksi dan Manajemen Proyek') {
            // Risiko Tinggi
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Energi Primer' && profesiSaatTujuan == 'Produksi Peralatan Ketenagakerjaan') {
            // Risiko Tinggi
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Energi Primer' && profesiSaatTujuan == 'Penelitian dan Pengembangan') {
            // Risiko Sedang
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Energi Primer' && profesiSaatTujuan == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen') {
            // Risiko Tinggi
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Energi Primer' && profesiSaatTujuan == 'Supply Chain Management') {
            // Risiko Sedang
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Energi Primer' && profesiSaatTujuan == 'Manajemen Perubahan dan Kinerja') {
            // Risiko Sedang
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Energi Primer' && profesiSaatTujuan == 'K2, K3, Keamanan dan Lingkungan') {
            // Risiko Sedang
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Energi Primer' && profesiSaatTujuan == 'Hukum') {
            // Risiko Tinggi
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Energi Primer' && profesiSaatTujuan == 'Audit, Risiko, Kepatuhan') {
            // Risiko Sedang
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Energi Primer' && profesiSaatTujuan == 'Teknologi Informasi') {
            // Risiko Tinggi
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Energi Primer' && profesiSaatTujuan == 'SDM') {
            // Risiko Sedang
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Energi Primer' && profesiSaatTujuan == 'Pembelajaran') {
            // Risiko Sedang
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Energi Primer' && profesiSaatTujuan == 'Keuangan') {
            // Risiko Tinggi
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Energi Primer' && profesiSaatTujuan == 'Komunikasi dan TJSL') {
            // Risiko Sedang
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Energi Primer' && profesiSaatTujuan == 'General Affair') {
            // Risiko Sedang
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Pembangkit' && profesiSaatTujuan == 'Energi Primer') {
            // Risiko Rendah
            // Risiko kecil = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Rendah');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Rendah');
        } else if (profesiSaatIni == 'Pembangkit' && profesiSaatTujuan == 'Pembangkit') {
            // Risiko Rendah
            // Risiko kecil = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Rendah');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Rendah');
        } else if (profesiSaatIni == 'Pembangkit' && profesiSaatTujuan == 'Operasi Sistem') {
            // Risiko Tinggi
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Pembangkit' && profesiSaatTujuan == 'Transmisi') {
            // Risiko Tinggi
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Pembangkit' && profesiSaatTujuan == 'Distribusi') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Pembangkit' && profesiSaatTujuan == 'Komersial') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Pembangkit' && profesiSaatTujuan == 'Enjiniring') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Pembangkit' && profesiSaatTujuan == 'Konstruksi dan Manajemen Proyek') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Pembangkit' && profesiSaatTujuan == 'Produksi Peralatan Ketenagakerjaan') {
            // Risiko kecil = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Rendah');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Rendah');
        } else if (profesiSaatIni == 'Pembangkit' && profesiSaatTujuan == 'Penelitian dan Pengembangan') {
            // Risiko kecil = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Rendah');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Rendah');
        } else if (profesiSaatIni == 'Pembangkit' && profesiSaatTujuan == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen') {
            // Risiko kecil = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Rendah');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Rendah');
        } else if (profesiSaatIni == 'Pembangkit' && profesiSaatTujuan == 'Supply Chain Management') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Pembangkit' && profesiSaatTujuan == 'Manajemen Perubahan dan Kinerja') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Pembangkit' && profesiSaatTujuan == 'K2, K3, Keamanan dan Lingkungan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Pembangkit' && profesiSaatTujuan == 'Hukum') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Pembangkit' && profesiSaatTujuan == 'Audit, Risiko, Kepatuhan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Pembangkit' && profesiSaatTujuan == 'Teknologi Informasi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Pembangkit' && profesiSaatTujuan == 'SDM') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Pembangkit' && profesiSaatTujuan == 'Pembelajaran') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Pembangkit' && profesiSaatTujuan == 'Keuangan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Pembangkit' && profesiSaatTujuan == 'Komunikasi dan TJSL') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Pembangkit' && profesiSaatTujuan == 'General Affair') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Operasi Sistem' && profesiSaatTujuan == 'Energi Primer') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Operasi Sistem' && profesiSaatTujuan == 'Pembangkit') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Operasi Sistem' && profesiSaatTujuan == 'Operasi Sistem') {
            // Risiko kecil = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Rendah');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Rendah');
        } else if (profesiSaatIni == 'Operasi Sistem' && profesiSaatTujuan == 'Transmisi') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Operasi Sistem' && profesiSaatTujuan == 'Distribusi') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Operasi Sistem' && profesiSaatTujuan == 'Komersial') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Operasi Sistem' && profesiSaatTujuan == 'Enjiniring') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Operasi Sistem' && profesiSaatTujuan == 'Konstruksi dan Manajemen Proyek') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Operasi Sistem' && profesiSaatTujuan == 'Produksi Peralatan Ketenagakerjaan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Operasi Sistem' && profesiSaatTujuan == 'Penelitian dan Pengembangan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Operasi Sistem' && profesiSaatTujuan == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Operasi Sistem' && profesiSaatTujuan == 'Supply Chain Management') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Operasi Sistem' && profesiSaatTujuan == 'Manajemen Perubahan dan Kinerja') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Operasi Sistem' && profesiSaatTujuan == 'K2, K3, Keamanan dan Lingkungan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Operasi Sistem' && profesiSaatTujuan == 'Hukum') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Operasi Sistem' && profesiSaatTujuan == 'Audit, Risiko, Kepatuhan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Operasi Sistem' && profesiSaatTujuan == 'Teknologi Informasi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Operasi Sistem' && profesiSaatTujuan == 'SDM') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Operasi Sistem' && profesiSaatTujuan == 'Pembelajaran') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Operasi Sistem' && profesiSaatTujuan == 'Keuangan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Operasi Sistem' && profesiSaatTujuan == 'Komunikasi dan TJSL') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Operasi Sistem' && profesiSaatTujuan == 'General Affair') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Transmisi' && profesiSaatTujuan == 'Energi Primer') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Transmisi' && profesiSaatTujuan == 'Pembangkit') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Transmisi' && profesiSaatTujuan == 'Operasi Sistem') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Transmisi' && profesiSaatTujuan == 'Transmisi') {
            // Risiko kecil = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Rendah');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Rendah');
        } else if (profesiSaatIni == 'Transmisi' && profesiSaatTujuan == 'Distribusi') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Transmisi' && profesiSaatTujuan == 'Komersial') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Transmisi' && profesiSaatTujuan == 'Enjiniring') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Transmisi' && profesiSaatTujuan == 'Konstruksi dan Manajemen Proyek') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Transmisi' && profesiSaatTujuan == 'Produksi Peralatan Ketenagakerjaan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Transmisi' && profesiSaatTujuan == 'Penelitian dan Pengembangan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Transmisi' && profesiSaatTujuan == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Transmisi' && profesiSaatTujuan == 'Supply Chain Management') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Transmisi' && profesiSaatTujuan == 'Manajemen Perubahan dan Kinerja') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Transmisi' && profesiSaatTujuan == 'K2, K3, Keamanan dan Lingkungan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Transmisi' && profesiSaatTujuan == 'Hukum') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Transmisi' && profesiSaatTujuan == 'Audit, Risiko, Kepatuhan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Transmisi' && profesiSaatTujuan == 'Teknologi Informasi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Transmisi' && profesiSaatTujuan == 'SDM') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Transmisi' && profesiSaatTujuan == 'Pembelajaran') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Transmisi' && profesiSaatTujuan == 'Keuangan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Transmisi' && profesiSaatTujuan == 'Komunikasi dan TJSL') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Transmisi' && profesiSaatTujuan == 'General Affair') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Distribusi' && profesiSaatTujuan == 'Energi Primer') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Distribusi' && profesiSaatTujuan == 'Pembangkit') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Distribusi' && profesiSaatTujuan == 'Operasi Sistem') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Distribusi' && profesiSaatTujuan == 'Transmisi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Distribusi' && profesiSaatTujuan == 'Distribusi') {
            // Risiko kecil = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Rendah');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Rendah');
        } else if (profesiSaatIni == 'Distribusi' && profesiSaatTujuan == 'Komersial') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Distribusi' && profesiSaatTujuan == 'Enjiniring') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Distribusi' && profesiSaatTujuan == 'Konstruksi dan Manajemen Proyek') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Distribusi' && profesiSaatTujuan == 'Produksi Peralatan Ketenagakerjaan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Distribusi' && profesiSaatTujuan == 'Penelitian dan Pengembangan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Distribusi' && profesiSaatTujuan == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Distribusi' && profesiSaatTujuan == 'Supply Chain Management') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Distribusi' && profesiSaatTujuan == 'Manajemen Perubahan dan Kinerja') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Distribusi' && profesiSaatTujuan == 'K2, K3, Keamanan dan Lingkungan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Distribusi' && profesiSaatTujuan == 'Hukum') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Distribusi' && profesiSaatTujuan == 'Audit, Risiko, Kepatuhan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Distribusi' && profesiSaatTujuan == 'Teknologi Informasi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Distribusi' && profesiSaatTujuan == 'SDM') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Distribusi' && profesiSaatTujuan == 'Pembelajaran') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Distribusi' && profesiSaatTujuan == 'Keuangan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Distribusi' && profesiSaatTujuan == 'Komunikasi dan TJSL') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Distribusi' && profesiSaatTujuan == 'General Affair') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Komersial' && profesiSaatTujuan == 'Energi Primer') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Komersial' && profesiSaatTujuan == 'Pembangkit') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Komersial' && profesiSaatTujuan == 'Operasi Sistem') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Komersial' && profesiSaatTujuan == 'Transmisi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Komersial' && profesiSaatTujuan == 'Distribusi') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Komersial' && profesiSaatTujuan == 'Komersial') {
            // Risiko kecil = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Rendah');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Rendah');
        } else if (profesiSaatIni == 'Komersial' && profesiSaatTujuan == 'Enjiniring') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Komersial' && profesiSaatTujuan == 'Konstruksi dan Manajemen Proyek') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Komersial' && profesiSaatTujuan == 'Produksi Peralatan Ketenagakerjaan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Komersial' && profesiSaatTujuan == 'Penelitian dan Pengembangan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Komersial' && profesiSaatTujuan == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Komersial' && profesiSaatTujuan == 'Supply Chain Management') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Komersial' && profesiSaatTujuan == 'Manajemen Perubahan dan Kinerja') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Komersial' && profesiSaatTujuan == 'K2, K3, Keamanan dan Lingkungan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Komersial' && profesiSaatTujuan == 'Hukum') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Komersial' && profesiSaatTujuan == 'Audit, Risiko, Kepatuhan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Komersial' && profesiSaatTujuan == 'Teknologi Informasi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Komersial' && profesiSaatTujuan == 'SDM') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Komersial' && profesiSaatTujuan == 'Pembelajaran') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Komersial' && profesiSaatTujuan == 'Keuangan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Komersial' && profesiSaatTujuan == 'Komunikasi dan TJSL') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Komersial' && profesiSaatTujuan == 'General Affair') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Enjiniring' && profesiSaatTujuan == 'Energi Primer') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Enjiniring' && profesiSaatTujuan == 'Pembangkit') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Enjiniring' && profesiSaatTujuan == 'Operasi Sistem') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Enjiniring' && profesiSaatTujuan == 'Transmisi') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Enjiniring' && profesiSaatTujuan == 'Distribusi') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Enjiniring' && profesiSaatTujuan == 'Komersial') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Enjiniring' && profesiSaatTujuan == 'Enjiniring') {
            // Risiko kecil = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Rendah');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Rendah');
        } else if (profesiSaatIni == 'Enjiniring' && profesiSaatTujuan == 'Konstruksi dan Manajemen Proyek') {
            // Risiko kecil = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Rendah');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Rendah');
        } else if (profesiSaatIni == 'Enjiniring' && profesiSaatTujuan == 'Produksi Peralatan Ketenagakerjaan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Enjiniring' && profesiSaatTujuan == 'Penelitian dan Pengembangan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Enjiniring' && profesiSaatTujuan == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Enjiniring' && profesiSaatTujuan == 'Supply Chain Management') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Enjiniring' && profesiSaatTujuan == 'Manajemen Perubahan dan Kinerja') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Enjiniring' && profesiSaatTujuan == 'K2, K3, Keamanan dan Lingkungan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Enjiniring' && profesiSaatTujuan == 'Hukum') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Enjiniring' && profesiSaatTujuan == 'Audit, Risiko, Kepatuhan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Enjiniring' && profesiSaatTujuan == 'Teknologi Informasi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Enjiniring' && profesiSaatTujuan == 'SDM') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Enjiniring' && profesiSaatTujuan == 'Pembelajaran') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Enjiniring' && profesiSaatTujuan == 'Keuangan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Enjiniring' && profesiSaatTujuan == 'Komunikasi dan TJSL') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Enjiniring' && profesiSaatTujuan == 'General Affair') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Konstruksi dan Manajemen Proyek' && profesiSaatTujuan == 'Energi Primer') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Konstruksi dan Manajemen Proyek' && profesiSaatTujuan == 'Pembangkit') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Konstruksi dan Manajemen Proyek' && profesiSaatTujuan == 'Operasi Sistem') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Konstruksi dan Manajemen Proyek' && profesiSaatTujuan == 'Transmisi') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Konstruksi dan Manajemen Proyek' && profesiSaatTujuan == 'Distribusi') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Konstruksi dan Manajemen Proyek' && profesiSaatTujuan == 'Komersial') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Konstruksi dan Manajemen Proyek' && profesiSaatTujuan == 'Enjiniring') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Konstruksi dan Manajemen Proyek' && profesiSaatTujuan == 'Konstruksi dan Manajemen Proyek') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Konstruksi dan Manajemen Proyek' && profesiSaatTujuan == 'Produksi Peralatan Ketenagakerjaan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Konstruksi dan Manajemen Proyek' && profesiSaatTujuan == 'Penelitian dan Pengembangan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Konstruksi dan Manajemen Proyek' && profesiSaatTujuan == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Konstruksi dan Manajemen Proyek' && profesiSaatTujuan == 'Supply Chain Management') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Konstruksi dan Manajemen Proyek' && profesiSaatTujuan == 'Manajemen Perubahan dan Kinerja') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Konstruksi dan Manajemen Proyek' && profesiSaatTujuan == 'K2, K3, Keamanan dan Lingkungan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Konstruksi dan Manajemen Proyek' && profesiSaatTujuan == 'Hukum') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Konstruksi dan Manajemen Proyek' && profesiSaatTujuan == 'Audit, Risiko, Kepatuhan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Konstruksi dan Manajemen Proyek' && profesiSaatTujuan == 'Teknologi Informasi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Konstruksi dan Manajemen Proyek' && profesiSaatTujuan == 'SDM') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Konstruksi dan Manajemen Proyek' && profesiSaatTujuan == 'Pembelajaran') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Konstruksi dan Manajemen Proyek' && profesiSaatTujuan == 'Keuangan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Konstruksi dan Manajemen Proyek' && profesiSaatTujuan == 'Komunikasi dan TJSL') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Konstruksi dan Manajemen Proyek' && profesiSaatTujuan == 'General Affair') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Produksi Peralatan Ketenagalistrikan' && profesiSaatTujuan == 'Energi Primer') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Produksi Peralatan Ketenagalistrikan' && profesiSaatTujuan == 'Pembangkit') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Produksi Peralatan Ketenagalistrikan' && profesiSaatTujuan == 'Operasi Sistem') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Produksi Peralatan Ketenagalistrikan' && profesiSaatTujuan == 'Transmisi') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Produksi Peralatan Ketenagalistrikan' && profesiSaatTujuan == 'Distribusi') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Produksi Peralatan Ketenagalistrikan' && profesiSaatTujuan == 'Komersial') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Produksi Peralatan Ketenagalistrikan' && profesiSaatTujuan == 'Enjiniring') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Produksi Peralatan Ketenagalistrikan' && profesiSaatTujuan == 'Konstruksi dan Manajemen Proyek') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Produksi Peralatan Ketenagalistrikan' && profesiSaatTujuan == 'Produksi Peralatan Ketenagakerjaan') {
            // Risiko kecil = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Rendah');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Rendah');
        } else if (profesiSaatIni == 'Produksi Peralatan Ketenagalistrikan' && profesiSaatTujuan == 'Penelitian dan Pengembangan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Produksi Peralatan Ketenagalistrikan' && profesiSaatTujuan == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Produksi Peralatan Ketenagalistrikan' && profesiSaatTujuan == 'Supply Chain Management') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Produksi Peralatan Ketenagalistrikan' && profesiSaatTujuan == 'Manajemen Perubahan dan Kinerja') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Produksi Peralatan Ketenagalistrikan' && profesiSaatTujuan == 'K2, K3, Keamanan dan Lingkungan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Produksi Peralatan Ketenagalistrikan' && profesiSaatTujuan == 'Hukum') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Produksi Peralatan Ketenagalistrikan' && profesiSaatTujuan == 'Audit, Risiko, Kepatuhan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Produksi Peralatan Ketenagalistrikan' && profesiSaatTujuan == 'Teknologi Informasi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Produksi Peralatan Ketenagalistrikan' && profesiSaatTujuan == 'SDM') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Produksi Peralatan Ketenagalistrikan' && profesiSaatTujuan == 'Pembelajaran') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Produksi Peralatan Ketenagalistrikan' && profesiSaatTujuan == 'Keuangan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Produksi Peralatan Ketenagalistrikan' && profesiSaatTujuan == 'Komunikasi dan TJSL') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Produksi Peralatan Ketenagalistrikan' && profesiSaatTujuan == 'General Affair') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Penelitian dan Pengembangan' && profesiSaatTujuan == 'Energi Primer') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Penelitian dan Pengembangan' && profesiSaatTujuan == 'Pembangkit') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Penelitian dan Pengembangan' && profesiSaatTujuan == 'Operasi Sistem') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Penelitian dan Pengembangan' && profesiSaatTujuan == 'Transmisi') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Penelitian dan Pengembangan' && profesiSaatTujuan == 'Distribusi') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Penelitian dan Pengembangan' && profesiSaatTujuan == 'Komersial') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Penelitian dan Pengembangan' && profesiSaatTujuan == 'Enjiniring') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Penelitian dan Pengembangan' && profesiSaatTujuan == 'Konstruksi dan Manajemen Proyek') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Penelitian dan Pengembangan' && profesiSaatTujuan == 'Produksi Peralatan Ketenagakerjaan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Penelitian dan Pengembangan' && profesiSaatTujuan == 'Penelitian dan Pengembangan') {
            // Risiko kecil = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Rendah');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Rendah');
        } else if (profesiSaatIni == 'Penelitian dan Pengembangan' && profesiSaatTujuan == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Penelitian dan Pengembangan' && profesiSaatTujuan == 'Supply Chain Management') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Penelitian dan Pengembangan' && profesiSaatTujuan == 'Manajemen Perubahan dan Kinerja') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Penelitian dan Pengembangan' && profesiSaatTujuan == 'K2, K3, Keamanan dan Lingkungan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Penelitian dan Pengembangan' && profesiSaatTujuan == 'Hukum') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Penelitian dan Pengembangan' && profesiSaatTujuan == 'Audit, Risiko, Kepatuhan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Penelitian dan Pengembangan' && profesiSaatTujuan == 'Teknologi Informasi') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Penelitian dan Pengembangan' && profesiSaatTujuan == 'SDM') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Penelitian dan Pengembangan' && profesiSaatTujuan == 'Pembelajaran') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Penelitian dan Pengembangan' && profesiSaatTujuan == 'Keuangan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Penelitian dan Pengembangan' && profesiSaatTujuan == 'Komunikasi dan TJSL') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Penelitian dan Pengembangan' && profesiSaatTujuan == 'General Affair') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen' && profesiSaatTujuan == 'Energi Primer') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen' && profesiSaatTujuan == 'Pembangkit') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen' && profesiSaatTujuan == 'Operasi Sistem') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen' && profesiSaatTujuan == 'Transmisi') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen' && profesiSaatTujuan == 'Distribusi') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen' && profesiSaatTujuan == 'Komersial') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen' && profesiSaatTujuan == 'Enjiniring') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen' && profesiSaatTujuan == 'Konstruksi dan Manajemen Proyek') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen' && profesiSaatTujuan == 'Produksi Peralatan Ketenagakerjaan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen' && profesiSaatTujuan == 'Penelitian dan Pengembangan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen' && profesiSaatTujuan == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen') {
            // Risiko kecil = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Rendah');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Rendah');
        } else if (profesiSaatIni == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen' && profesiSaatTujuan == 'Supply Chain Management') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen' && profesiSaatTujuan == 'Manajemen Perubahan dan Kinerja') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen' && profesiSaatTujuan == 'K2, K3, Keamanan dan Lingkungan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen' && profesiSaatTujuan == 'Hukum') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen' && profesiSaatTujuan == 'Audit, Risiko, Kepatuhan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen' && profesiSaatTujuan == 'Teknologi Informasi') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen' && profesiSaatTujuan == 'SDM') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen' && profesiSaatTujuan == 'Pembelajaran') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen' && profesiSaatTujuan == 'Keuangan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen' && profesiSaatTujuan == 'Komunikasi dan TJSL') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen' && profesiSaatTujuan == 'General Affair') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Supply Chain Management' && profesiSaatTujuan == 'Energi Primer') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Supply Chain Management' && profesiSaatTujuan == 'Pembangkit') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Supply Chain Management' && profesiSaatTujuan == 'Operasi Sistem') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Supply Chain Management' && profesiSaatTujuan == 'Transmisi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Supply Chain Management' && profesiSaatTujuan == 'Distribusi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Supply Chain Management' && profesiSaatTujuan == 'Komersial') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Supply Chain Management' && profesiSaatTujuan == 'Enjiniring') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Supply Chain Management' && profesiSaatTujuan == 'Konstruksi dan Manajemen Proyek') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Supply Chain Management' && profesiSaatTujuan == 'Produksi Peralatan Ketenagakerjaan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Supply Chain Management' && profesiSaatTujuan == 'Penelitian dan Pengembangan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Supply Chain Management' && profesiSaatTujuan == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Supply Chain Management' && profesiSaatTujuan == 'Supply Chain Management') {
            // Risiko kecil = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Rendah');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Rendah');
        } else if (profesiSaatIni == 'Supply Chain Management' && profesiSaatTujuan == 'Manajemen Perubahan dan Kinerja') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Supply Chain Management' && profesiSaatTujuan == 'K2, K3, Keamanan dan Lingkungan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Supply Chain Management' && profesiSaatTujuan == 'Hukum') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Supply Chain Management' && profesiSaatTujuan == 'Audit, Risiko, Kepatuhan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Supply Chain Management' && profesiSaatTujuan == 'Teknologi Informasi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Supply Chain Management' && profesiSaatTujuan == 'SDM') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Supply Chain Management' && profesiSaatTujuan == 'Pembelajaran') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Supply Chain Management' && profesiSaatTujuan == 'Keuangan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Supply Chain Management' && profesiSaatTujuan == 'Komunikasi dan TJSL') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Supply Chain Management' && profesiSaatTujuan == 'General Affair') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Manajemen Perubahan dan Kinerja' && profesiSaatTujuan == 'Energi Primer') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Manajemen Perubahan dan Kinerja' && profesiSaatTujuan == 'Pembangkit') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Manajemen Perubahan dan Kinerja' && profesiSaatTujuan == 'Operasi Sistem') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Manajemen Perubahan dan Kinerja' && profesiSaatTujuan == 'Transmisi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Manajemen Perubahan dan Kinerja' && profesiSaatTujuan == 'Distribusi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Manajemen Perubahan dan Kinerja' && profesiSaatTujuan == 'Komersial') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Manajemen Perubahan dan Kinerja' && profesiSaatTujuan == 'Enjiniring') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Manajemen Perubahan dan Kinerja' && profesiSaatTujuan == 'Konstruksi dan Manajemen Proyek') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Manajemen Perubahan dan Kinerja' && profesiSaatTujuan == 'Produksi Peralatan Ketenagakerjaan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Manajemen Perubahan dan Kinerja' && profesiSaatTujuan == 'Penelitian dan Pengembangan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Manajemen Perubahan dan Kinerja' && profesiSaatTujuan == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Manajemen Perubahan dan Kinerja' && profesiSaatTujuan == 'Supply Chain Management') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Manajemen Perubahan dan Kinerja' && profesiSaatTujuan == 'Manajemen Perubahan dan Kinerja') {
            // Risiko kecil = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Rendah');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Rendah');
        } else if (profesiSaatIni == 'Manajemen Perubahan dan Kinerja' && profesiSaatTujuan == 'K2, K3, Keamanan dan Lingkungan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Manajemen Perubahan dan Kinerja' && profesiSaatTujuan == 'Hukum') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Manajemen Perubahan dan Kinerja' && profesiSaatTujuan == 'Audit, Risiko, Kepatuhan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Manajemen Perubahan dan Kinerja' && profesiSaatTujuan == 'Teknologi Informasi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Manajemen Perubahan dan Kinerja' && profesiSaatTujuan == 'SDM') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Manajemen Perubahan dan Kinerja' && profesiSaatTujuan == 'Pembelajaran') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Manajemen Perubahan dan Kinerja' && profesiSaatTujuan == 'Keuangan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Manajemen Perubahan dan Kinerja' && profesiSaatTujuan == 'Komunikasi dan TJSL') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Manajemen Perubahan dan Kinerja' && profesiSaatTujuan == 'General Affair') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'K2, K3, Keamanan dan Lingkungan' && profesiSaatTujuan == 'Energi Primer') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'K2, K3, Keamanan dan Lingkungan' && profesiSaatTujuan == 'Pembangkit') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'K2, K3, Keamanan dan Lingkungan' && profesiSaatTujuan == 'Operasi Sistem') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'K2, K3, Keamanan dan Lingkungan' && profesiSaatTujuan == 'Transmisi') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'K2, K3, Keamanan dan Lingkungan' && profesiSaatTujuan == 'Distribusi') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'K2, K3, Keamanan dan Lingkungan' && profesiSaatTujuan == 'Komersial') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'K2, K3, Keamanan dan Lingkungan' && profesiSaatTujuan == 'Enjiniring') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'K2, K3, Keamanan dan Lingkungan' && profesiSaatTujuan == 'Konstruksi dan Manajemen Proyek') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'K2, K3, Keamanan dan Lingkungan' && profesiSaatTujuan == 'Produksi Peralatan Ketenagakerjaan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'K2, K3, Keamanan dan Lingkungan' && profesiSaatTujuan == 'Penelitian dan Pengembangan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'K2, K3, Keamanan dan Lingkungan' && profesiSaatTujuan == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'K2, K3, Keamanan dan Lingkungan' && profesiSaatTujuan == 'Supply Chain Management') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'K2, K3, Keamanan dan Lingkungan' && profesiSaatTujuan == 'Manajemen Perubahan dan Kinerja') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'K2, K3, Keamanan dan Lingkungan' && profesiSaatTujuan == 'K2, K3, Keamanan dan Lingkungan') {
            // Risiko Rendah
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Rendah');
        } else if (profesiSaatIni == 'K2, K3, Keamanan dan Lingkungan' && profesiSaatTujuan == 'Hukum') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'K2, K3, Keamanan dan Lingkungan' && profesiSaatTujuan == 'Audit, Risiko, Kepatuhan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'K2, K3, Keamanan dan Lingkungan' && profesiSaatTujuan == 'Teknologi Informasi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'K2, K3, Keamanan dan Lingkungan' && profesiSaatTujuan == 'SDM') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'K2, K3, Keamanan dan Lingkungan' && profesiSaatTujuan == 'Pembelajaran') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'K2, K3, Keamanan dan Lingkungan' && profesiSaatTujuan == 'Keuangan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'K2, K3, Keamanan dan Lingkungan' && profesiSaatTujuan == 'Komunikasi dan TJSL') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'K2, K3, Keamanan dan Lingkungan' && profesiSaatTujuan == 'General Affair') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Hukum' && profesiSaatTujuan == 'Energi Primer') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Hukum' && profesiSaatTujuan == 'Pembangkit') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Hukum' && profesiSaatTujuan == 'Operasi Sistem') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Hukum' && profesiSaatTujuan == 'Transmisi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Hukum' && profesiSaatTujuan == 'Distribusi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Hukum' && profesiSaatTujuan == 'Komersial') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Hukum' && profesiSaatTujuan == 'Enjiniring') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Hukum' && profesiSaatTujuan == 'Konstruksi dan Manajemen Proyek') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Hukum' && profesiSaatTujuan == 'Produksi Peralatan Ketenagakerjaan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Hukum' && profesiSaatTujuan == 'Penelitian dan Pengembangan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Hukum' && profesiSaatTujuan == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Hukum' && profesiSaatTujuan == 'Supply Chain Management') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Hukum' && profesiSaatTujuan == 'Manajemen Perubahan dan Kinerja') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Hukum' && profesiSaatTujuan == 'K2, K3, Keamanan dan Lingkungan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Hukum' && profesiSaatTujuan == 'Hukum') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Hukum' && profesiSaatTujuan == 'Audit, Risiko, Kepatuhan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Hukum' && profesiSaatTujuan == 'Teknologi Informasi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Hukum' && profesiSaatTujuan == 'SDM') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Hukum' && profesiSaatTujuan == 'Pembelajaran') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Hukum' && profesiSaatTujuan == 'Keuangan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Hukum' && profesiSaatTujuan == 'Komunikasi dan TJSL') {
            // Risiko kecil = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Rendah');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Rendah');
        } else if (profesiSaatIni == 'Hukum' && profesiSaatTujuan == 'General Affair') {
            // Risiko kecil = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Rendah');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Rendah');
        } else if (profesiSaatIni == 'Audit, Risiko, Kepatuhan') {
            // Risiko Rendah disesuaikan
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang jika pernah berada di profesi tujuan');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang jika pernah berada di profesi tujuan');
        } else if (profesiSaatIni == 'Teknologi Informasi' && profesiSaatTujuan == 'Energi Primer') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Teknologi Informasi' && profesiSaatTujuan == 'Pembangkit') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Teknologi Informasi' && profesiSaatTujuan == 'Operasi Sistem') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Teknologi Informasi' && profesiSaatTujuan == 'Transmisi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Teknologi Informasi' && profesiSaatTujuan == 'Distribusi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Teknologi Informasi' && profesiSaatTujuan == 'Komersial') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Teknologi Informasi' && profesiSaatTujuan == 'Enjiniring') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Teknologi Informasi' && profesiSaatTujuan == 'Konstruksi dan Manajemen Proyek') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Teknologi Informasi' && profesiSaatTujuan == 'Produksi Peralatan Ketenagakerjaan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Teknologi Informasi' && profesiSaatTujuan == 'Penelitian dan Pengembangan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Teknologi Informasi' && profesiSaatTujuan == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Teknologi Informasi' && profesiSaatTujuan == 'Supply Chain Management') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Teknologi Informasi' && profesiSaatTujuan == 'Manajemen Perubahan dan Kinerja') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Teknologi Informasi' && profesiSaatTujuan == 'K2, K3, Keamanan dan Lingkungan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Teknologi Informasi' && profesiSaatTujuan == 'Hukum') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Teknologi Informasi' && profesiSaatTujuan == 'Audit, Risiko, Kepatuhan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Teknologi Informasi' && profesiSaatTujuan == 'Teknologi Informasi') {
            // Risiko kecil = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Rendah');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Rendah');
        } else if (profesiSaatIni == 'Teknologi Informasi' && profesiSaatTujuan == 'SDM') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Teknologi Informasi' && profesiSaatTujuan == 'Pembelajaran') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Teknologi Informasi' && profesiSaatTujuan == 'Keuangan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Teknologi Informasi' && profesiSaatTujuan == 'Komunikasi dan TJSL') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Teknologi Informasi' && profesiSaatTujuan == 'General Affair') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'SDM' && profesiSaatTujuan == 'Energi Primer') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'SDM' && profesiSaatTujuan == 'Pembangkit') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'SDM' && profesiSaatTujuan == 'Operasi Sistem') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'SDM' && profesiSaatTujuan == 'Transmisi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'SDM' && profesiSaatTujuan == 'Distribusi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'SDM' && profesiSaatTujuan == 'Komersial') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'SDM' && profesiSaatTujuan == 'Enjiniring') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'SDM' && profesiSaatTujuan == 'Konstruksi dan Manajemen Proyek') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'SDM' && profesiSaatTujuan == 'Produksi Peralatan Ketenagakerjaan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'SDM' && profesiSaatTujuan == 'Penelitian dan Pengembangan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'SDM' && profesiSaatTujuan == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'SDM' && profesiSaatTujuan == 'Supply Chain Management') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'SDM' && profesiSaatTujuan == 'Manajemen Perubahan dan Kinerja') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'SDM' && profesiSaatTujuan == 'K2, K3, Keamanan dan Lingkungan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'SDM' && profesiSaatTujuan == 'Hukum') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'SDM' && profesiSaatTujuan == 'Audit, Risiko, Kepatuhan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'SDM' && profesiSaatTujuan == 'Teknologi Informasi') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'SDM' && profesiSaatTujuan == 'SDM') {
            // Risiko Rendah
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Rendah');
        } else if (profesiSaatIni == 'SDM' && profesiSaatTujuan == 'Pembelajaran') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'SDM' && profesiSaatTujuan == 'Keuangan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'SDM' && profesiSaatTujuan == 'Komunikasi dan TJSL') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'SDM' && profesiSaatTujuan == 'General Affair') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Pembelajaran' && profesiSaatTujuan != 'Pembelajaran') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Keuangan' && profesiSaatTujuan == 'Energi Primer') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Keuangan' && profesiSaatTujuan == 'Pembangkit') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Keuangan' && profesiSaatTujuan == 'Operasi Sistem') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Keuangan' && profesiSaatTujuan == 'Transmisi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Keuangan' && profesiSaatTujuan == 'Distribusi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Keuangan' && profesiSaatTujuan == 'Komersial') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Keuangan' && profesiSaatTujuan == 'Enjiniring') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Keuangan' && profesiSaatTujuan == 'Konstruksi dan Manajemen Proyek') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Keuangan' && profesiSaatTujuan == 'Produksi Peralatan Ketenagakerjaan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Keuangan' && profesiSaatTujuan == 'Penelitian dan Pengembangan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Keuangan' && profesiSaatTujuan == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Keuangan' && profesiSaatTujuan == 'Supply Chain Management') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Keuangan' && profesiSaatTujuan == 'Manajemen Perubahan dan Kinerja') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Keuangan' && profesiSaatTujuan == 'K2, K3, Keamanan dan Lingkungan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Keuangan' && profesiSaatTujuan == 'Hukum') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Keuangan' && profesiSaatTujuan == 'Audit, Risiko, Kepatuhan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Keuangan' && profesiSaatTujuan == 'Teknologi Informasi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Keuangan' && profesiSaatTujuan == 'SDM') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Keuangan' && profesiSaatTujuan == 'Pembelajaran') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Keuangan' && profesiSaatTujuan == 'Keuangan') {
            // Risiko kecil = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Rendah');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Rendah');
        } else if (profesiSaatIni == 'Keuangan' && profesiSaatTujuan == 'Komunikasi dan TJSL') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Keuangan' && profesiSaatTujuan == 'General Affair') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Komunikasi dan TJSL' && profesiSaatTujuan == 'Energi Primer') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Komunikasi dan TJSL' && profesiSaatTujuan == 'Pembangkit') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Komunikasi dan TJSL' && profesiSaatTujuan == 'Operasi Sistem') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Komunikasi dan TJSL' && profesiSaatTujuan == 'Transmisi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Komunikasi dan TJSL' && profesiSaatTujuan == 'Distribusi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Komunikasi dan TJSL' && profesiSaatTujuan == 'Komersial') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Komunikasi dan TJSL' && profesiSaatTujuan == 'Enjiniring') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Komunikasi dan TJSL' && profesiSaatTujuan == 'Konstruksi dan Manajemen Proyek') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Komunikasi dan TJSL' && profesiSaatTujuan == 'Produksi Peralatan Ketenagakerjaan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Komunikasi dan TJSL' && profesiSaatTujuan == 'Penelitian dan Pengembangan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Komunikasi dan TJSL' && profesiSaatTujuan == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Komunikasi dan TJSL' && profesiSaatTujuan == 'Supply Chain Management') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Komunikasi dan TJSL' && profesiSaatTujuan == 'Manajemen Perubahan dan Kinerja') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Komunikasi dan TJSL' && profesiSaatTujuan == 'K2, K3, Keamanan dan Lingkungan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Komunikasi dan TJSL' && profesiSaatTujuan == 'Hukum') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Komunikasi dan TJSL' && profesiSaatTujuan == 'Audit, Risiko, Kepatuhan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Komunikasi dan TJSL' && profesiSaatTujuan == 'Teknologi Informasi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Komunikasi dan TJSL' && profesiSaatTujuan == 'SDM') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Komunikasi dan TJSL' && profesiSaatTujuan == 'Pembelajaran') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'Komunikasi dan TJSL' && profesiSaatTujuan == 'Keuangan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'Komunikasi dan TJSL' && profesiSaatTujuan == 'Komunikasi dan TJSL') {
            // Risiko kecil = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Rendah');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Rendah');
        } else if (profesiSaatIni == 'Komunikasi dan TJSL' && profesiSaatTujuan == 'General Affair') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'General Affair' && profesiSaatTujuan == 'Energi Primer') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'General Affair' && profesiSaatTujuan == 'Pembangkit') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'General Affair' && profesiSaatTujuan == 'Operasi Sistem') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'General Affair' && profesiSaatTujuan == 'Transmisi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'General Affair' && profesiSaatTujuan == 'Distribusi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'General Affair' && profesiSaatTujuan == 'Komersial') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'General Affair' && profesiSaatTujuan == 'Enjiniring') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'General Affair' && profesiSaatTujuan == 'Konstruksi dan Manajemen Proyek') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'General Affair' && profesiSaatTujuan == 'Produksi Peralatan Ketenagakerjaan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'General Affair' && profesiSaatTujuan == 'Penelitian dan Pengembangan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'General Affair' && profesiSaatTujuan == 'Sertifikasi Produk, Instalasi Ketenagalistrikan dan Sistem Manajemen') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'General Affair' && profesiSaatTujuan == 'Supply Chain Management') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'General Affair' && profesiSaatTujuan == 'Manajemen Perubahan dan Kinerja') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'General Affair' && profesiSaatTujuan == 'K2, K3, Keamanan dan Lingkungan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'General Affair' && profesiSaatTujuan == 'Hukum') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'General Affair' && profesiSaatTujuan == 'Audit, Risiko, Kepatuhan') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'General Affair' && profesiSaatTujuan == 'Teknologi Informasi') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'General Affair' && profesiSaatTujuan == 'SDM') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'General Affair' && profesiSaatTujuan == 'Pembelajaran') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'General Affair' && profesiSaatTujuan == 'Keuangan') {
            // Risiko Tinggi = Tdk Memenuhi
            $('#notifProfesi').text('Not');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-info');
            $('#notifProfesi').addClass('bg-danger');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Tdk Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Tinggi');
            $('#notifProfesi2').val('Not');
            $('#textProfesi2').val('Tdk Memenuhi');
            $('#ilPetaRisk2').val('Risiko Tinggi');
        } else if (profesiSaatIni == 'General Affair' && profesiSaatTujuan == 'Komunikasi dan TJSL') {
            // Risiko Sedang = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Sedang');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Sedang');
        } else if (profesiSaatIni == 'General Affair' && profesiSaatTujuan == 'General Affair') {
            // Risiko kecil = Memenuhi
            $('#notifProfesi').text('Ok');
            $('#notifProfesi').removeClass('d-none');
            $('#notifProfesi').removeClass('bg-danger');
            $('#notifProfesi').addClass('bg-info');
            $('#notifProfesi').show(100);
            $('#textProfesi').text('Memenuhi');
            $('#textProfesi').removeClass('d-none');
            $('#textProfesi').show(100);
            $('#ilProfesiSkrg').text($('#select2Basic4').val());
            $('#ilProfesiTujuan').text($('#select2Basic5').val());
            $('#ilPetaRisk').text('Risiko Rendah');
            $('#notifProfesi2').val('Ok');
            $('#textProfesi2').val('Memenuhi');
            $('#ilPetaRisk2').val('Risiko Rendah');
        }

        const ftkup = $('#inputftkupsup').val();
        $('#ftkUpSup').text(ftkup);
        $('#ftkUpSupKat2').val(ftkup);
        if (ftkup > 95) {
            $('#ftkUpSupKat').text('Lebih');
        } else if (ftkup == 0) {
            $('#ftkUpSupKat').text('-');
        } else if (ftkup < 95) {
            $('#ftkUpSupKat').text('Kurang');
        }

        const ftkupasal = $('#inputftkupsupasal').val();
        $('#ftkUpSupasal').text(ftkupasal);
        $('#ftkUpSupasalKat2').val(ftkupasal);
        if (ftkupasal > 95) {
            $('#ftkUpSupKatasal').text('Lebih');
        } else if (ftkupasal == 0) {
            $('#ftkUpSupKatasal').text('-');
        } else if (ftkupasal < 95) {
            $('#ftkUpSupKatasal').text('Kurang');
        }

        // mulai perhitungan masa jabatan terakhir
        if ($('#select2Basic8').val() == 1 || $('#select2Basic8').val() == 3 || $('#select2Basic8').val() == 4 || $('#select2Basic8').val() == 9) {
            if (jenjabEval == 'FUNGSIONAL') {
                if (masaJabatanTerakhirEval >= 6) {
                    $('#notifMasaJabTrkhir').text('Ok');
                    $('#notifMasaJabTrkhir2').val('Ok');
                    $('#textMasaJabTrkhir2').val('Memenuhi');
                    $('#notifMasaJabTrkhir').removeClass('d-none');
                    $('#notifMasaJabTrkhir').removeClass('bg-danger');
                    $('#notifMasaJabTrkhir').addClass('bg-info');
                    $('#notifMasaJabTrkhir').show(100);
                    $('#textMasaJabTrkhir').text('Memenuhi');
                    $('#textMasaJabTrkhir').removeClass('d-none');
                    $('#textMasaJabTrkhir').show(100);
                    $('#ilTglJabTrkhr').text($('#tgljabtrk').val());
                    $('#ilMasaJabTrkhr').text($('#masaJabatanTerakhir').val());
                    $('#ilTglEvaluasi2').text(tampilTanggal);
                } else {
                    $('#notifMasaJabTrkhir').text('Not');
                    $('#notifMasaJabTrkhir2').val('Not');
                    $('#textMasaJabTrkhir2').val('Tdk Memenuhi');
                    $('#notifMasaJabTrkhir').removeClass('d-none');
                    $('#notifMasaJabTrkhir').removeClass('bg-info');
                    $('#notifMasaJabTrkhir').addClass('bg-danger');
                    $('#notifMasaJabTrkhir').show(100);
                    $('#textMasaJabTrkhir').text('Tdk Memenuhi');
                    $('#textMasaJabTrkhir').removeClass('d-none');
                    $('#textMasaJabTrkhir').show(100);
                    $('#ilTglJabTrkhr').text($('#tgljabtrk').val());
                    $('#ilMasaJabTrkhr').text($('#masaJabatanTerakhir').val());
                    $('#ilTglEvaluasi2').text(tampilTanggal);
                }
            } else {
                if (masaJabatanTerakhirEval >= 12) {
                    $('#notifMasaJabTrkhir').text('Ok');
                    $('#notifMasaJabTrkhir2').val('Ok');
                    $('#textMasaJabTrkhir2').val('Memenuhi');
                    $('#notifMasaJabTrkhir').removeClass('d-none');
                    $('#notifMasaJabTrkhir').removeClass('bg-danger');
                    $('#notifMasaJabTrkhir').addClass('bg-info');
                    $('#notifMasaJabTrkhir').show(100);
                    $('#textMasaJabTrkhir').text('Memenuhi');
                    $('#textMasaJabTrkhir').removeClass('d-none');
                    $('#textMasaJabTrkhir').show(100);
                    $('#ilTglJabTrkhr').text($('#tgljabtrk').val());
                    $('#ilMasaJabTrkhr').text($('#masaJabatanTerakhir').val());
                    $('#ilTglEvaluasi2').text(tampilTanggal);
                } else {
                    $('#notifMasaJabTrkhir').text('Not');
                    $('#notifMasaJabTrkhir2').val('Not');
                    $('#textMasaJabTrkhir2').val('Tdk Memenuhi');
                    $('#notifMasaJabTrkhir').removeClass('d-none');
                    $('#notifMasaJabTrkhir').removeClass('bg-info');
                    $('#notifMasaJabTrkhir').addClass('bg-danger');
                    $('#notifMasaJabTrkhir').show(100);
                    $('#textMasaJabTrkhir').text('Tdk Memenuhi');
                    $('#textMasaJabTrkhir').removeClass('d-none');
                    $('#textMasaJabTrkhir').show(100);
                    $('#ilTglJabTrkhr').text($('#tgljabtrk').val());
                    $('#ilMasaJabTrkhr').text($('#masaJabatanTerakhir').val());
                    $('#ilTglEvaluasi2').text(tampilTanggal);
                }
            }
        } else {
            $('#notifMasaJabTrkhir').text('Ok');
            $('#notifMasaJabTrkhir2').val('Ok');
            $('#textMasaJabTrkhir2').val('Memenuhi');
            $('#notifMasaJabTrkhir').removeClass('d-none');
            $('#notifMasaJabTrkhir').removeClass('bg-danger');
            $('#notifMasaJabTrkhir').addClass('bg-info');
            $('#notifMasaJabTrkhir').show(100);
            $('#textMasaJabTrkhir').text('Memenuhi');
            $('#textMasaJabTrkhir').removeClass('d-none');
            $('#textMasaJabTrkhir').show(100);
            $('#ilTglJabTrkhr').text($('#tgljabtrk').val());
            $('#ilMasaJabTrkhr').text($('#masaJabatanTerakhir').val());
            $('#ilTglEvaluasi2').text(tampilTanggal);
        }

        // mulai perhitungan masa kerja
        if ($('#select2Basic8').val() == 7) {
            if (MasaKerjaBulanEval >= 12) {
                $('#ilMasaKerja').text($('#masaKerja').val());
                $('#ilTglPegwTtp').text($('#boxTglPegTtp').val());
                $('#ilTglEvaluasi').text(tampilTanggal);
                $('#notifMasaKerja').text('Ok');
                $('#notifMasaKerja2').val('Ok');
                $('#textMasaKerja2').val('Memenuhi');
                $('#notifMasaKerja').removeClass('d-none');
                $('#notifMasaKerja').removeClass('bg-danger');
                $('#notifMasaKerja').addClass('bg-info');
                $('#notifMasaKerja').show(100);
                $('#textMasaKerja').text('Memenuhi');
                $('#textMasaKerja').removeClass('d-none');
                $('#textMasaKerja').show(100);
            } else {
                $('#ilMasaKerja').text($('#masaKerja').val());
                $('#ilTglPegwTtp').text($('#boxTglPegTtp').val());
                $('#ilTglEvaluasi').text(tampilTanggal);
                $('#notifMasaKerja').text('Not');
                $('#notifMasaKerja2').val('Not');
                $('#textMasaKerja2').val('Tdk Memenuhi');
                $('#notifMasaKerja').removeClass('d-none');
                $('#notifMasaKerja').removeClass('bg-info');
                $('#notifMasaKerja').addClass('bg-danger');
                $('#notifMasaKerja').show(100);
                $('#textMasaKerja').text('Tdk Memenuhi');
                $('#textMasaKerja').removeClass('d-none');
                $('#textMasaKerja').show(100);
            }
        } else if ($('#select2Basic8').val() == 1 || $('#select2Basic8').val() == 2 || $('#select2Basic8').val() == 3) {
            if (MasaKerjaBulanEval >= 84) {
                $('#ilMasaKerja').text($('#masaKerja').val());
                $('#ilTglPegwTtp').text($('#boxTglPegTtp').val());
                $('#ilTglEvaluasi').text(tampilTanggal);
                $('#notifMasaKerja').text('Ok');
                $('#notifMasaKerja2').val('Ok');
                $('#textMasaKerja2').val('Memenuhi');
                $('#notifMasaKerja').removeClass('d-none');
                $('#notifMasaKerja').removeClass('bg-danger');
                $('#notifMasaKerja').addClass('bg-info');
                $('#notifMasaKerja').show(100);
                $('#textMasaKerja').text('Memenuhi');
                $('#textMasaKerja').removeClass('d-none');
                $('#textMasaKerja').show(100);
            } else {
                $('#ilMasaKerja').text($('#masaKerja').val());
                $('#ilTglPegwTtp').text($('#boxTglPegTtp').val());
                $('#ilTglEvaluasi').text(tampilTanggal);
                $('#notifMasaKerja').text('Not');
                $('#notifMasaKerja2').val('Not');
                $('#textMasaKerja2').val('Tdk Memenuhi');
                $('#notifMasaKerja').removeClass('d-none');
                $('#notifMasaKerja').removeClass('bg-info');
                $('#notifMasaKerja').addClass('bg-danger');
                $('#notifMasaKerja').show(100);
                $('#textMasaKerja').text('Tdk Memenuhi');
                $('#textMasaKerja').removeClass('d-none');
                $('#textMasaKerja').show(100);
            }
        } else {
            $('#ilMasaKerja').text($('#masaKerja').val());
            $('#ilTglPegwTtp').text($('#boxTglPegTtp').val());
            $('#ilTglEvaluasi').text(tampilTanggal);
            $('#notifMasaKerja').text('Ok');
            $('#notifMasaKerja2').val('Ok');
            $('#textMasaKerja2').val('Memenuhi');
            $('#notifMasaKerja').removeClass('d-none');
            $('#notifMasaKerja').removeClass('bg-danger');
            $('#notifMasaKerja').addClass('bg-info');
            $('#notifMasaKerja').show(100);
            $('#textMasaKerja').text('Memenuhi');
            $('#textMasaKerja').removeClass('d-none');
            $('#textMasaKerja').show(100);
        }

        // mulai perhitungan pegpog
        if ($('#select2Basic8').val() == 7) {
            if (PeG == PoG || PoG - PeG == 1) {
                $('#notifPeGPoG').removeClass('d-none');
                $('#textPeGPoG').removeClass('d-none');
                $('#notifPeGPoG').removeClass('bg-danger');
                $('#notifPeGPoG').text('Ok');
                $('#notifPeGPoG2').val('Ok');
                $('#textPeGPoG').text('Memenuhi');
                $('#textPeGPoG2').val('Memenuhi');
                $('#ilPeG').text($('#pegEval').val());
                $('#ilPoG').text($('#pogJabBaruView').val());
                $('#notifPeGPoG').addClass('bg-info');
                $("#notifPeGPoG").show(100);
                $("#textPeGPoG").show(100);
            } else if (PoG - PeG > 1 || PoG - PeG < 0) {
                $('#notifPeGPoG').removeClass('d-none');
                $('#textPeGPoG').removeClass('d-none');
                $('#notifPeGPoG').removeClass('bg-info');
                $('#notifPeGPoG').text('Not');
                $('#notifPeGPoG2').val('Not');
                $('#textPeGPoG').text('Tdk Memenuhi');
                $('#textPeGPoG2').val('Tdk Memenuhi');
                $('#ilPeG').text($('#pegEval').val());
                $('#ilPoG').text($('#pogJabBaruView').val());
                $('#notifPeGPoG').addClass('bg-danger');
                $("#notifPeGPoG").show(100);
                $("#textPeGPoG").show(100);
            }
        } else {
            if (PeG == PoG) {
                $('#notifPeGPoG').removeClass('d-none');
                $('#textPeGPoG').removeClass('d-none');
                $('#notifPeGPoG').removeClass('bg-danger');
                $('#notifPeGPoG').text('Ok');
                $('#notifPeGPoG2').val('Ok');
                $('#textPeGPoG').text('Memenuhi');
                $('#textPeGPoG2').val('Memenuhi');
                $('#ilPeG').text($('#pegEval').val());
                $('#ilPoG').text($('#pogJabBaruView').val());
                $('#notifPeGPoG').addClass('bg-info');
                $("#notifPeGPoG").show(100);
                $("#textPeGPoG").show(100);
            } else if (PeG != PoG) {
                $('#notifPeGPoG').removeClass('d-none');
                $('#textPeGPoG').removeClass('d-none');
                $('#notifPeGPoG').removeClass('bg-info');
                $('#notifPeGPoG').text('Not');
                $('#notifPeGPoG2').val('Not');
                $('#textPeGPoG').text('Tdk Memenuhi');
                $('#textPeGPoG2').val('Tdk Memenuhi');
                $('#ilPeG').text($('#pegEval').val());
                $('#ilPoG').text($('#pogJabBaruView').val());
                $('#notifPeGPoG').addClass('bg-danger');
                $("#notifPeGPoG").show(100);
                $("#textPeGPoG").show(100);
            }
        }


        // mulai perhitungan kategori ftk
        if ($('#select2Basic8').val() >= 4) {
            $('#notifFtk').removeClass('d-none');
            $('#textFtk').removeClass('d-none');
            $('#notifFtk').removeClass('bg-danger');
            $('#notifFtk').text('Ok');
            $('#notifFtk2').val('Ok');
            $('#textFtk2').val('Memenuhi');
            $('#textFtk').text('Memenuhi');
            $('#notifFtk').addClass('bg-info');
            $('#notifFtk').show(100);
            $('#textFtk').show(100);
            $('#ftkAsalReal').text(ftkAsal);
            $('#ftkTujuanReal').text(ftkTujuan);
            if (categoryFtkTujuan == 1) {
                $('#ftkTujuanKat').text('Kurang');
                $('#ftkTujuanKat2').val('Kurang');
            } else if (categoryFtkTujuan == 2) {
                $('#ftkTujuanKat').text('Sama');
                $('#ftkTujuanKat2').val('Sama');
            } else if (categoryFtkTujuan == 3) {
                $('#ftkTujuanKat').text('Lebih');
                $('#ftkTujuanKat2').val('Lebih');
            }

            if (categoryFtkAsal == 1) {
                $('#ftkAsalKat').text('Kurang');
                $('#ftkAsalKat2').val('Kurang');
            } else if (categoryFtkAsal == 2) {
                $('#ftkAsalKat').text('Sama');
                $('#ftkAsalKat2').val('Sama');
            } else if (categoryFtkAsal == 3) {
                $('#ftkAsalKat').text('Lebih');
                $('#ftkAsalKat2').val('Lebih');
            }
        } else {
            if (categoryFtkAsal == 1 && categoryFtkTujuan == 1) {
                $('#notifFtk').removeClass('d-none');
                $('#notifFtk').removeClass('bg-info');
                $('#textFtk').removeClass('d-none');
                $('#notifFtk').text('Not');
                $('#notifFtk2').val('Not');
                $('#textFtk2').val('Tdk Memenuhi');
                $('#textFtk').text('Tdk Memenuhi');
                $('#notifFtk').addClass('bg-danger');
                $('#notifFtk').show(100);
                $('#textFtk').show(100);
                $('#ftkAsalReal').text(ftkAsal);
                $('#ftkTujuanReal').text(ftkTujuan);

                if (categoryFtkTujuan == 1) {
                    $('#ftkTujuanKat').text('Kurang');
                    $('#ftkTujuanKat2').val('Kurang');
                } else if (categoryFtkTujuan == 2) {
                    $('#ftkTujuanKat').text('Sama');
                    $('#ftkTujuanKat2').val('Sama');
                } else if (categoryFtkTujuan == 3) {
                    $('#ftkTujuanKat').text('Lebih');
                    $('#ftkTujuanKat2').val('Lebih');
                }

                if (categoryFtkAsal == 1) {
                    $('#ftkAsalKat').text('Kurang');
                    $('#ftkAsalKat2').val('Kurang');
                } else if (categoryFtkAsal == 2) {
                    $('#ftkAsalKat').text('Sama');
                    $('#ftkAsalKat2').val('Sama');
                } else if (categoryFtkAsal == 3) {
                    $('#ftkAsalKat').text('Lebih');
                    $('#ftkAsalKat2').val('Lebih');
                }
            } else if (categoryFtkAsal == 1 && categoryFtkTujuan == 2) {
                $('#notifFtk').removeClass('d-none');
                $('#notifFtk').removeClass('bg-info');
                $('#textFtk').removeClass('d-none');
                $('#notifFtk').text('Not');
                $('#notifFtk2').val('Not');
                $('#textFtk2').val('Tdk Memenuhi');
                $('#textFtk').text('Tdk Memenuhi');
                $('#notifFtk').addClass('bg-danger');
                $('#notifFtk').show(100);
                $('#textFtk').show(100);
                $('#ftkAsalReal').text(ftkAsal);
                $('#ftkTujuanReal').text(ftkTujuan);

                if (categoryFtkTujuan == 1) {
                    $('#ftkTujuanKat').text('Kurang');
                    $('#ftkTujuanKat2').val('Kurang');
                } else if (categoryFtkTujuan == 2) {
                    $('#ftkTujuanKat').text('Sama');
                    $('#ftkTujuanKat2').val('Sama');
                } else if (categoryFtkTujuan == 3) {
                    $('#ftkTujuanKat').text('Lebih');
                    $('#ftkTujuanKat2').val('Lebih');
                }

                if (categoryFtkAsal == 1) {
                    $('#ftkAsalKat').text('Kurang');
                    $('#ftkAsalKat2').val('Kurang');
                } else if (categoryFtkAsal == 2) {
                    $('#ftkAsalKat').text('Sama');
                    $('#ftkAsalKat2').val('Sama');
                } else if (categoryFtkAsal == 3) {
                    $('#ftkAsalKat').text('Lebih');
                    $('#ftkAsalKat2').val('Lebih');
                }
            } else if (categoryFtkAsal == 1 && categoryFtkTujuan == 3) {
                $('#notifFtk').removeClass('d-none');
                $('#notifFtk').removeClass('bg-info');
                $('#textFtk').removeClass('d-none');
                $('#notifFtk').text('Not');
                $('#notifFtk2').val('Not');
                $('#textFtk2').val('Tdk Memenuhi');
                $('#textFtk').text('Tdk Memenuhi');
                $('#notifFtk').addClass('bg-danger');
                $('#notifFtk').show(100);
                $('#textFtk').show(100);
                $('#ftkAsalReal').text(ftkAsal);
                $('#ftkTujuanReal').text(ftkTujuan);

                if (categoryFtkTujuan == 1) {
                    $('#ftkTujuanKat').text('Kurang');
                    $('#ftkTujuanKat2').val('Kurang');
                } else if (categoryFtkTujuan == 2) {
                    $('#ftkTujuanKat').text('Sama');
                    $('#ftkTujuanKat2').val('Sama');
                } else if (categoryFtkTujuan == 3) {
                    $('#ftkTujuanKat').text('Lebih');
                    $('#ftkTujuanKat2').val('Lebih');
                }

                if (categoryFtkAsal == 1) {
                    $('#ftkAsalKat').text('Kurang');
                    $('#ftkAsalKat2').val('Kurang');
                } else if (categoryFtkAsal == 2) {
                    $('#ftkAsalKat').text('Sama');
                    $('#ftkAsalKat2').val('Sama');
                } else if (categoryFtkAsal == 3) {
                    $('#ftkAsalKat').text('Lebih');
                    $('#ftkAsalKat2').val('Lebih');
                }
            } else if (categoryFtkAsal == 2 && categoryFtkTujuan == 3) {
                $('#notifFtk').removeClass('d-none');
                $('#notifFtk').removeClass('bg-info');
                $('#textFtk').removeClass('d-none');
                $('#notifFtk').text('Not');
                $('#notifFtk2').val('Not');
                $('#textFtk2').val('Tdk Memenuhi');
                $('#textFtk').text('Tdk Memenuhi');
                $('#notifFtk').addClass('bg-danger');
                $('#notifFtk').show(100);
                $('#textFtk').show(100);
                $('#ftkAsalReal').text(ftkAsal);
                $('#ftkTujuanReal').text(ftkTujuan);

                if (categoryFtkTujuan == 1) {
                    $('#ftkTujuanKat').text('Kurang');
                    $('#ftkTujuanKat2').val('Kurang');
                } else if (categoryFtkTujuan == 2) {
                    $('#ftkTujuanKat').text('Sama');
                    $('#ftkTujuanKat2').val('Sama');
                } else if (categoryFtkTujuan == 3) {
                    $('#ftkTujuanKat').text('Lebih');
                    $('#ftkTujuanKat2').val('Lebih');
                }

                if (categoryFtkAsal == 1) {
                    $('#ftkAsalKat').text('Kurang');
                    $('#ftkAsalKat2').val('Kurang');
                } else if (categoryFtkAsal == 2) {
                    $('#ftkAsalKat').text('Sama');
                    $('#ftkAsalKat2').val('Sama');
                } else if (categoryFtkAsal == 3) {
                    $('#ftkAsalKat').text('Lebih');
                    $('#ftkAsalKat2').val('Lebih');
                }
            } else if (categoryFtkAsal == 3 && categoryFtkTujuan == 3) {
                $('#notifFtk').removeClass('d-none');
                $('#notifFtk').removeClass('bg-info');
                $('#textFtk').removeClass('d-none');
                $('#notifFtk').text('Not');
                $('#notifFtk2').val('Not');
                $('#textFtk2').val('Tdk Memenuhi');
                $('#textFtk').text('Tdk Memenuhi');
                $('#notifFtk').addClass('bg-danger');
                $('#notifFtk').show(100);
                $('#textFtk').show(100);
                $('#ftkAsalReal').text(ftkAsal);
                $('#ftkTujuanReal').text(ftkTujuan);

                if (categoryFtkTujuan == 1) {
                    $('#ftkTujuanKat').text('Kurang');
                    $('#ftkTujuanKat2').val('Kurang');
                } else if (categoryFtkTujuan == 2) {
                    $('#ftkTujuanKat').text('Sama');
                    $('#ftkTujuanKat2').val('Sama');
                } else if (categoryFtkTujuan == 3) {
                    $('#ftkTujuanKat').text('Lebih');
                    $('#ftkTujuanKat2').val('Lebih');
                }

                if (categoryFtkAsal == 1) {
                    $('#ftkAsalKat').text('Kurang');
                    $('#ftkAsalKat2').val('Kurang');
                } else if (categoryFtkAsal == 2) {
                    $('#ftkAsalKat').text('Sama');
                    $('#ftkAsalKat2').val('Sama');
                } else if (categoryFtkAsal == 3) {
                    $('#ftkAsalKat').text('Lebih');
                    $('#ftkAsalKat2').val('Lebih');
                }
            } else if (categoryFtkAsal == 2 && categoryFtkTujuan == 1) {
                $('#notifFtk').removeClass('d-none');
                $('#textFtk').removeClass('d-none');
                $('#notifFtk').removeClass('bg-danger');
                $('#notifFtk').text('Ok');
                $('#notifFtk2').val('Ok');
                $('#textFtk2').val('Memenuhi');
                $('#textFtk').text('Memenuhi');
                $('#notifFtk').addClass('bg-info');
                $('#notifFtk').show(100);
                $('#textFtk').show(100);
                $('#ftkAsalReal').text(ftkAsal);
                $('#ftkTujuanReal').text(ftkTujuan);
                if (categoryFtkTujuan == 1) {
                    $('#ftkTujuanKat').text('Kurang');
                    $('#ftkTujuanKat2').val('Kurang');
                } else if (categoryFtkTujuan == 2) {
                    $('#ftkTujuanKat').text('Sama');
                    $('#ftkTujuanKat2').val('Sama');
                } else if (categoryFtkTujuan == 3) {
                    $('#ftkTujuanKat').text('Lebih');
                    $('#ftkTujuanKat2').val('Lebih');
                }

                if (categoryFtkAsal == 1) {
                    $('#ftkAsalKat').text('Kurang');
                    $('#ftkAsalKat2').val('Kurang');
                } else if (categoryFtkAsal == 2) {
                    $('#ftkAsalKat').text('Sama');
                    $('#ftkAsalKat2').val('Sama');
                } else if (categoryFtkAsal == 3) {
                    $('#ftkAsalKat').text('Lebih');
                    $('#ftkAsalKat2').val('Lebih');
                }
            } else if (categoryFtkAsal == 2 && categoryFtkTujuan == 2) {
                $('#notifFtk').removeClass('d-none');
                $('#textFtk').removeClass('d-none');
                $('#notifFtk').removeClass('bg-danger');
                $('#notifFtk').text('Ok');
                $('#notifFtk2').val('Ok');
                $('#textFtk2').val('Memenuhi');
                $('#textFtk').text('Memenuhi');
                $('#notifFtk').addClass('bg-info');
                $('#notifFtk').show(100);
                $('#textFtk').show(100);
                $('#ftkAsalReal').text(ftkAsal);
                $('#ftkTujuanReal').text(ftkTujuan);
                if (categoryFtkTujuan == 1) {
                    $('#ftkTujuanKat').text('Kurang');
                    $('#ftkTujuanKat2').val('Kurang');
                } else if (categoryFtkTujuan == 2) {
                    $('#ftkTujuanKat').text('Sama');
                    $('#ftkTujuanKat2').val('Sama');
                } else if (categoryFtkTujuan == 3) {
                    $('#ftkTujuanKat').text('Lebih');
                    $('#ftkTujuanKat2').val('Lebih');
                }

                if (categoryFtkAsal == 1) {
                    $('#ftkAsalKat').text('Kurang');
                    $('#ftkAsalKat2').val('Kurang');
                } else if (categoryFtkAsal == 2) {
                    $('#ftkAsalKat').text('Sama');
                    $('#ftkAsalKat2').val('Sama');
                } else if (categoryFtkAsal == 3) {
                    $('#ftkAsalKat').text('Lebih');
                    $('#ftkAsalKat2').val('Lebih');
                }
            } else if (categoryFtkAsal == 3 && categoryFtkTujuan == 1) {
                $('#notifFtk').removeClass('d-none');
                $('#textFtk').removeClass('d-none');
                $('#notifFtk').removeClass('bg-danger');
                $('#notifFtk').text('Ok');
                $('#notifFtk2').val('Ok');
                $('#textFtk2').val('Memenuhi');
                $('#textFtk').text('Memenuhi');
                $('#notifFtk').addClass('bg-info');
                $('#notifFtk').show(100);
                $('#textFtk').show(100);
                $('#ftkAsalReal').text(ftkAsal);
                $('#ftkTujuanReal').text(ftkTujuan);
                if (categoryFtkTujuan == 1) {
                    $('#ftkTujuanKat').text('Kurang');
                    $('#ftkTujuanKat2').val('Kurang');
                } else if (categoryFtkTujuan == 2) {
                    $('#ftkTujuanKat').text('Sama');
                    $('#ftkTujuanKat2').val('Sama');
                } else if (categoryFtkTujuan == 3) {
                    $('#ftkTujuanKat').text('Lebih');
                    $('#ftkTujuanKat2').val('Lebih');
                }

                if (categoryFtkAsal == 1) {
                    $('#ftkAsalKat').text('Kurang');
                    $('#ftkAsalKat2').val('Kurang');
                } else if (categoryFtkAsal == 2) {
                    $('#ftkAsalKat').text('Sama');
                    $('#ftkAsalKat2').val('Sama');
                } else if (categoryFtkAsal == 3) {
                    $('#ftkAsalKat').text('Lebih');
                    $('#ftkAsalKat2').val('Lebih');
                }
            } else if (categoryFtkAsal == 3 && categoryFtkTujuan == 2) {
                $('#notifFtk').removeClass('d-none');
                $('#textFtk').removeClass('d-none');
                $('#notifFtk').removeClass('bg-danger');
                $('#notifFtk').text('Ok');
                $('#notifFtk2').val('Ok');
                $('#textFtk2').val('Memenuhi');
                $('#textFtk').text('Memenuhi');
                $('#notifFtk').addClass('bg-info');
                $('#notifFtk').show(100);
                $('#textFtk').show(100);
                $('#ftkAsalReal').text(ftkAsal);
                $('#ftkTujuanReal').text(ftkTujuan);
                if (categoryFtkTujuan == 1) {
                    $('#ftkTujuanKat').text('Kurang');
                    $('#ftkTujuanKat2').val('Kurang');
                } else if (categoryFtkTujuan == 2) {
                    $('#ftkTujuanKat').text('Sama');
                    $('#ftkTujuanKat2').val('Sama');
                } else if (categoryFtkTujuan == 3) {
                    $('#ftkTujuanKat').text('Lebih');
                    $('#ftkTujuanKat2').val('Lebih');
                }

                if (categoryFtkAsal == 1) {
                    $('#ftkAsalKat').text('Kurang');
                    $('#ftkAsalKat2').val('Kurang');
                } else if (categoryFtkAsal == 2) {
                    $('#ftkAsalKat').text('Sama');
                    $('#ftkAsalKat2').val('Sama');
                } else if (categoryFtkAsal == 3) {
                    $('#ftkAsalKat').text('Lebih');
                    $('#ftkAsalKat2').val('Lebih');
                }
            }
        }

        function beasppd(l, k, m) {
            // a = jumlah hari
            // b = jumlah anggota keluarga
            // c = jumlah pembantu
            // d = berat pengepakan sesuai jenjang (kg)
            // e = tarif transport per orang per jenjang
            // f = tarif transport lokal (hanya pegawai)
            // g = tarif konsumsi sesuai jenjang
            // h = tarif cuci pakaian sesuai jenjang
            // i = tarif penginapan sesuai jenjang
            // j = tarif packing per kg sesuai jenjang
            // k = jenjang
            // l = jarak antar unit
            // m = status perkawinan

            const jenisMutasi2 = $('#select2Basic8').val();

            if (l < 50 || jenisMutasi2 == 2) {
                a = 0;
            } else if (l <= 150) {
                a = 2;
            } else if (l <= 250) {
                a = 2;
            } else if (l <= 350) {
                a = 3;
            } else if (l <= 600) {
                a = 3;
            } else if (l <= 800) {
                a = 4;
            } else if (l <= 1000) {
                a = 5;
            } else if (l > 1000) {
                a = 6;
            }

            if (l < 50 || jenisMutasi2 == 2) {
                b = 0
                c = 0
                d = 0
                e = 0
                f = 0
                g = 0
                h = 0
                i = 0
                j = 0
            } else {
                if (m == 'Kawin' || m == 'Dd/Jnd') {
                    b = 3;
                    if (k == '8' || k == '9' || k == '10') {
                        d = 1100;
                    } else if (k == "11'" || k == "11" || k == "12'" || k == "12") {
                        d = 1100;
                    } else if (k == "13'" || k == "13" || k == "14'" || k == "14") {
                        d = 1100;
                    } else if (k == "15" || k == "16" || k == "17'" || k == "17") {
                        d = 1225;
                    } else if (k == "18" || k == "19" || k == "20") {
                        d = 1225;
                    } else if (k == "21" || k == "22" || k == "23") {
                        d = 1225;
                    } else if (k == "24") {
                        d = 1225;
                    }
                } else {
                    b = 0;
                    if (k == '8' || k == '9' || k == '10') {
                        d = 250;
                    } else if (k == "11'" || k == "11" || k == "12'" || k == "12") {
                        d = 250;
                    } else if (k == "13'" || k == "13" || k == "14'" || k == "14") {
                        d = 250;
                    } else if (k == "15" || k == "16" || k == "17'" || k == "17") {
                        d = 275;
                    } else if (k == "18" || k == "19" || k == "20") {
                        d = 275;
                    } else if (k == "21" || k == "22" || k == "23") {
                        d = 275;
                    } else if (k == "24") {
                        d = 275;
                    }
                }

                c = 1;

                // transportasi lokal
                f = 1000000;


                if (k == '8' || k == '9' || k == '10') {
                    e = 2000000;
                    g = 225000;
                    i = 750000;
                    j = 20000;
                } else if (k == "11'" || k == "11" || k == "12'" || k == "12") {
                    e = 2000000;
                    g = 275000;
                    i = 850000;
                    j = 20000;
                } else if (k == "13'" || k == "13" || k == "14'" || k == "14") {
                    e = 2000000;
                    g = 300000;
                    i = 1000000;
                    j = 20000;
                } else if (k == "15" || k == "16" || k == "17'" || k == "17") {
                    e = 2000000;
                    g = 350000;
                    i = 1500000;
                    j = 20000;
                } else if (k == "18" || k == "19" || k == "20") {
                    e = 3000000;
                    g = 400000;
                    i = 2000000;
                    j = 20000;
                } else if (k == "21" || k == "22" || k == "23") {
                    e = 3000000;
                    g = 450000;
                    i = 2500000;
                    j = 20000;
                } else if (k == "24") {
                    e = 3000000;
                    g = 750000;
                    i = 2750000;
                    j = 20000;
                }

                // cuci pakaian

                h = 100000;
            }

            const beaTransport = ((1 + b + c) * e) + f;
            const beaKonsumsi = a * (1 + b) * g;
            const beaCuciPakaian = (a - 1) * (1 + b) * h;
            const beaPenginapan = (a - 1) * i;
            const beaPacking = d * j;

            const total = beaTransport + beaKonsumsi + beaCuciPakaian + beaPenginapan + beaPacking;

            const data = [
                a,
                b,
                c,
                d,
                e,
                f,
                g,
                h,
                i,
                j,
                total,
                beaTransport,
                beaKonsumsi,
                beaCuciPakaian,
                beaPenginapan,
                beaPacking
            ]


            return data;

        }

        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }

        // perhitungan sppd
        const jenjabsppd = $('#pegEval').val();
        const jarakunitsppd = $('#jarakUnit').val();
        const perkawinan = $('#statusPerkawinan').val();
        const biayasppd = beasppd(jarakunitsppd, jenjabsppd, perkawinan);
        const biayasppd1 = formatNumber(biayasppd[10]);
        const biayasppdunit = biayasppd[10] * 23;
        const biayasppdunit1 = formatNumber(biayasppd[10] * 23);
        const realspdm = $('#realspdmnumber').val();
        const paguspdm = $('#paguspdmnumber').val();
        const persenRealisasi = realspdm / paguspdm;

        // console.log('jarak :' + jarakunitsppd)
        // console.log('jenjab :' + jenjabsppd)
        // console.log('status :' + perkawinan)
        // console.log('a :' + biayasppd[0])
        // console.log('b :' + biayasppd[1])
        // console.log('c :' + biayasppd[2])
        // console.log('d :' + biayasppd[3])
        // console.log('e :' + biayasppd[4])
        // console.log('f :' + biayasppd[5])
        // console.log('g :' + biayasppd[6])
        // console.log('h :' + biayasppd[7])
        // console.log('i :' + biayasppd[8])
        // console.log('j :' + biayasppd[9])
        // console.log('total :' + biayasppd[10])

        if (biayasppd[10] <= 0) {
            $('#notifsppd').removeClass('d-none');
            $('#notifsppd').removeClass('bg-danger');
            $('#notifsppd').addClass('bg-info');
            $('#notifsppd').text('Not');
            $('#notifsppd2').val('Not');
            $('#notifsppd').show(100);
            $('#textsppd').removeClass('d-none');
            $('#textsppd').text('Rp ' + biayasppd[10]);
            $('#estiSppd').text('Rp ' + biayasppd[10]);
            $('#textsppd2').val(0);
            $('#textsppd').show(100);
        } else {
            $('#notifsppd').removeClass('d-none');
            $('#notifsppd').removeClass('bg-info');
            $('#notifsppd').addClass('bg-danger');
            $('#notifsppd').text('Use');
            $('#notifsppd2').val('Use');
            $('#notifsppd').show(100);
            $('#textsppd').removeClass('d-none');
            $('#textsppd').text('Rp ' + biayasppd1);
            $('#estiSppd').text('Rp ' + biayasppd1);

            $('#textsppd2').val(biayasppd[10]);
            $('#textsppd').show(100);
        }





    });

    function kapital() {
        var x = document.getElementById("username");
        x.value = x.value.toUpperCase();
    }
</script>

<?= $this->endSection() ?>