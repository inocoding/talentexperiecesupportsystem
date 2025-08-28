<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Upload Data Tugas Karya</title>
<?= $this->endSection() ?>

<?= $this->section('cssheader') ?>
<meta name="csrf-token-name" content="<?= csrf_token() ?>">
<meta name="csrf-token-value" content="<?= csrf_hash() ?>">

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
<div class="card shadow-lg">
    <div class="card-body">
        <p>Upload data tugas karya</p>
        <div class="input-group">
            <input type="file" class="form-control" id="excel_file" aria-describedby="inputGroupFileAddon04" aria-label="Upload" />
            <button class="btn btn-outline-secondary" type="button" id="uploadBtn">Upload</button>
        </div>
        <div class="progress mt-3" style="height: 25px;">
            <div id="progressBar" class="progress-bar" style="width: 0%;">0%</div>
        </div>
        <div id="status" class="mt-2"></div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('jsfooter') ?>
<script>
document.addEventListener('DOMContentLoaded', function(){
  const tokenName  = document.querySelector('meta[name="csrf-token-name"]').content;
  let   tokenValue = document.querySelector('meta[name="csrf-token-value"]').content;

  function injectCSRF(fd) { fd.append(tokenName, tokenValue); }

  document.getElementById('uploadBtn').addEventListener('click', function(){
    const file = document.getElementById('excel_file').files[0];
    if(!file){ return alert('Pilih file terlebih dahulu'); }

    const fd = new FormData();
    fd.append('excel_file', file);
    injectCSRF(fd);

    document.getElementById('status').textContent = 'Mengunggah file...';

    fetch("<?= base_url('TugasKaryaImport/upload') ?>", {
      method: 'POST', body: fd,
      headers: {'X-Requested-With':'XMLHttpRequest'}
    })
    .then(r => r.json())
    .then(res => {
      if(res.status==='ok') {
        document.getElementById('status').textContent = 'Proses dimulai...';
        processNext();
      } else {
        document.getElementById('status').textContent = res.message || 'Gagal upload';
      }
      // update token kalau kamu aktifkan CSRF Regenerate
      if (res['<?= csrf_token() ?>']) tokenValue = res['<?= csrf_token() ?>'];
    });
  });

  function processNext(){
    const fd = new FormData(); injectCSRF(fd);
    fetch("<?= base_url('TugasKaryaImport/processChunk') ?>", {
      method: 'POST', body: fd,
      headers: {'X-Requested-With':'XMLHttpRequest'}
    })
    .then(r => r.json())
    .then(res => {
      if(res.status==='ok'){
        const bar = document.getElementById('progressBar');
        bar.style.width = res.progress + '%';
        bar.textContent = res.progress + '%';
        if(res.done){ document.getElementById('status').textContent = 'Proses selesai!'; }
        else { processNext(); }
      } else {
        document.getElementById('status').textContent = res.message || 'Gagal memproses';
      }
    });
  }
});
</script>

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