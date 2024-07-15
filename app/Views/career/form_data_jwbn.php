<?php foreach ($jwbn as $key => $value) : ?>
    <tr>
        <td>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="id_nd_jwbn" id="flexRadioDefault1" value="<?= $value->id_jwbn ?>">
                <input type="hidden" name="nd_jwbn_1_to_requestr" value="<?= $value->no_jwbn ?>">
                <input type="hidden" name="tgl_nd_jwbn_1_to_requestr" value="<?= $value->tgl_jwbn ?>">
            </div>
        </td>
        <td><?= $value->no_jwbn ?></td>
        <td><?= $value->tgl_jwbn ?></td>
        <td><?= $value->perihal_jwbn ?></td>
        <td><?= $value->asal_jwbn ?></td>
        <td><?= $value->tujuan_jwbn ?></td>
    </tr>
<?php endforeach; ?>