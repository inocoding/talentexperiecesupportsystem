<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Data User</title>
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
                    <h2 class="mb-0 pb-0" id="title">Master Data User</h2>
                </div>
                <!-- Title End -->

                <!-- Top Buttons Start -->
                <div class="col-12 col-md-5 d-flex align-items-start justify-content-end">
                   
                </div>
                <!-- Top Buttons End -->
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
                            <a href="<?= site_url('masterdata/datauser') ?>" class="btn btn-icon btn-icon-only btn-foreground-alternate shadow" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-delay="0" title="Upload Data User" type="button">
                                <i data-cs-icon="upload"></i>
                            </a>
                            <a href="<?= site_url('masterdata/adduser') ?>" class="btn btn-icon btn-icon-only btn-foreground-alternate shadow" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-delay="0" title="Tambah Data User" type="button">
                                <i data-cs-icon="plus"></i>
                            </a>
                            <div class="d-inline-block datatable-export" data-datatable="#datatableRows">
                                <?php
                                $request = \Config\Services::request();
                                $keyword = $request->getGet('keyword');
                                if ($keyword != '') {
                                    $param = "?keyword=" . $keyword;
                                } else {
                                    $param = "";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Controls End -->
            </form>
            <!-- Table Start -->
            <div class="data-table-responsive-wrapper">
                <table id="datatableRows" class="data-table nowrap hover">
                    <thead>
                        <tr>
                            <th class="text-muted text-small text-uppercase">No</th>
                            <th class="text-muted text-small text-uppercase">Foto</th>
                            <th class="text-muted text-small text-uppercase">NIP</th>
                            <th class="text-muted text-small text-uppercase">Nama</th>
                            <th class="text-muted text-small text-uppercase">Unit</th>
                            <th class="text-muted text-small text-uppercase">Role HTD</th>
                            <th class="text-muted text-small text-uppercase">All Role</th>
                            <th class="text-muted text-small text-uppercase">Activation</th>
                            <th class="text-muted text-small text-uppercase">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $no = 1 + (5 * ($page - 1));
                        foreach ($user as $key => $value) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>
                                    <img src="<?=base_url()?><?=$value->foto_profile?>" class="card-img rounded-xl sh-6 sw-6" alt="thumb" />
                                </td>
                                <td><?= $value->nip ?></td>
                                <td><?= $value->nama_user ?></td>
                                <td><?= $value->nama_htd ?></td>
                                <td>
                                    <?php
                                        switch ($value->role_htd) {
                                            case 0: echo "Staf"; break;
                                            case 1: echo "Asman"; break;
                                            case 2: echo "MSB"; break;
                                            case 3: echo "VP"; break;
                                            case 4: echo "EVP"; break;
                                            case 5: echo "Non HTD"; break;
                                            default: echo "Unknown";
                                        }
                                    ?>
                                </td>
                                <td style="max-width: 250px; white-space: normal;">
                                    <span class="badge bg-outline-primary <?= $value->role_user == 1 ? "" : "d-none" ?>">Role User</span>
                                    <span class="badge bg-outline-secondary <?= $value->role_organisasi == 1 ? "" : "d-none" ?>">Role Organisasi</span>
                                    <span class="badge bg-outline-success <?= $value->role_mutasi == 1 ? "" : "d-none" ?>">Role Mutasi</span>
                                    <span class="badge bg-outline-danger <?= $value->role_komite == 1 ? "" : "d-none" ?>">Role Komite</span>
                                    <span class="badge bg-outline-warning <?= $value->role_dapeg == 1 ? "" : "d-none" ?>">Role Dapeg</span>
                                    <span class="badge bg-outline-info <?= $value->role_tugas_karya == 1 ? "" : "d-none" ?>">Role Tugas Karya</span>
                                    <span class="badge bg-outline-dark <?= $value->role_ptb == 1 ? "" : "d-none" ?>">Role PTB</span>
                                    <span class="badge bg-outline-muted <?= $value->role_pensiun_dini == 1 ? "" : "d-none" ?>">Role Pensiun Dini</span>
                                    <span class="badge bg-outline-primary <?= $value->role_resign == 1 ? "" : "d-none" ?>">Role Resign</span>
                                    <span class="badge bg-outline-secondary <?= $value->role_mpp == 1 ? "" : "d-none" ?>">Role MPP</span>
                                    <span class="badge bg-outline-tertiary <?= $value->role_ojt == 1 ? "" : "d-none" ?>">Role OJT</span>
                                    <span class="badge bg-outline-success <?= $value->role_idt == 1 ? "" : "d-none" ?>">Role IDT</span>
                                    <span class="badge bg-outline-danger <?= $value->role_aps == 1 ? "" : "d-none" ?>">Role APS</span>
                                    <span class="badge bg-outline-warning <?= $value->role_fnp_admin == 1 ? "" : "d-none" ?>">Role Admin FnP</span>
                                    <span class="badge bg-outline-info <?= $value->role_admin_komite == 1 ? "" : "d-none" ?>">Role Admin Komite</span>
                                    <span class="badge bg-outline-dark <?= $value->role_fnp_penguji == 1 ? "" : "d-none" ?>">Role Penguji FnP</span>
                                </td>
                                <td><?= $value->ket_aktif == 1 ? "Aktif": "Belum Aktif" ?></td>
                                <td>
                                    <a href="<?= site_url('masterdata/users/'.$value->nip.'/edit') ?>" class="btn btn-icon btn-icon-only btn-foreground hover-outline mb-1" type="button">
                                        <i data-cs-icon="edit"></i>
                                    </a>
                                    <form action="<?= site_url('masterdata/users/'.$value->nip.'/delete') ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin akan menghapus user ini?')">
                                        <?= csrf_field() ?>
                                        <button class="btn btn-icon btn-icon-only btn-foreground hover-outline mb-1">
                                            <i data-cs-icon="bin"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="float-right">
                        <i>Showing <?= 1 + (10 * ($page - 1)); ?> to <?= $no - 1 ?> of <?= $pager->getTotal() ?> entries</i>
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
<script src="<?= base_url() ?>/template/js/plugins/datatable.editablerowsuser.js"></script>
<script src="<?= base_url() ?>/template/js/common.js"></script>
<script src="<?= base_url() ?>/template/js/scripts.js"></script>
<!-- Page Specific Scripts End -->

<?= $this->endSection() ?>