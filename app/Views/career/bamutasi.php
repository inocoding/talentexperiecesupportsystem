<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>BA Mutasi</title>
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
            <h2 class="small-title mt-2">Berita Acara Mutasi</h2>
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


    <div class="card mb-5">
        <div class="card-body">
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
                                <button class="btn btn-icon btn-icon-only btn-foreground-alternate shadow" type="button" data-bs-toggle="modal" data-bs-target="#semiFullExample" data-bs-delay="0" id="buttonAdd">
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
                                <th class="text-muted text-small text-uppercase">Nomor Ba</th>
                                <th class="text-muted text-small text-uppercase">Judul Ba</th>
                                <th class="text-muted text-small text-uppercase">Tanggal Ba</th>
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
                                    <td><?= $value->nomor_ba ?></td>
                                    <td><?= $value->judul_ba ?></td>
                                    <td><?= $value->tgl_ba ?></td>
                                    <td>
                                        <div class="d-inline-block text-center">
                                            <form action="<?= site_url('career/del_ba/' . $value->id_ba) ?>" method="post" class="d-inline">
                                                <?= csrf_field() ?>
                                                <a class="btn btn-icon btn-icon-only btn-foreground-alternate" href="<?= site_url('career/exportba/' . $value->id_ba) ?>" data-bs-offset="0,3">
                                                    <i data-cs-icon="download"></i>
                                                </a>
                                                <!-- <a class="btn btn-icon btn-icon-only btn-foreground-alternate disabled" href="<?= site_url('career/exportpdf/' . $value->id_ba) ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf">
                                                    <i data-cs-icon="file-empty"></i>
                                                </a> -->
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
                            <i>Showing <?= 1 + (5 * ($page - 1)); ?> to <?= $no - 1 ?> of entries</i>
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
    </div>
</section>

<div class="modal fade" id="semiFullExample" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Berita Acara Mutasi </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= site_url('career/createba') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="inputAddress2" class="form-label">Nomor BA</label>
                            <input name="nomor_ba" type="text" class="form-control" />
                        </div>
                        <div class="col-md-6">
                            <label for="inputAddress2" class="form-label">Judul BA</label>
                            <input name="judul_ba" type="text" class="form-control" />
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Tanggal BA</label>
                            <input type="date" name="tgl_ba" class="form-control" />
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Jumlah Pegawai</label>
                            <input id="getDataa" type="number" name="jml_peg_ba" class="form-control" />
                            <input id="" type="hidden" name="ba_oleh" class="form-control" value="<?= userLogin()->nip ?>" />
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="inputPassword4" class="form-label">Left Signature</label>
                            <div class="input-group">
                                <select name="left_sign_ba" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                    <option selected>Choose...</option>
                                    <option value="Andrisa">Andrisa</option>
                                    <option value="Diah Dayanti">Diah Dayanti</option>
                                    <option value="Gregorius Helmy Widyapamungkas">Gregorius Helmy Widyapamungkas</option>
                                    <option value="Dedi Budi Utomo">Dedi Budi Utomo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="inputPassword4" class="form-label">Right Signature</label>
                            <div class="input-group">
                                <select name="right_sign_ba" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                    <option selected>Choose...</option>
                                    <option value="Andrisa">Andrisa</option>
                                    <option value="Diah Dayanti">Diah Dayanti</option>
                                    <option value="Gregorius Helmy Widyapamungkas">Gregorius Helmy Widyapamungkas</option>
                                    <option value="Dedi Budi Utomo">Dedi Budi Utomo</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="col-12 mt-5">
                            <label for="inputPassword4" class="form-label">Data Pegawai BA</label>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Jenis Mutasi</th>
                                            <th>Unit Asal</th>
                                            <th>Unit Tujuan</th>
                                            <th>Hasil Evaluasi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="d-none" id="tbDataPeg">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Buat Berita Acara Mutasi</button>
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
<script src="<?= base_url() ?>/template/js/plugins/datatable.editablerows35.js"></script>
<script src="<?= base_url() ?>/template/js/common.js"></script>
<script src="<?= base_url() ?>/template/js/scripts.js"></script>
<!-- Page Specific Scripts End -->

<script>
    console.log('aman');
    $('#getDataa').on('change', function() {
        $.ajax({
            url: "<?= site_url('career/get_peg_ba') ?>",
            dataType: "json",
            success: function(res) {
                $('#tbDataPeg').removeClass('d-none');
                $('#tbDataPeg').show(100);
                $("#tbDataPeg").html(res);
            }
        })
    })
</script>

<?= $this->endSection() ?>