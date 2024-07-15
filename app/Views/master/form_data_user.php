<?php foreach ($user as $key => $value) : ?>
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input class="form-control" value="<?= $value->nama_user ?>" readonly />
    </div>
    <div class="mb-3">
        <label class="form-label">Sebutan Jabatan</label>
        <input class="form-control" value="<?= $value->sebutan_jabatan ?>" readonly />
    </div>
    <div class="mb-3">
        <label class="form-label">Divisi</label>
        <input type="text" class="form-control" value="" name="" readonly />
    </div>
<?php endforeach; ?>