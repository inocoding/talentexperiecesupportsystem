<?php foreach ($konfirm as $key => $value) : ?>
    <tr>
        <td>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="id_nd_konfirm" id="flexRadioDefault1" value="<?= $value->id_konfirm ?>">
                <input type="hidden" name="nd_kfrm_to_for_collab" value="<?= $value->no_konfirm ?>">
                <input type="hidden" name="tgl_nd_kfrm_to_for_collab" value="<?= $value->tgl_konfirm ?>">
            </div>
        </td>
        <td><?= $value->no_konfirm ?></td>
        <td><?= $value->tgl_konfirm ?></td>
        <td><?= $value->perihal_konfirm ?></td>
        <td><?= $value->asal_konfirm ?></td>
        <td><?= $value->tujuan_konfirm ?></td>
    </tr>
<?php endforeach; ?>