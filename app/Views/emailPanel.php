<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>PCS</title>
<?= $this->endSection() ?>

<?= $this->section('cssheader') ?>
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/bootstrap.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/OverlayScrollbars.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/select2.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/select2-bootstrap4.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/bootstrap-datepicker3.standalone.min.css" />
<link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/tagify.css" />
<style>
    ::-webkit-scrollbar {
        width: 5px;
    }

    ::-webkit-scrollbar-track {
        background: #146173;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background: #35A9DB;
        border-radius: 10px;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="page-title-container">
    <div class="row">
        <!-- Title Start -->
        <div class="col-12 col-md-7">
            <h4 class="mb-0 pb-0" id="title">Email Panels</h4>
        </div>
        <!-- Title End -->
    </div>
</div>

<p>halaman pcs</p>
<div class="row">
    <div class="col-12 ">
        <div class="card mb-5 overflow-auto" style="min-height: 400px;">
            <div class="card-header border-0 pb-0">
                <ul class="nav nav-tabs nav-tabs-line card-header-tabs responsive-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#first" role="tab" type="button" aria-selected="true">
                            Search Form
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#second" role="tab" type="button" aria-selected="false">Add Mail</button>
                    </li>
                    <!-- An empty list to put overflowed links -->
                    <li class="nav-item dropdown ms-auto pe-0 d-none responsive-tab-dropdown">
                        <button class="btn btn-icon btn-icon-only btn-foreground mt-2" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-cs-icon="more-horizontal"></i>
                        </button>
                        <ul class="dropdown-menu mt-2 dropdown-menu-end"></ul>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="first" role="tabpanel">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">email</th>
                                    <th scope="col">user</th>
                                    <th scope="col">password</th>
                                    <th scope="col">disk quota</th>
                                    <th scope="col">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($result as $key => $value) : ?>
                                    <tr class="<?= $value->{'email'} == 'admin@meeqod.com' || $value->{'email'} == 'u1583031' ? "d-none" : "null" ?>">
                                        <td id="<?= $value->{'user'} ?>"><?= $value->{'email'} ?></td>
                                        <td><?= $value->{'user'} ?></td>
                                        <td class="<?= $value->{'user'} ?>">*****</td>
                                        <td><?= $value->{'diskusedpercent'} ?>% / <?= $value->{'diskquota'} ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="https://<?= $value->{'domain'} ?>/webmail" target="_blank" class="btn btn-sm btn-icon btn-icon-only btn-info mb-1" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Buka Email">
                                                    <i data-cs-icon="inbox"></i>
                                                </a>
                                                <button class="btn btn-sm btn-icon btn-icon-only btn-warning mb-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Password" id="btn<?= $value->{'user'} ?>">
                                                    <i data-cs-icon="search"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="second" role="tabpanel">
                        <div class="d-grid gap-2 col-6 mx-auto mb-3">
                            <form class="card mb-5 tooltip-end-top" action="<?= site_url('emailhosting/add') ?>" method="POST">
                                <?= csrf_field() ?>
                                <div class="input-group mb-3">
                                    <input name="name" type="text" class="form-control" placeholder="user email" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                                    <span class="input-group-text" id="basic-addon2">@pesantrenkeluarga.com</span>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i data-cs-icon="key"></i></span>
                                    <input name="password" type="text" class="form-control" placeholder="password" aria-label="Username" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group mb-3">
                                    <input name="quota" type="number" class="form-control" placeholder="quota email" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                                    <span class="input-group-text" id="basic-addon2">MB</span>
                                    <input type="hidden" name="domain" value="pesantrenkeluarga.com">
                                </div>
                                <div class="row">
                                    <button type="submit" class=" btn btn-icon btn-md btn-warning mb-1 float-end" data-bs-toggle="tooltip" data-bs-placement="top" title="Simpan">
                                        <i data-cs-icon="save"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
<script src="<?= base_url() ?>/template/js/vendor/select2.full.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/tagify.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/datepicker/locales/bootstrap-datepicker.es.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/jquery.validate/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>/template/js/vendor/jquery.validate/additional-methods.min.js"></script>
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
<script src="<?= base_url() ?>/template/js/common.js"></script>
<script src="<?= base_url() ?>/template/js/scripts.js"></script>
<!-- Page Specific Scripts End -->

<script>
    <?php foreach ($result as $key => $value) : ?>
        $('#btn<?= $value->{'user'} ?>').click(function() {
            const selectedMail = $('#<?= $value->{'user'} ?>').html();
            // console.log(selectedMail);
            $.ajax({
                url: "<?= site_url('emailhosting/get_password/') ?>" + selectedMail,
                dataType: "json",
                success: function(res) {
                    $(".<?= $value->{'user'} ?>").html(res)
                }
            })
        });
    <?php endforeach; ?>
</script>


<?= $this->endSection() ?>