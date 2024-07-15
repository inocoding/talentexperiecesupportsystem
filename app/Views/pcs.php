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
            <h4 class="mb-0 pb-0" id="title">PCS</h4>
        </div>
        <!-- Title End -->
    </div>
</div>
<!-- Title and Top Buttons End -->

<!-- Content Start -->
<p>halaman pcs</p>
<div class="row">
    <div class="col-12 col-sm-6 ">
        <div class="card mb-5 overflow-auto" style="min-height: 400px;">
            <div class="card-header border-0 pb-0">
                <ul class="nav nav-tabs nav-tabs-line card-header-tabs responsive-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#first" role="tab" type="button" aria-selected="true">
                            Search Form
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#second" role="tab" type="button" aria-selected="false">Search All</button>
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
                        <form class="row gx-3 gy-2 align-items-center mb-2">
                            <label class="visually" for="specificSizeSelect" style="margin-bottom: -5px;">HTD Area</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="contactDepartment">
                                    <option label="&nbsp;"></option>
                                    <?php foreach ($org_htd as $key => $value) : ?>
                                        <option value="<?= $value->kode_org_htd ?>"><?= $value->kode_org_htd ?>, <?= $value->nama_org_htd ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Lihat</button>
                            </div>
                        </form>
                        <form class="row gx-3 gy-2 align-items-center mb-2">
                            <label class="visually" for="specificSizeSelect" style="margin-bottom: -5px;">Unit Induk</label>
                            <div class="col-sm-10">
                                <select class="form-select unitInduk" id="contactUnitinduk" name="unit_induk">
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Lihat</button>
                            </div>
                        </form>
                        <form class="row gx-3 gy-2 align-items-center mb-2">
                            <label class="visually" for="specificSizeSelect" style="margin-bottom: -5px;">Unit Pelaksana</label>
                            <div class="col-sm-10">
                                <select class="form-select unitPelaksana" id="contactUnitpelaksana" name="unit_pelaksana">
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Lihat</button>
                            </div>
                        </form>
                        <div class="row gx-3 gy-2 align-items-center mb-2">
                            <label class="visually" for="specificSizeSelect" style="margin-bottom: -5px;">Sub Unit Pelaksana</label>
                            <div class="col-sm-10">
                                <select class="form-select subunitpelaksana" id="contactSubunitpelaksana" name="sub_unit_pelaksana">
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary" id="tombolCari">Lihat</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="second" role="tabpanel">
                        <div class="d-grid gap-2 col-6 mx-auto mb-3">
                            <button class="btn btn-primary" type="button" id="tombolCariKosong">Cari Jabatan Kosong</button>
                            <button class="btn btn-primary" type="button" id="tombolCariDiatas4">Cari Jabatan Durasi Lebih dari 4 Tahun</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 ">
        <div class="card mb-5 " style="min-height: 400px; max-height: 400px;">
            <div class="card-header">
                <h5 class="float-start">Hasil Pencarian</h5>
                <button class="float-end btn btn-sm btn-icon btn-icon-only btn-outline-light" id="clear">
                    <i data-cs-icon="refresh-horizontal"></i>
                </button>
            </div>
            <div class="card-body overflow-auto">
                <div class="d-none" id="tabel1">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Sebutan Jabatan</th>
                                <th scope="col">Nama Pejabat</th>
                                <th scope="col">Durasi</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <th scope="row">1</th>
                                <td>Manager ULP Balikpapan Utara</td>
                                <td>Yuman Amirudin Sriwardaya</td>
                                <td>0 th 3 bln</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-info" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cari Kandidat">
                                            <i data-cs-icon="user"></i>
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-warning" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cari Posisi">
                                            <i data-cs-icon="destination"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>PLT Supervisor Teknik</td>
                                <td>Hezron Saranga</td>
                                <td>0 th 1 bln</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-info" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cari Kandidat">
                                            <i data-cs-icon="user"></i>
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-warning" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cari Posisi">
                                            <i data-cs-icon="destination"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="">
                                <th scope="row">3</th>
                                <td>Supervisor PP dan Adm</td>
                                <td>Eka Fikri Masyhuri</td>
                                <td>1 th 2 bln</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-info" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cari Kandidat">
                                            <i data-cs-icon="user"></i>
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-warning" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cari Posisi">
                                            <i data-cs-icon="destination"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="table-active">
                                <th scope="row">4</th>
                                <td>Supervisor TE</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-info" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cari Kandidat" id="cariKandidat1">
                                            <i data-cs-icon="user"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="">
                                <th scope="row">5</th>
                                <td>PJ K3L</td>
                                <td>Imam Muhklisin</td>
                                <td>1 th 2 bln</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-info mb-1" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cari Kandidat">
                                            <i data-cs-icon="user"></i>
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-warning" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cari Posisi">
                                            <i data-cs-icon="destination"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-none" id="tabel2">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Sebutan Jabatan</th>
                                <th scope="col">SUP</th>
                                <th scope="col">UP</th>
                                <th scope="col">UI</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <th scope="row">1</th>
                                <td>Manajer ULP Samboja</td>
                                <td>ULP Samboja</td>
                                <td>UP3 Balikpapan</td>
                                <td>UIW Kaltimra</td>
                                <td>
                                    <button class="btn btn-sm btn-icon btn-icon-only btn-info mb-1" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cari Kandidat">
                                        <i data-cs-icon="user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Supervisor Teknik</td>
                                <td>ULP Longikis</td>
                                <td>UP3 Balikpapan</td>
                                <td>UIW Kaltimra</td>
                                <td>
                                    <button class="btn btn-sm btn-icon btn-icon-only btn-info mb-1" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cari Kandidat">
                                        <i data-cs-icon="user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="">
                                <th scope="row">3</th>
                                <td>Supervisor Pelayanan Pelanggan</td>
                                <td>ULP Tenggarong</td>
                                <td>UP3 Samarinda</td>
                                <td>UIW Kaltimra</td>
                                <td>
                                    <button class="btn btn-sm btn-icon btn-icon-only btn-info mb-1" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cari Kandidat">
                                        <i data-cs-icon="user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="">
                                <th scope="row">4</th>
                                <td>Supervisor Transaksi Energi</td>
                                <td>ULP Balikpapan Utara</td>
                                <td>UP3 Balikpapan</td>
                                <td>UIW Kaltimra</td>
                                <td>
                                    <button class="btn btn-sm btn-icon btn-icon-only btn-info mb-1" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cari Kandidat">
                                        <i data-cs-icon="user"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-none" id="tabel3">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Pejabat</th>
                                <th scope="col">Sebutan Jabatan</th>
                                <th scope="col">Durasi</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <th scope="row">1</th>
                                <td>Nur Hakim</td>
                                <td>Manager UP2K Kaltara</td>
                                <td>4 th 0 bln</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-warning" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cari Posisi">
                                            <i data-cs-icon="destination"></i>
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-info mb-1" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                            <i data-cs-icon="tag"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Retno Wulandari</td>
                                <td>Supervisor Transaksi Energi Listrik</td>
                                <td>5 th 3 bln</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-warning" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cari Posisi" id="tombolCariPosisi">
                                            <i data-cs-icon="destination"></i>
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-info mb-1" type="button" data-bs-toggle="modal" data-bs-placement="top" title="Detail">
                                            <i data-cs-icon="tag"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card mb-5 " style="min-height: 400px; max-height: 600px;">
            <div class="card-header">
                <h5 class="float-start d-block" id="titleCard">Hasil Pencarian Kandidat/Posisi</h5>
                <h5 class="float-start d-none" id="titleCard4">Hasil Pencarian Kandidat Supervisor Transaksi Energi ULP Balikpapan Utara</h5>
                <button class="float-end btn btn-sm btn-icon btn-icon-only btn-outline-light" id="clearhpk">
                    <i data-cs-icon="refresh-horizontal"></i>
                </button>
            </div>
            <div class="card-body overflow-auto">
                <h5 class="float-start header-title d-none" id="titleTabel4">Skema Promosi</h5>
                <div class="d-none" id="tabel4">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Rangking</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Jabatan Sekarang</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <th scope="row">1</th>
                                <td>JONCIUS TOP LUMBAN RAJA</td>
                                <td>8909023D2</td>
                                <td>ASSISTANT ENGINEER PENGENDALIAN APP</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-info mb-1" type="button" data-bs-placement="top" title="Detail" data-bs-toggle="modal" data-bs-target="#overlayScrollLong">
                                            <i data-cs-icon="tag"></i>
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-primary mb-1" type="button" data-bs-toggle="modal" data-bs-target="#kirimDraft1modal" id="kirimDraft1" data-bs-placement="top" title="Kirim ke Draft Gerbong Suksesi">
                                            <i data-cs-icon="chevron-right"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>TRI HADIYANTO</td>
                                <td>9009039D2</td>
                                <td>ASSISTANT ANALYST PENGELOLAAN REKENING DAN PEMBACAAN METER</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-info mb-1" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                            <i data-cs-icon="tag"></i>
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-primary mb-1" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Kirim ke Draft Gerbong Suksesi">
                                            <i data-cs-icon="chevron-right"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="">
                                <th scope="row">3</th>
                                <td>VARIAN IDRAKI</td>
                                <td>9316333ZY</td>
                                <td>ASSISTANT ANALYST PENGELOLAAN REKENING DAN PEMBACAAN METER</td>
                                <td width="200px">
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-info mb-1" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                            <i data-cs-icon="tag"></i>
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-primary mb-1" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Kirim ke Draft Gerbong Suksesi">
                                            <i data-cs-icon="chevron-right"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h5 class="float-start header-title d-none" id="titleTabel5">Skema Rotasi</h5>
                <div class="d-none" id="tabel5">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Rangking</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Jabatan Sekarang</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <th scope="row">1</th>
                                <td>HARYO PRATIKTO</td>
                                <td>8915329ZY</td>
                                <td>SUPERVISOR TRANSAKSI ENERGI</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-info mb-1" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                            <i data-cs-icon="tag"></i>
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-primary mb-1" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Kirim ke Draft Gerbong Suksesi">
                                            <i data-cs-icon="chevron-right"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>SADDAM HARIS</td>
                                <td>9110041D2</td>
                                <td>SUPERVISOR TRANSAKSI ENERGI</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-info mb-1" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                            <i data-cs-icon="tag"></i>
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-primary mb-1" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Kirim ke Draft Gerbong Suksesi">
                                            <i data-cs-icon="chevron-right"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="">
                                <th scope="row">3</th>
                                <td>MUHAMMAD RIDUAN</td>
                                <td>9216200ZY</td>
                                <td>SUPERVISOR TRANSAKSI ENERGI</td>
                                <td width="200px">
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-info mb-1" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                            <i data-cs-icon="tag"></i>
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-primary mb-1" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Kirim ke Draft Gerbong Suksesi">
                                            <i data-cs-icon="chevron-right"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h5 class="float-start header-title d-none" id="titleTabel6">Skema Rotasi</h5>
                <div class="d-none" id="tabel6">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Posisi</th>
                                <th scope="col">Pejabat Sekarang</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Sub Unit Pelaksana</th>
                                <th scope="col">Unit Pelaksana</th>
                                <th scope="col">Durasi</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <th scope="row">1</th>
                                <td>SUPERVISOR TRANSAKSI ENERGI</td>
                                <td>HARYO PRATIKTO</td>
                                <td>8915329ZY</td>
                                <td>ULP Kota Bangun</td>
                                <td>UP3 Samarinda</td>
                                <td>3 Th 5 Bln</td>
                                <td>
                                    <div class="btn-group">

                                        <button class="btn btn-sm btn-icon btn-icon-only btn-primary mb-1" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Kirim ke Draft Gerbong Suksesi">
                                            <i data-cs-icon="chevron-right"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="">
                                <th scope="row">2</th>
                                <td>SUPERVISOR TRANSAKSI ENERGI</td>
                                <td>HARYO PRATIKTO</td>
                                <td>8915329ZY</td>
                                <td>ULP Kota Bangun</td>
                                <td>UP3 Samarinda</td>
                                <td>3 Th 5 Bln</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-primary mb-1" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Kirim ke Draft Gerbong Suksesi">
                                            <i data-cs-icon="chevron-right"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card mb-5 " style="min-height: 400px; max-height: 400px;">
            <div class="card-header">
                <h5 class="float-start">Draft Peserta Fit & Proper Test atau Interview</h5>
                <button class="float-end btn btn-sm btn-icon btn-icon-only btn-outline-light" id="clear">
                    <i data-cs-icon="refresh-horizontal"></i>
                </button>
            </div>
            <div class="card-body overflow-auto">
                <div class="d-none" id="tabelfnp">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Jabatan Proyeksi</th>
                                <th scope="col">Jenjang Jabatan</th>
                                <th scope="col">Business Stream</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Jadwal</th>
                                <th scope="col">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="fnp1" class="d-none">
                                <td>JONCIUS TOP LUMBAN RAJA</td>
                                <td>8909023D2</td>
                                <td>SUPERVISOR TRANSAKSI ENERGI ULP BALIKPAPAN UTARA</td>
                                <td>SPV D</td>
                                <td>Distribution and Commercial</td>
                                <td>Fit & Proper Test</td>
                                <td>
                                    <input type="text" class="form-control date-picker" id="datePickerBasic" />
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-warning" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Kirim untuk Approval">
                                            <i data-cs-icon="send"></i>
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-danger" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                            <i data-cs-icon="bin"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr id="fnp2" class="d-none">
                                <td>TRI HADIYANTO</td>
                                <td>9009039D2</td>
                                <td>SUPERVISOR TRANSAKSI ENERGI ULP BALIKPAPAN UTARA</td>
                                <td>SPV D</td>
                                <td>Distribution and Commercial</td>
                                <td>Fit & Proper Test</td>
                                <td>
                                    <input type="text" class="form-control date-picker" id="dateTopLabel" />
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-warning" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Kirim untuk Approval">
                                            <i data-cs-icon="send"></i>
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-danger" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                            <i data-cs-icon="bin"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr id="fnp3" class="d-none">
                                <td>VARIAN IDRAKI</td>
                                <td>9316333ZY</td>
                                <td>SUPERVISOR TRANSAKSI ENERGI ULP BALIKPAPAN UTARA</td>
                                <td>SPV D</td>
                                <td>Distribution and Commercial</td>
                                <td>Fit & Proper Test</td>
                                <td>
                                    <input type="text" class="form-control date-picker" id="datePickerFloatingLabel" />
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-warning" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Kirim untuk Approval">
                                            <i data-cs-icon="send"></i>
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-danger" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                            <i data-cs-icon="bin"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card mb-5 " style="min-height: 400px; max-height: 400px;">
            <div class="card-header">
                <h5 class="float-start">Draft Gerbong Suksesi</h5>
                <button class="float-end btn btn-sm btn-icon btn-icon-only btn-outline-light" id="clear">
                    <i data-cs-icon="refresh-horizontal"></i>
                </button>
            </div>
            <div class="card-body overflow-auto">
                <div class="d-none" id="tabelgerbong">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Jabatan Sekarang</th>
                                <th scope="col">Jabatan Proyeksi</th>
                                <th scope="col">Skema</th>
                                <th scope="col">Status</th>
                                <th scope="col">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="d-none" id="gerbong1">
                                <th scope="row">1</th>
                                <td>JONCIUS TOP LUMBAN RAJA</td>
                                <td>8909023D2</td>
                                <td>ASSISTANT ENGINEER PENGENDALIAN APP <br> PADA SEKSI TRANSAKSI ENERGI UP3 SAMARINDA</td>
                                <td>SUPERVISOR TRANSAKSI ENERGI <br> PADA ULP BALIKPAPAN UTARA UP3 BALIKPAPAN</td>
                                <td>Promosi</td>
                                <td>Dijadwalkan fit & proper test</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-warning" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                            <i data-cs-icon="bin"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-md btn-primary float-end" type="button" data-bs-toggle="modal" data-bs-target="#modalSimpanGerbong" data-bs-placement="top" title="Simpan">
                    <i data-cs-icon="send"></i>
                </button>
            </div>
        </div>
    </div>

</div>

<!-- Overlay Scroll Long Modal -->
<div class="modal fade scroll-out" id="overlayScrollLong" tabindex="-1" role="dialog" aria-labelledby="overlayScrollLongLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable short modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="overlayScrollLongLabel">JONCIUS TOP LUMBAN RAJA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="scroll-track-visible">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">PLN Success Profile</th>
                                <th scope="col">Item</th>
                                <th scope="col">Sub Item</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th rowspan="2">1</th>
                                <td rowspan="2">Pengetahuan</td>
                                <td>Diklat</td>
                                <td>Diklat Sesuai Job Target</td>
                                <td>skor</td>
                                <td>93.1</td>
                            </tr>
                            <tr>
                                <td>Sertifikasi</td>
                                <td>Sertifikasi Sesuai job Target</td>
                                <td>Kesimpulan Uji</td>
                                <td>Kompeten</td>
                            </tr>
                            <tr>
                                <th rowspan="24">2</th>
                                <th rowspan="24">Pengalaman</th>
                                <td rowspan="7">Ragam Jabatan</td>
                                <td>MA</td>
                                <td>Kali | Tahun</td>
                                <td>0 | 0</td>
                            </tr>
                            <tr>
                                <td>MM</td>
                                <td>Kali | Tahun</td>
                                <td>0 | 0</td>
                            </tr>
                            <tr>
                                <td>MD-PU</td>
                                <td>Kali | Tahun</td>
                                <td>0 | 0</td>
                            </tr>
                            <tr>
                                <td>MD-NPU</td>
                                <td>Kali | Tahun</td>
                                <td>0 | 0</td>
                            </tr>
                            <tr>
                                <td>SPVA-PU</td>
                                <td>Kali | Tahun</td>
                                <td>0 | 0</td>
                            </tr>
                            <tr>
                                <td>SPVA-NPU</td>
                                <td>Kali | Tahun</td>
                                <td>0 | 0</td>
                            </tr>
                            <tr>
                                <td>SPVD</td>
                                <td>Kali | Tahun</td>
                                <td>0 | 0</td>
                            </tr>
                            <tr>
                                <td rowspan="17">Ragam Profesi</td>
                                <td>Energi Primer</td>
                                <td>Kali | Tahun</td>
                                <td>0 | 0</td>
                            </tr>
                            <tr>
                                <td>Pembangkit</td>
                                <td>Kali | Tahun</td>
                                <td>0 | 0</td>
                            </tr>
                            <tr>
                                <td>Operasi Sistem</td>
                                <td>Kali | Tahun</td>
                                <td>0 | 0</td>
                            </tr>
                            <tr>
                                <td>Transmisi</td>
                                <td>Kali | Tahun</td>
                                <td>0 | 0</td>
                            </tr>
                            <tr>
                                <td>Distribusi</td>
                                <td>Kali | Tahun</td>
                                <td>0 | 0</td>
                            </tr>
                            <tr>
                                <td>Niaga & PP</td>
                                <td>Kali | Tahun</td>
                                <td>5 | 13</td>
                            </tr>
                            <tr>
                                <td>K2 K3L</td>
                                <td>Kali | Tahun</td>
                                <td>0 | 0</td>
                            </tr>
                            <tr>
                                <td>Enjiniring & Konstruksi Sipil</td>
                                <td>Kali | Tahun</td>
                                <td>0 | 0</td>
                            </tr>
                            <tr>
                                <td>Enjiniring & Konstruksi Mekanikal</td>
                                <td>Kali | Tahun</td>
                                <td>0 | 0</td>
                            </tr>
                            <tr>
                                <td>Enjiniring & Konstruksi Elektrikal</td>
                                <td>Kali | Tahun</td>
                                <td>0 | 0</td>
                            </tr>
                            <tr>
                                <td>Perijinan, Pertahanan, & ROW</td>
                                <td>Kali | Tahun</td>
                                <td>0 | 0</td>
                            </tr>
                            <tr>
                                <td>Enjiniring Penunjang</td>
                                <td>Kali | Tahun</td>
                                <td>0 | 0</td>
                            </tr>
                            <tr>
                                <td>Supply Chain Management</td>
                                <td>Kali | Tahun</td>
                                <td>0 | 0</td>
                            </tr>
                            <tr>
                                <td>SDM</td>
                                <td>Kali | Tahun</td>
                                <td>0 | 0</td>
                            </tr>
                            <tr>
                                <td>Keuangan</td>
                                <td>Kali | Tahun</td>
                                <td>0 | 0</td>
                            </tr>
                            <tr>
                                <td>Komunikasi, CSR, dan Pengelolaan Kantor</td>
                                <td>Kali | Tahun</td>
                                <td>0 | 0</td>
                            </tr>
                            <tr>
                                <td>Manajemen Perusahaan</td>
                                <td>Kali | Tahun</td>
                                <td>0 | 0</td>
                            </tr>
                            <tr>
                                <td rowspan="12">3</td>
                                <td rowspan="12">Soft Competency</td>
                                <td rowspan="12">Soft Competency</td>
                                <td>ACH</td>
                                <td>Skor</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>BTR</td>
                                <td>Skor</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>CLE</td>
                                <td>Skor</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>BPA</td>
                                <td>Skor</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>INF</td>
                                <td>Skor</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td>AAJ</td>
                                <td>Skor</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>BAC</td>
                                <td>Skor</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>CFO</td>
                                <td>Skor</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>CIM</td>
                                <td>Skor</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td>PNO</td>
                                <td>Skor</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>EMP</td>
                                <td>Skor</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td>MEV</td>
                                <td>Skor</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td rowspan="15">4</td>
                                <td rowspan="15">Personal Attribute</td>
                                <td rowspan="3">Intellegency</td>
                                <td>Abstraksi</td>
                                <td>Skor</td>
                                <td>30</td>
                            </tr>
                            <tr>
                                <td>Verbal</td>
                                <td>Skor</td>
                                <td>36</td>
                            </tr>
                            <tr>
                                <td>Numeric</td>
                                <td>Skor</td>
                                <td>24</td>
                            </tr>
                            <tr>
                                <td rowspan="6">Personality</td>
                                <td>Innocuousness</td>
                                <td>Skor</td>
                                <td>81</td>
                            </tr>
                            <tr>
                                <td>Focus to Goal</td>
                                <td>Skor</td>
                                <td>76</td>
                            </tr>
                            <tr>
                                <td>Agreeableness</td>
                                <td>Skor</td>
                                <td>42</td>
                            </tr>
                            <tr>
                                <td>Curiosity</td>
                                <td>Skor</td>
                                <td>97</td>
                            </tr>
                            <tr>
                                <td>Emotion</td>
                                <td>Skor</td>
                                <td>74</td>
                            </tr>
                            <tr>
                                <td>Sociability</td>
                                <td>Skor</td>
                                <td>97</td>
                            </tr>
                            <tr>
                                <td rowspan="6">Work Attitude</td>
                                <td>Commitment</td>
                                <td>Skor</td>
                                <td>99</td>
                            </tr>
                            <tr>
                                <td>Teamwork</td>
                                <td>Skor</td>
                                <td>99</td>
                            </tr>
                            <tr>
                                <td>Self Efficacy</td>
                                <td>Skor</td>
                                <td>99</td>
                            </tr>
                            <tr>
                                <td>Initiative</td>
                                <td>Skor</td>
                                <td>98</td>
                            </tr>
                            <tr>
                                <td>Decisive</td>
                                <td>Skor</td>
                                <td>94</td>
                            </tr>
                            <tr>
                                <td>Service</td>
                                <td>Skor</td>
                                <td>99</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade scroll-out" id="kirimDraft1modal" tabindex="-1" role="dialog" aria-labelledby="overlayScrollLongLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable short modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="overlayScrollLongLabel">Tambah ke Draf Gerbong Suksesi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="scroll-track-visible">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>Nama</th>
                                <td>:</td>
                                <td>JONCIUS TOP LUMBAN RAJA</td>
                            </tr>
                            <tr>
                                <th>NIP</th>
                                <td>:</td>
                                <td>8909023D2</td>
                            </tr>
                            <tr>
                                <th>Jabatan Sekarang</th>
                                <td>:</td>
                                <td>ASSISTANT ENGINEER PENGENDALIAN APP <br> PADA SEKSI TENAGA LISTRIK UP3 SAMARINDA</td>
                            </tr>
                            <tr>
                                <th>Jabatan Proyeksi</th>
                                <td>:</td>
                                <td>SUPERVISOR TRANSAKSI ENERGI <br> PADA ULP BALIKPAPAN UTARA UP3 BALIKPAPAN</td>
                            </tr>
                        </tbody>
                    </table>
                    <div>
                        <label class="form-label d-block">Setting Fit & Proper Test atau Interview</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="fnp" value="option1" checked />
                            <label class="form-check-label" for="inlineRadio1">Fit & Proper Test</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="interview" value="option2" />
                            <label class="form-check-label" for="inlineRadio2">Interview</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="tanpafnp" value="" />
                            <label class="form-check-label" for="inlineRadio2">Tanpa FnP & Interview</label>
                        </div>
                        <div class="mb-3 w-100" id="jenjabfnp">
                            <label class="form-label">Jenjang Jabatan</label>
                            <select id="selectBasic">
                                <option label="&nbsp;"></option>
                                <option value="Yes">MA</option>
                                <option value="No">MD-PU</option>
                                <option value="Maybe">MD-NPU</option>
                                <option value="Maybe">SPVA-PU</option>
                                <option value="Maybe">SPVA-NPU</option>
                                <option value="Maybe">SPVD</option>
                            </select>
                        </div>
                        <div class="mb-3 w-100" id="streamfnp">
                            <label class="form-label">Bussiness Stream</label>
                            <select id="select2TopLabel">
                                <option label="&nbsp;"></option>
                                <option value="Yes">Corporate Planning and Performance</option>
                                <option value="No">Electricity Generation, Transmission, and Distribution</option>
                                <option value="No">ElectriElectricity Generation and Transmission</option>
                                <option value="Maybe">Distribution and Commercial</option>
                                <option value="Maybe">Business and Commercial</option>
                                <option value="Maybe">Internal Control and Compliance</option>
                                <option value="Maybe">Strategic Electricity Planning</option>
                                <option value="Maybe">Corporate and Technical Services</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="simpanfnp1">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade scroll-out" id="modalSimpanGerbong" tabindex="-1" role="dialog" aria-labelledby="overlayScrollLongLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable short modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="overlayScrollLongLabel">Simpan Draft Gerbong Suksesi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="scroll-track-visible">
                    <div>
                        <div class="row mb-1">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-md">Nama Draft</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-md" id="colFormLabelSm" />
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-md">Tanggal Draft</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-md date-picker" id="datePickerFilled" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="simpanGerbongSuksesi" onclick="alert('Gerbong Suksesi Berhasil Disimpan');">Simpan</button>
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


    $("#tombolCari").click(function() {
        $("#tabel1").fadeIn();
        $("#tabel1").fadeIn("slow");
        $("#tabel1").fadeIn("10000");
        $("#tabel1").removeClass("d-none");
        $("#tabel1").addClass("d-block");

    });

    $("#tombolCariKosong").click(function() {
        $("#tabel2").fadeIn();
        $("#tabel2").fadeIn("slow");
        $("#tabel2").fadeIn("10000");
        $("#tabel2").removeClass("d-none");
        $("#tabel2").addClass("d-block");

    });

    $("#tombolCariDiatas4").click(function() {
        $("#tabel3").fadeIn();
        $("#tabel3").fadeIn("slow");
        $("#tabel3").fadeIn("10000");
        $("#tabel3").removeClass("d-none");
        $("#tabel3").addClass("d-block");

    });

    $("#cariKandidat1").click(function() {
        $("#tabel4, #tabel5, #titleTabel4, #titleTabel5, #titleCard4").fadeIn();
        $("#tabel4, #tabel5, #titleTabel4, #titleTabel5, #titleCard4").fadeIn("slow");
        $("#tabel4, #tabel5, #titleTabel4, #titleTabel5, #titleCard4").fadeIn("10000");
        $("#tabel4, #tabel5, #titleTabel4, #titleTabel5, #titleCard4").removeClass("d-none");
        $("#tabel4, #tabel5, #titleTabel4, #titleTabel5, #titleCard4").addClass("d-block");
        $("#titleCard").removeClass("d-block");
        $("#titleCard").addClass("d-none");

    });

    $("#simpanfnp1").click(function() {
        $("#fnp1, #tabelfnp, #tabelgerbong, #gerbong1").fadeIn();
        $("#fnp1, #tabelfnp, #tabelgerbong, #gerbong1").fadeIn("slow");
        $("#fnp1, #tabelfnp, #tabelgerbong, #gerbong1").fadeIn("10000");
        $("#fnp1, #tabelfnp, #tabelgerbong, #gerbong1").removeClass("d-none");

    });

    $("#tanpafnp").change(function() {
        $("#jenjabfnp, #streamfnp").fadeIn();
        $("#jenjabfnp, #streamfnp").fadeIn("slow");
        $("#jenjabfnp, #streamfnp").fadeIn("10000");
        $("#jenjabfnp, #streamfnp").addClass("d-none");

    });

    $("#fnp, #interview").change(function() {
        $("#jenjabfnp, #streamfnp").fadeIn();
        $("#jenjabfnp, #streamfnp").fadeIn("slow");
        $("#jenjabfnp, #streamfnp").fadeIn("10000");
        $("#jenjabfnp, #streamfnp").removeClass("d-none");
        $("#jenjabfnp, #streamfnp").addClass("d-block");

    });

    $("#clear").click(function() {
        $("#tabel2, #tabel1, #tabel3").fadeIn();
        $("#tabel2, #tabel1, #tabel3").fadeIn("slow");
        $("#tabel2, #tabel1, #tabel3").fadeIn("10000");
        $("#tabel2, #tabel1, #tabel3").removeClass("d-block");
        $("#tabel2, #tabel1, #tabel3").addClass("d-none");

    });

    $("#clearhpk").click(function() {
        $("#tabel4, #tabel5, #titleTabel4, #titleTabel5, #titleCard4").fadeIn();
        $("#tabel4, #tabel5, #titleTabel4, #titleTabel5, #titleCard4").fadeIn("slow");
        $("#tabel4, #tabel5, #titleTabel4, #titleTabel5, #titleCard4").fadeIn("10000");
        $("#tabel4, #tabel5, #titleTabel4, #titleTabel5, #titleCard4").removeClass("d-block");
        $("#tabel4, #tabel5, #titleTabel4, #titleTabel5, #titleCard4").addClass("d-none");
        $("#titleCard").removeClass("d-none");
        $("#titleCard").addClass("d-block");

    });
</script>

<?= $this->endSection() ?>