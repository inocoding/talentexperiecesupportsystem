<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>SLA <?= $dataeval->nama_eval ?></title>
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
            <a href="<?= $asal == 0 ? site_url('career/selesaieval') : null ?> <?= $asal == 1 ? site_url('career/evaluasimutasi') : null ?> <?= $asal == 2 ? site_url('career/evaluasimutasiaps') : null ?> <?= $asal == 3 ? site_url('career/telusurieval') : null ?>" class="btn-link">
                <i data-cs-icon="chevron-left" class="mt-2 me-2" data-cs-size="15"></i>
            </a>
            <h2 class="small-title mt-2">SLA <?= $dataeval->nama_eval ?></h2>
        </div>
    </div>
</div>

<!-- Icon & Text Start -->
<section class="scroll-section">
    <?php
    //fungsi check tanggal merah
    function selisihHari($tglAwal, $tglAkhir)
    {
        // list tanggal merah selain hari minggu
        // $tglLibur = array("2013-01-04", "2013-01-05", "2013-01-17");
        $tglLibur = array(
            "2024-01-01",
            "2024-02-08",
            "2024-02-09",
            "2024-03-11",
            "2024-03-29",
            "2024-03-12",
            "2024-04-10",
            "2024-04-11",
            "2024-04-08",
            "2024-04-09",
            "2024-04-12",
            "2024-04-15",
            "2024-05-01",
            "2024-05-09",
            "2024-05-23",
            "2024-05-10",
            "2024-05-24",
            "2024-06-17",
            "2024-06-18",
            "2024-09-16",
            "2024-12-25",
            "2024-12-26",
        );

        // memecah string tanggal awal untuk mendapatkan
        // tanggal, bulan, tahun
        $pecah1 = explode("-", $tglAwal);
        $date1 = $pecah1[2];
        $month1 = $pecah1[1];
        $year1 = $pecah1[0];

        // memecah string tanggal akhir untuk mendapatkan
        // tanggal, bulan, tahun
        $pecah2 = explode("-", $tglAkhir);
        $date2 = $pecah2[2];
        $month2 = $pecah2[1];
        $year2 =  $pecah2[0];

        // mencari total selisih hari dari tanggal awal dan akhir
        $jd1 = GregorianToJD($month1, $date1, $year1);
        $jd2 = GregorianToJD($month2, $date2, $year2);

        $selisih = ($jd2 - $jd1);
        $libur1 = 0;
        $libur2 = 0;
        $libur3 = 0;

        // proses menghitung tanggal merah dan hari minggu
        // di antara tanggal awal dan akhir
        for ($i = 0; $i <= $selisih; $i++) {
            // menentukan tanggal pada hari ke-i dari tanggal awal
            $tanggal = mktime(0, 0, 0, $month1, $date1 + $i, $year1);
            $tglstr = date("Y-m-d", $tanggal);
            $tgl2 = strtotime($tglstr);


            // menghitung jumlah tanggal pada hari ke-i
            // yang masuk dalam daftar tanggal merah selain minggu
            if (in_array($tglstr, $tglLibur)) {
                $libur1++;
            }

            // menghitung jumlah tanggal pada hari ke-i
            // yang merupakan hari minggu
            if (date("N", $tgl2) == 7) {
                $libur2++;
            }

            if (date("N", $tgl2) == 6) {
                $libur3++;
            }
        }
        return $selisih - $libur1 - $libur2 - $libur3;

        // menghitung selisih hari yang bukan tanggal merah dan hari minggu
    }
    ?>
    <div class="row">
        <div class="col-12 col-lg-12 mb-5">
            <div class="row g-0">
                <div class="col-auto sw-7 d-flex flex-column justify-content-center align-items-center position-relative me-4">
                    <div class="w-100 d-flex h-100"></div>
                    <div class="bg-foreground sw-7 sh-7 rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center mt-n2">
                        <div class="bg-gradient-light sw-5 sh-5 rounded-xl">
                            <div class="text-primary d-flex justify-content-center align-items-center h-100">
                                -
                            </div>
                        </div>
                    </div>
                    <div class="w-100 d-flex h-100 justify-content-center position-relative">
                        <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                    </div>
                </div>
                <div class="col mb-2">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-start">
                            <div class="d-flex flex-column">
                                <a href="#" class="heading stretched-link">Dasar Mutasi</a>
                                <div class="text-alternate"><?= $dataeval->tgl_dasar_mutasi ?></div>
                                <div class="text-muted mt-1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-auto sw-7 d-flex flex-column justify-content-center align-items-center position-relative me-4">
                    <div class="w-100 d-flex h-100 justify-content-center position-relative">
                        <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                    </div>
                    <div class="bg-foreground sw-7 sh-7 rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center mt-n2 position-relative">
                        <div class="bg-gradient-light sw-5 sh-5 rounded-xl">
                            <div class="text-primary d-flex justify-content-center align-items-center h-100 text-small">
                                0 days
                            </div>
                        </div>
                    </div>
                    <div class="w-100 d-flex h-100 justify-content-center position-relative">
                        <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                    </div>
                </div>
                <div class="col mb-2">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-start">
                            <div class="d-flex flex-column">
                                <a href="#" class="heading stretched-link">Disposisi ke PIC</a>
                                <div class="text-alternate"><?= $dataeval->tgl_disposisi ?></div>
                                <div class="text-muted mt-1">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-auto sw-7 d-flex flex-column justify-content-center align-items-center position-relative me-4">
                    <div class="w-100 d-flex h-100 justify-content-center position-relative">
                        <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                    </div>
                    <div class="bg-foreground sw-7 sh-7 rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center mt-n2 position-relative">
                        <div class="bg-gradient-light sw-5 sh-5 rounded-xl">
                            <div class="text-primary d-flex justify-content-center align-items-center h-100 text-small">
                                <?php
                                if ($dataeval->tgl_submit_eval_1 == null) {
                                    echo "-";
                                } else {
                                    echo selisihHari($dataeval->tgl_disposisi, $dataeval->tgl_submit_eval_1) . " days";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 d-flex h-100 justify-content-center position-relative">
                        <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                    </div>
                </div>
                <div class="col mb-2">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-start">
                            <div class="d-flex flex-column">
                                <a href="#" class="heading stretched-link">PIC Submit Evaluasi</a>
                                <div class="text-alternate"><?= $dataeval->tgl_submit_eval_1 ?></div>
                                <div class="text-muted mt-1">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-auto sw-7 d-flex flex-column justify-content-center align-items-center position-relative me-4">
                    <div class="w-100 d-flex h-100 justify-content-center position-relative">
                        <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                    </div>
                    <div class="bg-foreground sw-7 sh-7 rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center mt-n2 position-relative">
                        <div class="bg-gradient-light sw-5 sh-5 rounded-xl">
                            <div class="text-primary d-flex justify-content-center align-items-center h-100 text-small">
                                <?php
                                if ($dataeval->tgl_submit_eval_2 == null) {
                                    echo "-";
                                } else {
                                    # code...
                                    echo selisihHari($dataeval->tgl_disposisi, $dataeval->tgl_submit_eval_2) . " days";
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 d-flex h-100 justify-content-center position-relative">
                        <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                    </div>
                </div>
                <div class="col mb-2">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-start">
                            <div class="d-flex flex-column">
                                <a href="#" class="heading stretched-link">MSB Submit Evaluasi</a>
                                <div class="text-alternate"><?= $dataeval->tgl_submit_eval_2 ?></div>
                                <div class="text-muted mt-1">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-auto sw-7 d-flex flex-column justify-content-center align-items-center position-relative me-4">
                    <div class="w-100 d-flex h-100 justify-content-center position-relative">
                        <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                    </div>
                    <div class="bg-foreground sw-7 sh-7 rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center mt-n2 position-relative">
                        <div class="bg-gradient-light sw-5 sh-5 rounded-xl">
                            <div class="text-primary d-flex justify-content-center align-items-center h-100 text-small">
                                <?php
                                if ($dataeval->tgl_submit_eval_3 == null) {
                                    echo "-";
                                } else {
                                    # code...
                                    echo selisihHari($dataeval->tgl_disposisi, $dataeval->tgl_submit_eval_3) . " days";
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 d-flex h-100"></div>
                </div>
                <div class="col mb-2">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-start">
                            <div class="d-flex flex-column">
                                <a href="#" class="heading stretched-link">VP Approve Evaluasi</a>
                                <div class="text-alternate"><?= $dataeval->tgl_submit_eval_3 ?></div>
                                <div class="text-muted mt-1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 mb-5">
            <div class="row g-0">
                <div class="col-auto sw-7 d-flex flex-column justify-content-center align-items-center position-relative me-4">
                    <div class="w-100 d-flex h-100"></div>
                    <div class="bg-foreground sw-7 sh-7 rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center mt-n2">
                        <div class="bg-gradient-light sw-5 sh-5 rounded-xl">
                            <div class="text-primary d-flex justify-content-center align-items-center h-100 text-small">
                                <?php
                                if ($dataeval->tgl_nd_kfrm_to_for_collab == null) {
                                    # code...
                                    echo "-";
                                } else {
                                    # code...
                                    echo selisihHari($dataeval->tgl_disposisi, $dataeval->tgl_nd_kfrm_to_for_collab) . " days";
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 d-flex h-100 justify-content-center position-relative">
                        <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                    </div>
                </div>
                <div class="col mb-2">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-start">
                            <div class="d-flex flex-column">
                                <a href="#" class="heading stretched-link">Nota Dinas Konfirmasi</a>
                                <div class="text-alternate"><?= $dataeval->tgl_nd_kfrm_to_for_collab ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-auto sw-7 d-flex flex-column justify-content-center align-items-center position-relative me-4">
                    <div class="w-100 d-flex h-100 justify-content-center position-relative">
                        <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                    </div>
                    <div class="bg-foreground sw-7 sh-7 rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center mt-n2 position-relative">
                        <div class="bg-gradient-light sw-5 sh-5 rounded-xl">
                            <div class="text-primary d-flex justify-content-center align-items-center h-100 text-small">
                                <?php
                                if ($dataeval->tgl_nd_blsn_kfrm_from_for_c == null) {
                                    # code...
                                    echo "-";
                                } else {
                                    # code...
                                    echo selisihHari($dataeval->tgl_disposisi, $dataeval->tgl_nd_blsn_kfrm_from_for_c) . " days";
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 d-flex h-100 justify-content-center position-relative">
                        <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                    </div>
                </div>
                <div class="col mb-2">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-start">
                            <div class="d-flex flex-column">
                                <a href="#" class="heading stretched-link">Balasan Konfirmasi</a>
                                <div class="text-alternate"><?= $dataeval->tgl_nd_blsn_kfrm_from_for_c ?></div>
                                <div class="text-muted mt-1">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-auto sw-7 d-flex flex-column justify-content-center align-items-center position-relative me-4">
                    <div class="w-100 d-flex h-100 justify-content-center position-relative">
                        <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                    </div>
                    <div class="bg-foreground sw-7 sh-7 rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center mt-n2 position-relative">
                        <div class="bg-gradient-light sw-5 sh-5 rounded-xl">
                            <div class="text-primary d-flex justify-content-center align-items-center h-100 text-small">
                                <?php
                                if ($dataeval->tgl_sk == null) {
                                    # code...
                                    echo "-";
                                } else {
                                    # code...
                                    echo selisihHari($dataeval->tgl_disposisi, $dataeval->tgl_sk) . " days";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 d-flex h-100 justify-content-center position-relative">
                        <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                    </div>
                </div>
                <div class="col mb-2">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-start">
                            <div class="d-flex flex-column">
                                <a href="#" class="heading stretched-link">SK Mutasi</a>
                                <div class="text-alternate"><?= $dataeval->tgl_sk ?></div>
                                <div class="text-muted mt-1">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-auto sw-7 d-flex flex-column justify-content-center align-items-center position-relative me-4">
                    <div class="w-100 d-flex h-100 justify-content-center position-relative">
                        <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                    </div>
                    <div class="bg-foreground sw-7 sh-7 rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center mt-n2 position-relative">
                        <div class="bg-gradient-light sw-5 sh-5 rounded-xl">
                            <div class="text-primary d-flex justify-content-center align-items-center h-100 text-small">
                                <?php
                                if ($dataeval->tgl_sk == null && $dataeval->hasil_evaluasi_3 == 0) {
                                    echo "-";
                                } else if ($dataeval->tgl_sk != null && $dataeval->hasil_evaluasi_3 == 1) {
                                    # code...
                                    echo '<i data-cs-icon="check" class="icon" data-cs-size="12"></i>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 d-flex h-100"></div>
                </div>
                <div class="col mb-2">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-start">
                            <div class="d-flex flex-column">
                                <a href="#" class="heading stretched-link">Selesai</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 mb-5">
            <div class="row g-0">
                <div class="col-auto sw-7 d-flex flex-column justify-content-center align-items-center position-relative me-4">
                    <div class="w-100 d-flex h-100"></div>
                    <div class="bg-foreground sw-7 sh-7 rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center mt-n2">
                        <div class="bg-gradient-light sw-5 sh-5 rounded-xl">
                            <div class="text-primary d-flex justify-content-center align-items-center h-100 text-small">
                                <?php
                                if ($dataeval->tgl_nd_jwbn_1_to_requestr == null) {
                                    echo "-";
                                } else {
                                    # code...
                                    echo selisihHari($dataeval->tgl_disposisi, $dataeval->tgl_nd_jwbn_1_to_requestr) . " days";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 d-flex h-100 justify-content-center position-relative">
                        <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                    </div>
                </div>
                <div class="col mb-2">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-start">
                            <div class="d-flex flex-column">
                                <a href="#" class="heading stretched-link">Jawaban kepemohon</a>
                                <div class="text-alternate"><?= $dataeval->tgl_nd_jwbn_1_to_requestr ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-auto sw-7 d-flex flex-column justify-content-center align-items-center position-relative me-4">
                    <div class="w-100 d-flex h-100 justify-content-center position-relative">
                        <div class="line-w-1 bg-separator h-100 position-absolute"></div>
                    </div>
                    <div class="bg-foreground sw-7 sh-7 rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center mt-n2 position-relative">
                        <div class="bg-gradient-light sw-5 sh-5 rounded-xl">
                            <div class="text-primary d-flex justify-content-center align-items-center h-100 text-small">
                                <?php
                                if ($dataeval->tgl_nd_jwbn_1_to_requestr == null && $dataeval->hasil_evaluasi_3 == 0) {
                                    echo "-";
                                } else if ($dataeval->tgl_nd_jwbn_1_to_requestr != null && $dataeval->hasil_evaluasi_3 == 0) {
                                    # code...
                                    echo '<i data-cs-icon="check" class="icon" data-cs-size="12"></i>';
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                    <div class="w-100 d-flex h-100"></div>
                </div>
                <div class="col mb-2">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-start">
                            <div class="d-flex flex-column">
                                <a href="#" class="heading stretched-link">Selesai</a>
                                <div class="text-alternate"></div>
                                <div class="text-muted mt-1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Icon & Text End -->

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
<script src="<?= base_url() ?>/template/js/plugins/datatable.editablerows33.js"></script>
<script src="<?= base_url() ?>/template/js/common.js"></script>
<script src="<?= base_url() ?>/template/js/scripts.js"></script>
<!-- Page Specific Scripts End -->

<?= $this->endSection() ?>