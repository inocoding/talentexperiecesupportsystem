<?php foreach ($balasan as $key => $value) : ?>
    <tr>
        <td>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="id_nd_balasan" id="flexRadioDefault1" value="<?= $value->id_balasan ?>">
                <input type="hidden" name="nd_blsn_kfrm_from_for_collab" value="<?= $value->no_balasan ?>">
                <input type="hidden" name="tgl_nd_blsn_kfrm_from_for_c" value="<?= $value->tgl_balasan ?>">
            </div>
        </td>
        <td><?= $value->no_balasan ?></td>
        <td><?= $value->tgl_balasan ?></td>
        <td><?= $value->perihal_balasan ?></td>
        <td><?= $value->asal_balasan ?></td>
        <td><?= $value->tujuan_balasan ?></td>
    </tr>
<?php endforeach; ?>