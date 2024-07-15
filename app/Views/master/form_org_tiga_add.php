<option label="&nbsp;"></option>
<?php foreach ($org_tiga as $key => $value) : ?>
    <option value="<?= $value->kode_org_tiga ?>"><?= $value->nama_org_tiga ?></option>
<?php endforeach; ?>