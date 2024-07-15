<option label="&nbsp;"></option>
<?php foreach ($org_dua as $key => $value) : ?>
    <option value="<?= $value->kode_org_dua ?>"><?= $value->nama_org_dua ?></option>
<?php endforeach; ?>