<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Data Nilai SIMKPNAS - HTD 4</title>
<?= $this->endSection() ?>

<?= $this->section('cssheader') ?>
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/bootstrap.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/OverlayScrollbars.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/datatables.min.css" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row">
                <!-- Title Start -->
                <div class="col-12 col-md-7">
                    <h1 class="mb-0 pb-0 display-4" id="title">Master Data Nilai SIMKPNAS</h1>
                </div>
                <!-- Title End -->

                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger alert-dismissable show fade mt-3" role="alert">
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
        <!-- Title and Top Buttons End -->

        <!-- Content Start -->
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

                        </div>
                        <div class="d-inline-block">
                            <!-- Print Button Start -->
                            <a href="<?= site_url('masterdata/import_rjab') ?>" class="btn btn-icon btn-icon-only btn-foreground-alternate shadow" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-delay="0" title="Upload Data" type="button">
                                <i data-cs-icon="upload"></i>
                            </a>
                            <!-- Print Button End -->

                            <!-- Export Dropdown Start -->
                            <div class="d-inline-block datatable-export" data-datatable="#datatableRows3">
                                <?php
                                $request = \Config\Services::request();
                                $keyword = $request->getGet('keyword');
                                if ($keyword != '') {
                                    $param = "?keyword=" . $keyword;
                                } else {
                                    $param = "";
                                }
                                ?>
                                <a class="btn p-0" href="<?= site_url('masterdata/export_rjab' . $param) ?>" data-bs-offset="0,3">
                                    <span class="btn btn-icon btn-icon-only btn-foreground-alternate shadow dropdown" data-bs-delay="0" data-bs-placement="top" data-bs-toggle="tooltip" title="Export Excel">
                                        <i data-cs-icon="download"></i>
                                    </span>
                                </a>
                            </div>
                            <!-- Export Dropdown End -->

                            <!-- Length Start -->
                            <div class="dropdown-as-select d-inline-block datatable-length" data-datatable="#datatableRows" data-childSelector="span">
                                <button class="btn p-0 shadow" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-offset="0,3">
                                    <span class="btn btn-foreground-alternate dropdown-toggle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-delay="0" title="Item Count">
                                        10 Items
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
            </form>
            <!-- Table Start -->
            <div class="data-table-responsive-wrapper">
                <table id="datatableRows3" class="data-table nowrap hover">
                    <thead>
                        <tr>
                            <th class="text-muted text-small text-uppercase">No</th>
                            <th class="text-muted text-small text-uppercase">NIP</th>
                            <th class="text-muted text-small text-uppercase">Nama Pegawai</th>
                            <th class="text-muted text-small text-uppercase">Sebutan Jabatan</th>
                            <th class="text-muted text-small text-uppercase">Profesi</th>
                            <th class="text-muted text-small text-uppercase">Jenjang Jabatan</th>
                            <th class="text-muted text-small text-uppercase">HTD Area</th>
                            <th class="text-muted text-small text-uppercase">Unit Induk</th>
                            <th class="text-muted text-small text-uppercase">Unit Pelaksana</th>
                            <th class="text-muted text-small text-uppercase">Sub Unit Pelaksana</th>
                            <th class="text-muted text-small text-uppercase">Start Date</th>
                            <th class="text-muted text-small text-uppercase">End Date</th>
                            <th class="text-muted text-small text-uppercase">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $no = 1 + (5 * ($page - 1));
                        foreach ($rjab as $key => $value) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->kode_nip ?></td>
                                <td><?= $value->nama_user ?></td>
                                <td><?= $value->nama_formasi_jabatan ?></td>
                                <td><?= $value->kode_profesi_rjab ?> <?= $value->nama_riwayat_profesi ?></td>
                                <td><?= $value->jenjang_jabatan ?></td>
                                <td><?= $value->nama_org_htd ?></td>
                                <td><?= $value->nama_org_satu ?></td>
                                <td><?= $value->nama_org_dua ?></td>
                                <td><?= $value->nama_org_tiga ?></td>
                                <td><?= $value->start_date ?></td>
                                <td><?= $value->end_date ?></td>
                                <td>
                                    <div class="d-inline-block">
                                        <form action="<?= site_url('masterdata/del_rjab/' . $value->id_riwayat_jabatan) ?>" method="post" class="d-inline">
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
            <div class="row mt-2">
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
        <!-- Content End -->


        <div class="viewmodal" style="display: none;"></div>
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
<script src="<?= base_url() ?>/template/js/vendor/bootstrap-submenu.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/datatables.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/mousetrap.min.js"></script>
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
<script src="<?= base_url() ?>/template/js/cs/datatable.extend.js"></script>
<script src="<?= base_url() ?>/template/js/plugins/datatable.editablerows3.js"></script>
<script src="<?= base_url() ?>/template/js/common.js"></script>
<script src="<?= base_url() ?>/template/js/scripts.js"></script>
<!-- Page Specific Scripts End -->

<?= $this->endSection() ?>