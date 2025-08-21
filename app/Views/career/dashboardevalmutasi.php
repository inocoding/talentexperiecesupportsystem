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
        <div class="btn-group">
            <h2 class="small-title mt-2">Dashboard Evaluasi Mutasi</h2>
        </div>
    </div>
</div>
<div class="page-title-container" style="margin-top: -30px;">
    <div class="row">
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissable show fade mt-3" role="alert">
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
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

<section class="scroll-section">
    <!-- Responsive Tabs with Line Title Start -->
    <ul class="nav nav-tabs nav-tabs-title nav-tabs-line-title responsive-tabs" id="lineTitleTabsContainer" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" data-bs-toggle="tab" href="#firstLineTitleTab" role="tab" aria-selected="false">Unit</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" data-bs-toggle="tab" href="#secondLineTitleTab" role="tab" aria-selected="true">Permohonan</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" data-bs-toggle="tab" href="#thirdLineTitleTab" role="tab" aria-selected="false">SLA</a>
        </li>
        <!-- An empty list to put overflowed links -->
        <li class="nav-item dropdown ms-auto pe-0 d-none responsive-tab-dropdown">
            <a class="btn btn-icon btn-icon-only btn-background pt-0 bg-transparent pe-0" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i data-acorn-icon="more-horizontal"></i>
            </a>
            <ul class="dropdown-menu mt-2 dropdown-menu-end"></ul>
        </li>
    </ul>

    <div class="card mb-5">
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade " id="firstLineTitleTab" role="tabpanel">
                    <h5 class="card-title">Unit</h5>
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
                                    <div class="d-inline-block me-0 me-sm-3 float-start float-md-none">
                                        <!-- Add Button Start -->
                                        <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow" type="button" data-bs-toggle="modal" data-bs-target="#semiFullExample" data-bs-delay="0">
                                            <i data-cs-icon="plus"></i>
                                        </button>
                                        <!-- Add Button End -->

                                    </div>
                                </div>
                            </div>
                            <!-- Controls End -->
                        </form>
                        <!-- Table Start -->
                        <div class="data-table-responsive-wrapper">
                            <table id="datatableRowsdeval" class="data-table nowrap hover">
                                <thead>
                                    <tr>
                                        <th class="text-muted text-small text-uppercase" style="width: 3rem;">No</th>
                                        <th class="text-muted text-small text-uppercase text-wrap" style="width: 3rem;">Nomor Surat/ND</th>
                                        <th class="text-muted text-small text-uppercase" style="width: 3rem;">Dari</th>
                                        <th class="text-muted text-small text-uppercase">Jml</th>
                                        <th class="text-muted text-small text-uppercase text-wrap" style="width: 3rem;">Eval PIC</th>
                                        <th class="text-muted text-small text-uppercase text-wrap" style="width: 3rem;">Eval MSB</th>
                                        <th class="text-muted text-small text-uppercase text-wrap" style="width: 3rem;">Eval VP</th>
                                        <th class="text-muted text-small text-uppercase">Lanjut</th>
                                        <th class="text-muted text-small text-uppercase" style="width: 3rem;">Tdk Lanjut</th>
                                        <th class="text-muted text-small text-uppercase">Jawaban</th>
                                        <th class="text-muted text-small text-uppercase">Konfirmasi</th>
                                        <th class="text-muted text-small text-uppercase">Disetujui</th>
                                        <th class="text-muted text-small text-uppercase" style="width: 3rem;">Cetak SK</th>
                                        <th class="text-muted text-small text-uppercase">Action</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: smaller;">
                                    <?php
                                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $no = 1 + (5 * ($page - 1));
                                    foreach ($user as $key => $value) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td class="text-wrap text-break" style="width: 2rem;"><?= $value->no_dm ?></td>
                                            <td class="text-wrap text-break" style="width: 2rem;"><?= $value->asal_dm ?></td>
                                            <td><?= $value->jml_usulan ?></td>
                                            <td id="dataa<?= $value->id_dm ?>"></td>
                                            <td id="datab<?= $value->id_dm ?>"></td>
                                            <td id="datac<?= $value->id_dm ?>"></td>
                                            <td id="datad<?= $value->id_dm ?>"></td>
                                            <td id="datae<?= $value->id_dm ?>"></td>
                                            <td id="dataf<?= $value->id_dm ?>"></td>
                                            <td id="datag<?= $value->id_dm ?>"></td>
                                            <td id="datah<?= $value->id_dm ?>"></td>
                                            <td id="datai<?= $value->id_dm ?>"></td>
                                            <td>
                                                <div class="d-inline-block text-center">
                                                    <form action="<?= site_url('career/del_dm/' . $value->id_dm) ?>" method="post" class="d-inline">
                                                        <?= csrf_field() ?>
                                                        <button type="submit" class="btn btn-icon btn-icon-only btn-foreground-alternate" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="return confirm('Apakah anda yakin menghapus data ini?')">
                                                            <i data-cs-icon="bin"></i>
                                                        </button>
                                                    </form>
                                                </div>
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
                </div>
                <div class="tab-pane fade active show" id="secondLineTitleTab" role="tabpanel">
                    <h5 class="card-title">Permohonan</h5>
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
                                    <div class="d-inline-block me-0 me-sm-3 float-start float-md-none">
                                        <!-- Add Button Start -->
                                        <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow" type="button" data-bs-toggle="modal" data-bs-target="#semiFullExample" data-bs-delay="0">
                                            <i data-cs-icon="plus"></i>
                                        </button>
                                        <!-- Add Button End -->

                                    </div>
                                </div>
                            </div>
                            <!-- Controls End -->
                        </form>
                        <!-- Table Start -->
                        <div class="data-table-responsive-wrapper">
                            <table id="datatableRowsdeval" class="data-table nowrap hover">
                                <thead>
                                    <tr>
                                        <th class="text-muted text-small text-uppercase" style="width: 3rem;">No</th>
                                        <th class="text-muted text-small text-uppercase text-wrap" style="width: 3rem;">Nomor Surat/ND</th>
                                        <th class="text-muted text-small text-uppercase" style="width: 3rem;">Dari</th>
                                        <th class="text-muted text-small text-uppercase">Jml</th>
                                        <th class="text-muted text-small text-uppercase text-wrap" style="width: 3rem;">Eval PIC</th>
                                        <th class="text-muted text-small text-uppercase text-wrap" style="width: 3rem;">Eval MSB</th>
                                        <th class="text-muted text-small text-uppercase text-wrap" style="width: 3rem;">Eval VP</th>
                                        <th class="text-muted text-small text-uppercase">Lanjut</th>
                                        <th class="text-muted text-small text-uppercase" style="width: 3rem;">Tdk Lanjut</th>
                                        <th class="text-muted text-small text-uppercase">Jawaban</th>
                                        <th class="text-muted text-small text-uppercase">Konfirmasi</th>
                                        <th class="text-muted text-small text-uppercase">Disetujui</th>
                                        <th class="text-muted text-small text-uppercase" style="width: 3rem;">Cetak SK</th>
                                        <th class="text-muted text-small text-uppercase">Action</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: smaller;">
                                    <?php
                                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $no = 1 + (5 * ($page - 1));
                                    foreach ($user as $key => $value) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td class="text-wrap text-break" style="width: 2rem;"><?= $value->no_dm ?></td>
                                            <td class="text-wrap text-break" style="width: 2rem;"><?= $value->asal_dm ?></td>
                                            <td><?= $value->jml_usulan ?></td>
                                            <td id="dataa<?= $value->id_dm ?>"></td>
                                            <td id="datab<?= $value->id_dm ?>"></td>
                                            <td id="datac<?= $value->id_dm ?>"></td>
                                            <td id="datad<?= $value->id_dm ?>"></td>
                                            <td id="datae<?= $value->id_dm ?>"></td>
                                            <td id="dataf<?= $value->id_dm ?>"></td>
                                            <td id="datag<?= $value->id_dm ?>"></td>
                                            <td id="datah<?= $value->id_dm ?>"></td>
                                            <td id="datai<?= $value->id_dm ?>"></td>
                                            <td>
                                                <div class="d-inline-block text-center">
                                                    <form action="<?= site_url('career/del_dm/' . $value->id_dm) ?>" method="post" class="d-inline">
                                                        <?= csrf_field() ?>
                                                        <button type="submit" class="btn btn-icon btn-icon-only btn-foreground-alternate" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="return confirm('Apakah anda yakin menghapus data ini?')">
                                                            <i data-cs-icon="bin"></i>
                                                        </button>
                                                    </form>
                                                </div>
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
                </div>
                <div class="tab-pane fade" id="thirdLineTitleTab" role="tabpanel">
                    <h5 class="card-title">Chart</h5>
                    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                    <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_4s3kvfcn.json" mode="bounce" background="transparent" speed="1" style="width: 1000px; height: 600px; margin-left: 165px;" loop autoplay></lottie-player>
                    <div class="row">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="semiFullExample" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Dasar Mutasi </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= site_url('career/adddm/1') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="inputPassword4" class="form-label">Jenis</label>
                            <div class="input-group">
                                <select name="jenis_dm" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
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
                            <input type="date" name="tgl_dm" class="form-control" />
                        </div>
                        <div class="col-md-4">
                            <label for="inputAddress2" class="form-label">Tanggal Disposisi</label>
                            <input type="date" name="tgl_dispo_dm" class="form-control" />
                        </div>
                        <div class="col-md-4">
                            <label for="inputAddress2" class="form-label mt-2">Nomor Dasar Mutasi</label>
                            <input name="no_dm" type="text" class="form-control" />
                        </div>
                        <div class="col-md-8">
                            <label for="inputAddress2" class="form-label mt-2">Perihal</label>
                            <input name="perihal_dm" type="text" class="form-control" />
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress2" class="form-label mt-2">Dari</label>
                            <input name="asal_dm" type="text" class="form-control" />
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress2" class="form-label mt-2">Kepada</label>
                            <input name="tujuan_dm" type="text" class="form-control" />
                        </div>
                        <div class="col-md-12">
                            <label for="inputAddress2" class="form-label mt-2">Jml Usulan/Kebutuhan</label>
                            <input name="jml_usulan" type="number" class="form-control" />
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
<!-- Responsive Tabs with Line Title End -->
</section>

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
<script src="<?= base_url() ?>/template/js/plugins/datatable.editablerowsdashevalmutasi.js"></script>
<script src="<?= base_url() ?>/template/js/common.js"></script>
<script src="<?= base_url() ?>/template/js/scripts.js"></script>
<!-- Page Specific Scripts End -->

<script>
    $(document).ready(function() {
        function dashboardeval() {

            $.ajax({
                url: "<?= site_url('career/get_dm_count') ?>",
                dataType: "json",
                success: function(res) {
                    const a = 3;

                    for (let i = a; i < (res + a); i++) {
                        // $('#dataa' + i).text(i);
                        $.ajax({
                            url: "<?= site_url('career/countevalpic/') ?>" + i + "/1",
                            dataType: "json",
                            success: function(res) {
                                $('#dataa' + i).text(res);
                            }
                        })

                        $.ajax({
                            url: "<?= site_url('career/countevalpic/') ?>" + i + "/2",
                            dataType: "json",
                            success: function(res) {
                                $('#datab' + i).text(res);
                            }
                        })

                        $.ajax({
                            url: "<?= site_url('career/countevalpic/') ?>" + i + "/3",
                            dataType: "json",
                            success: function(res) {
                                $('#datac' + i).text(res);
                            }
                        })

                        $.ajax({
                            url: "<?= site_url('career/countevalpic/') ?>" + i + "/4",
                            dataType: "json",
                            success: function(res) {
                                $('#datad' + i).text(res);
                            }
                        })

                        $.ajax({
                            url: "<?= site_url('career/countevalpic/') ?>" + i + "/5",
                            dataType: "json",
                            success: function(res) {
                                $('#datae' + i).text(res);
                            }
                        })

                        $.ajax({
                            url: "<?= site_url('career/countevalpic/') ?>" + i + "/6",
                            dataType: "json",
                            success: function(res) {
                                $('#dataf' + i).text(res);
                            }
                        })

                        $.ajax({
                            url: "<?= site_url('career/countevalpic/') ?>" + i + "/7",
                            dataType: "json",
                            success: function(res) {
                                $('#datag' + i).text(res);
                            }
                        })

                        $.ajax({
                            url: "<?= site_url('career/countevalpic/') ?>" + i + "/8",
                            dataType: "json",
                            success: function(res) {
                                $('#datah' + i).text(res);
                            }
                        })

                        $.ajax({
                            url: "<?= site_url('career/countevalpic/') ?>" + i + "/9",
                            dataType: "json",
                            success: function(res) {
                                $('#datai' + i).text(res);
                            }
                        })
                    }


                }
            })

        }
        window.onload = dashboardeval;
    })
</script>

<?= $this->endSection() ?>