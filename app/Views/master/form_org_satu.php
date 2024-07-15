<option label="&nbsp;"></option>
<?php foreach ($org_satu as $key => $value) : ?>
    <option value="<?= $value->kode_org_satu ?>" <?= $value->kode_org_satu == $dapeg->unit_induk ?  'selected' : null; ?>><?= $value->kode_org_satu ?>, <?= $value->nama_org_satu ?></option>
<?php endforeach; ?>