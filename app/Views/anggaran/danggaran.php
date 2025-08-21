<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Dashboard Anggaran</title>
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
    <!-- Title Start -->
    <div class="col-12 col-md-7">
      <h6 class="mb-2 pb-0" id="title">Dashboard Anggaran</h6>
    </div>
    <!-- Title End -->
  </div>
</div>

<div class="row">
  <!-- Rounded Bar Chart Start -->
  <div class="col-12 col-xl-12">
    <section class="scroll-section" id="roundedBarChartTitle">
      <h6 class="">POS 52 (Rp Juta)</h6>
      <div class="card mb-5">
        <div class="card-header">
          <ul class="nav nav-tabs nav-tabs-line card-header-tabs responsive-tabs" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#first" role="tab" type="button" aria-selected="true">
                Bar Chart
              </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#second" role="tab" type="button" aria-selected="false">Doughnut Chart</button>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="tab-pane fade active show" id="first" role="tabpanel">
              <div class="sh-40">
                <canvas id="roundedBarChart"></canvas>
              </div>
            </div>
            <div class="tab-pane fade" id="second" role="tabpanel">
              <div class="sh-40">
                <div class="row">
                  <div class="col-2 sh-40">
                    <h6 class="text-center" style="font-size: smaller;"><small>SPPD Mutasi</small></h6>
                    <canvas id="doughnutChart"></canvas>
                  </div>
                  <div class="col-2 sh-40">
                    <h6 class="text-center" style="font-size: smaller;"><small>Diklat Dikelola Unit - Kantor Pusat</small></h6>
                    <canvas id="doughnutChart2"></canvas>
                  </div>
                  <div class="col-2 sh-40">
                    <h6 class="text-center" style="font-size: smaller;"><small>Diklat Dikelola Unit - Unit Induk</small></h6>
                    <canvas id="doughnutChart3"></canvas>
                  </div>
                  <div class="col-2 sh-40">
                    <h6 class="text-center" style="font-size: smaller;"><small>Diklat Dikelola Pusat</small></h6>
                    <canvas id="doughnutChart4"></canvas>
                  </div>
                  <div class="col-2 sh-40">
                    <h6 class="text-center" style="font-size: smaller;"><small>SPPD Diklat</small></h6>
                    <canvas id="doughnutChart5"></canvas>
                  </div>
                  <div class="col-2 sh-40">
                    <h6 class="text-center" style="font-size: smaller;"><small>Diklat Jasdik Pusdiklat</small></h6>
                    <canvas id="doughnutChart6"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer" style="margin-top: -10px;">
          <a class="mb-1" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Data Selengkapnya
          </a>
          <div class="collapse" id="collapseExample">
            <div class="card card-body no-shadow border mt-1">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">NO</th>
                      <th scope="col">SUB POS ANGGARAN</th>
                      <th scope="col">PAGU (Rp)</th>
                      <th scope="col">REALISASI (Rp)</th>
                      <th scope="col">% REALISASI</th>
                      <th scope="col">SISA (Rp)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Perjalanan Dinas Mutasi Jabatan</td>
                      <td>9.776.550.000</td>
                      <td>2.584.469.118</td>
                      <td>26,44%</td>
                      <td>7.192.080.882</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Biaya Diklat Dikelola Unit (KP)</td>
                      <td>12.625.795.804</td>
                      <td>1.020.109.013</td>
                      <td>8,08%</td>
                      <td>11.605.686.791</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Biaya Diklat Jasdik Dikelola Pusat (total)</td>
                      <td>357.543.766.320</td>
                      <td>95.695.128.814</td>
                      <td>26,76%</td>
                      <td>261.848.637.506</td>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                      <td>a. Sub Bid Rekrutmen</td>
                      <td>22.110.543.702</td>
                      <td>49.344.400</td>
                      <td>0,22%</td>
                      <td>22.061.199.302</td>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                      <td>b. Sub Bid Bang Keahlian</td>
                      <td>13.024.589.834</td>
                      <td>811.930.995</td>
                      <td>6,23%</td>
                      <td>12.212.658.839</td>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                      <td>c. Sub Bid Bang Manajemen</td>
                      <td>14.070.731.402</td>
                      <td>7.549.112.428</td>
                      <td>53,65%</td>
                      <td>6.521.618.974</td>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                      <td>d. Sub Bid Pendidikan Formal</td>
                      <td>245.698.507.500</td>
                      <td>86.378.166.326</td>
                      <td>35,16%</td>
                      <td>159.320.341.174</td>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                      <td>e. Sub Bid Bang Korp</td>
                      <td>32.000.000.000</td>
                      <td>431.464.510</td>
                      <td>1,35%</td>
                      <td>31.568.535.490</td>
                    </tr>
                    <tr>
                      <th scope="row"></th>
                      <td>f. Talent Development</td>
                      <td>30.639.393.882</td>
                      <td>475.110.155</td>
                      <td>1,55%</td>
                      <td>30.164.283.727</td>
                    </tr>
                    <tr>
                      <th scope="row">4</th>
                      <td>Beban Perjalanan Dinas Diklat</td>
                      <td>78.321.540.506</td>
                      <td>7.385.093.525</td>
                      <td>9,43%</td>
                      <td>70.936.446.981</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- Rounded Bar Chart End -->

  <!-- Rounded Bar Chart Start -->
  <div class="col-12 col-xl-12">
    <section class="scroll-section" id="roundedBarChartTitle">
      <h6 class="">Diklat Dikelola Unit - Unit Induk (Rp Juta)</h6>
      <div class="card mb-5">
        <div class="card-body">
          <div class="sh-50">
            <canvas id="roundedBarChart2"></canvas>
          </div>
          <div class="">
            <a class="mb-1" data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
              Data Selengkapnya
            </a>
            <div class="collapse" id="collapseExample2">
              <div class="card card-body no-shadow border mt-3">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">NO</th>
                        <th scope="col">UNIT</th>
                        <th scope="col">PAGU (Rp)</th>
                        <th scope="col">REALISASI (Rp)</th>
                        <th scope="col">% REALISASI</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><strong>1</strong></th>
                        <td><strong>HTD Area 1</strong></td>
                        <td><strong>8.827.751.598</strong></td>
                        <td><strong>508.911.480</strong></td>
                        <td><strong>5.76%</strong></td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UID ACEH</td>
                        <td>4.135.373.643</td>
                        <td>409.543.450</td>
                        <td>9,90%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UID RIAU & KEPRI</td>
                        <td>2.149.585.455</td>
                        <td>99.368.030</td>
                        <td>4,62%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UID SUMUT</td>
                        <td>2.542.792.500</td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row"><strong>2</strong></th>
                        <td><strong>HTD Area 2</strong></td>
                        <td><strong>7.787.930.473</strong></td>
                        <td><strong>1.228.783.810</strong></td>
                        <td><strong>15,78%</strong></td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UID LAMPUNG</td>
                        <td>2.234.406.366</td>
                        <td>326.427.705</td>
                        <td>14,61%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UIW BABEL</td>
                        <td>1.320.512.732</td>
                        <td>163.300.310</td>
                        <td>12,37%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UID S2JB</td>
                        <td>1.902.854.554</td>
                        <td>558.733.904</td>
                        <td>29,36%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UID SUMBAR</td>
                        <td>2.330.156.821</td>
                        <td>180.321.891</td>
                        <td>7,74%</td>
                      </tr>
                      <tr>
                        <th scope="row"><strong>3</strong></th>
                        <td><strong>HTD AREA 3</strong></td>
                        <td><strong>6.167.333.134</strong></td>
                        <td><strong>69.930.000</strong></td>
                        <td><strong>1,13%</strong></td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UIP3B SUMATERA</td>
                        <td>4.418.117.509</td>
                        <td>223.547.000</td>
                        <td>5,06%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UIP SUMBAGUT</td>
                        <td> 884.175.000</td>
                        <td> 257.385.603</td>
                        <td>29,11%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UIP SUMBAGTENG</td>
                        <td>627.290.625</td>
                        <td>277.512.544</td>
                        <td>44,24%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UIP SUMBAGSEL</td>
                        <td>237.750.000</td>
                        <td>108.086.250</td>
                        <td>45,46%</td>
                      </tr>
                      <tr>
                        <th scope="row"><strong>4</strong></th>
                        <td><strong>HTD AREA 4</strong></td>
                        <td><strong>6.648.460.500</strong></td>
                        <td><strong>339.484.448</strong></td>
                        <td><strong>5,11%</strong></td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UIP3B KALIMANTAN</td>
                        <td>1.403.281.830</td>
                        <td>99.983.250</td>
                        <td>7,12%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UIP KALBAGBAR</td>
                        <td>369.600.000</td>
                        <td>23.406.150</td>
                        <td>6,33%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UIP KALBAGTIM</td>
                        <td>289.275.000</td>
                        <td>68.820.000</td>
                        <td>23,79%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UID KALBAR</td>
                        <td>1.197.031.830</td>
                        <td>46.000.000</td>
                        <td>3,84%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UID KALSELTENG</td>
                        <td>756.052.741</td>
                        <td>10.000.000</td>
                        <td>1,32%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UID KALTIMRA</td>
                        <td>2.633.219.098</td>
                        <td>91.275.048</td>
                        <td>3,47%</td>
                      </tr>
                      <tr>
                        <th scope="row"><strong>5</strong></th>
                        <td><strong>HTD AREA 5</strong></td>
                        <td><strong>5.174.301.815</strong></td>
                        <td><strong>387.574.819</strong></td>
                        <td><strong>7,49%</strong></td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UID BANTEN</td>
                        <td>978.376.393</td>
                        <td>16.709.820</td>
                        <td>1,71%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UID JAWA BARAT</td>
                        <td>1.660.925.509</td>
                        <td>136.800.000</td>
                        <td>8,24%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UID JAKARTA RAYA</td>
                        <td>2.534.999.913</td>
                        <td>234.064.999</td>
                        <td>9,23%</td>
                      </tr>
                      <tr>
                        <th scope="row"><strong>6</strong></th>
                        <td><strong>HTD AREA 6</strong></td>
                        <td><strong>5.937.666.438</strong></td>
                        <td><strong>323.628.981</strong></td>
                        <td><strong>5,45%</strong></td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UID BALI</td>
                        <td>1.938.017.277</td>
                        <td>28.905.000</td>
                        <td>1,49%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UID JAWA TENGAH & DIY</td>
                        <td>2.101.949.116</td>
                        <td>188.904.750</td>
                        <td>8,99%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UID JAWA TIMUR</td>
                        <td>1.897.700.045</td>
                        <td>105.819.231</td>
                        <td>5,58%</td>
                      </tr>
                      <tr>
                        <th scope="row"><strong>7</strong></th>
                        <td><strong>HTD AREA 7</strong></td>
                        <td><strong>5.638.303.063</strong></td>
                        <td><strong>196.661.920</strong></td>
                        <td><strong>3,49%</strong></td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UIP2B</td>
                        <td>1.239.900.875</td>
                        <td>132.524.920</td>
                        <td>10,69%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UIT JBB</td>
                        <td>1.912.935.482</td>
                        <td>1.165.000</td>
                        <td>0,06%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UIT JBT</td>
                        <td>1.330.304.580</td>
                        <td>62.972.000</td>
                        <td>4,73%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UIT JBTB</td>
                        <td>1.155.162.125</td>
                        <td></td>
                        <td>0%</td>
                      </tr>
                      <tr>
                        <th scope="row"><strong>8</strong></th>
                        <td><strong>HTD AREA 8</strong></td>
                        <td><strong>11.887.294.071</strong></td>
                        <td><strong>2.681.449.635</strong></td>
                        <td><strong>22,56%</strong></td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UIK TJB</td>
                        <td>780.656.366</td>
                        <td>88.937.159</td>
                        <td>11,39%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UIP JBB</td>
                        <td>1.191.112.500</td>
                        <td>83.250.000</td>
                        <td>6,99%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UIP JBT</td>
                        <td>1.254.750.000</td>
                        <td>620.831.260</td>
                        <td>49,48%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UIP JBTB</td>
                        <td>817.912.500</td>
                        <td>27.195.000</td>
                        <td>3,32%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>PUSDIKLAT</td>
                        <td>1.371.125.000</td>
                        <td>118.215.000</td>
                        <td>8,62%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>PUSERTIF</td>
                        <td>2.032.067.732</td>
                        <td>742.934.019</td>
                        <td>36,56%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>PUSHARLIS</td>
                        <td>1.971.174.554</td>
                        <td>55.018.000</td>
                        <td>2,79%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>PUSLITBANG</td>
                        <td>981.707.366</td>
                        <td>134.220.000</td>
                        <td>13,67%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>PUSMANPRO</td>
                        <td>1.486.788.053</td>
                        <td>122.516.191</td>
                        <td>8,24%</td>
                      </tr>
                      <tr>
                        <th scope="row"><strong>9</strong></th>
                        <td><strong>HTD AREA 9</strong></td>
                        <td><strong>7.526.722.709</strong></td>
                        <td><strong>771.427.713</strong></td>
                        <td><strong>10,25%</strong></td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UIP3B SULAWESI</td>
                        <td>2.652.631.298</td>
                        <td>663.447.000</td>
                        <td>25,01%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UID SULSELRABAR</td>
                        <td>2.106.500.938</td>
                        <td>99.433.713</td>
                        <td>4,72%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UID SULUTTENGGO</td>
                        <td>1.955.415.473</td>
                        <td>8.547.000</td>
                        <td>0,44%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UIP SULAWESI</td>
                        <td>812.175.000</td>
                        <td></td>
                        <td>0%</td>
                      </tr>
                      <tr>
                        <th scope="row"><strong>10</strong></th>
                        <td><strong>HTD AREA 10</strong></td>
                        <td><strong>4.772.357.034</strong></td>
                        <td><strong>774.468.690</strong></td>
                        <td><strong>16,23%</strong></td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UIP MALUKU & PAPUA</td>
                        <td>824.544.000</td>
                        <td>99.999.900</td>
                        <td>12,13%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UIP NUSRA</td>
                        <td>532.747.500</td>
                        <td>89.280.000</td>
                        <td>16,76%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UIW MMU</td>
                        <td>680.042.750</td>
                        <td></td>
                        <td>0%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UIW NTB</td>
                        <td>1.068.864.563</td>
                        <td>627.372.025</td>
                        <td>58,70%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UIW NTT</td>
                        <td>914.865.473</td>
                        <td></td>
                        <td>0%</td>
                      </tr>
                      <tr>
                        <th scope="row"></th>
                        <td>UIW P2B</td>
                        <td>751.292.748</td>
                        <td>57.816.665</td>
                        <td>7,70%</td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <td colspan="2"><strong>TOTAL</strong></td>
                      <td><strong>70.368.120.835</strong></td>
                      <td><strong>6.386.836.331</strong></td>
                      <td><strong>9,08%</strong></td>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- Rounded Bar Chart End -->
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
<script src="<?= base_url() ?>/template/js/pages/dashboard.anggaran.js"></script>
<!-- Template Base Scripts End -->

<!-- Page Specific Scripts Start -->
<script src="<?= base_url() ?>/template/js/forms/genericforms.js"></script>
<script src="<?= base_url() ?>/template/js/cs/dropzone.templates.js"></script>
<script src="<?= base_url() ?>/template/js/forms/controls.dropzone.js"></script>
<script src="<?= base_url() ?>/template/js/cs/charts.extend.js"></script>
<script src="<?= base_url() ?>/template/js/plugins/chartsdashanggaran.js"></script>
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