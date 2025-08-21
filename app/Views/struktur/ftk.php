<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Monitoring FTK</title>
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
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Monitoring FTK</h5>
            <div>
                <button type="button" data-bs-toggle="modal" data-bs-target="#legendamodal" class="btn btn-secondary btn-sm me-2">Legenda</button>
            </div>
        </div>
    </div>
</div>
<!-- Title and Top Buttons End -->
<div class="row">
    <table class="table align-middle table-bordered text-center table-striped" style="font-size: 10px;">
        <thead class="">
            <tr class="align-middle">
                <th rowspan="2">DIT</th>
                <th rowspan="2">DIV/UNIT</th>
                <th rowspan="2">PAGU FTK</th>
                <th colspan="3" class="text-center">MAK+MA</th>
                <th colspan="3" class="text-center">MM</th>
                <th colspan="3" class="text-center">MD</th>
                <th colspan="3" class="text-center">SPV A</th>
                <th colspan="3" class="text-center">SPV D</th>
                <th colspan="3" class="text-center">GENERALIST</th>
                <th rowspan="2">REALISASI JUL 2025</th>
                <th rowspan="2">% REALISASI JUL 2025</th>
                <th colspan="12" class="text-center">Mutasi per Agt 2025 </th>
                <th colspan="2" class="text-center">Total</th>
                <th rowspan="2" class="text-center">Proyeksi Realisasi Agt 2025</th>
                <th rowspan="2" class="text-center">% Proyeksi Realisasi Agt 2025</th>
            </tr>
            <tr class="">
                <th>P</th>
                <th>R</th>
                <th>&#9650;</th>
                <th>P</th>
                <th>R</th>
                <th>&#9650;</th>
                <th>P</th>
                <th>R</th>
                <th>&#9650;</th>
                <th>P</th>
                <th>R</th>
                <th>&#9650;</th>
                <th>P</th>
                <th>R</th>
                <th>&#9650;</th>
                <th>P</th>
                <th>R</th>
                <th>&#9650;</th>
                <th>Pe</th>
                <th>IDT-</th>
                <th>TK-</th>
                <th>PTB-</th>
                <th>M-</th>
                <th>APS-</th>
                <th>APS+</th>
                <th>M+</th>
                <th>PTB+</th>
                <th>TK+</th>
                <th>IDT+</th>
                <th>OJT</th>
                <th>OUT</th>
                <th>IN</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

</div>
<!-- Modal -->
<div class="modal fade" id="legendamodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Legenda Tabel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Simbol</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>P</td>
                            <td>Pagu FTK (Penetapan dari DIV HST)</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>R</td>
                            <td>Realisasi FTK</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>&#9650;</td>
                            <td>Delta antara Pagu - Realisasi (P-R)</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Pe</td>
                            <td>Pensiun</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>IDT-</td>
                            <td>Jumlah mutasi Izin Diluar Tanggungan keluar</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>IDT+</td>
                            <td>Jumlah Izin Diluar Tanggungan kembali</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>TK-</td>
                            <td>Jumlah mutasi Tugas Karya keluar</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>TK+</td>
                            <td>Jumlah mutasi Tugas Karya Masuk</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>PTB-</td>
                            <td>Jumlah Pegawai Tugas Belajar keluar</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>PTB+</td>
                            <td>Jumlah Pegawai Tugas Belajar kembali</td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>M-</td>
                            <td>Jumlah Pegawai Mutasi biasa keluar</td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>M+</td>
                            <td>Jumlah Pegawai Mutasi biasa masuk</td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>APS-</td>
                            <td>Jumlah Pegawai APS keluar</td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td>APS+</td>
                            <td>Jumlah Pegawai APS masuk</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
<script src="<?= base_url() ?>/template/js/plugins/datatable.editablerows2.js"></script>
<script src="<?= base_url() ?>/template/js/common.js"></script>
<script src="<?= base_url() ?>/template/js/scripts.js"></script>
<!-- Page Specific Scripts End -->

<?= $this->endSection() ?>