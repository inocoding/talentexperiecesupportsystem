<?php
foreach ($data as $key => $value) : ?>
    <tr>
        <td>
            <div class="form-check">
                <input name="id_eval_mutasi[]" value="<?= $value->id_eval ?>" class="form-check-input" type="checkbox" id="flexCheckDefault">
            </div>
        </td>
        <td><?= $value->nama_eval ?>
            <input type="hidden" name="">
        </td>
        <td><?= $value->nip_eval ?></td>

        <td>
            <?php
            if ($value->jenis_mutasi == 1) {
                echo '<span class="badge bg-primary">Lolos Butuh</span>';
            } elseif ($value->jenis_mutasi == 2) {
                echo '<span class="badge bg-secondary">APS</span>';
            } elseif ($value->jenis_mutasi == 3) {
                echo '<span class="badge bg-tertiary">Bursa</span>';
            } elseif ($value->jenis_mutasi == 4) {
                echo '<span class="badge bg-quaternary">Rotasi Internal Div</span>';
            } elseif ($value->jenis_mutasi == 5) {
                echo '<span class="badge bg-info">Berangkat PTB</span>';
            } elseif ($value->jenis_mutasi == 6) {
                echo '<span class="badge bg-info">Kembali PTB</span>';
            } elseif ($value->jenis_mutasi == 7) {
                echo '<span class="badge bg-warning">Promosi</span>';
            } elseif ($value->jenis_mutasi == 8) {
                echo '<span class="badge bg-danger">Demosi</span>';
            } elseif ($value->jenis_mutasi == 9) {
                echo '<span class="badge bg-success">Rotasi Internal Dir</span>';
            }
            ?>
        </td>
        <td><?= $value->unit_asal ?></td>
        <td id="unitTujuan">
            <?php
            if ($value->unit_tujuan == 1000) {
                echo $value->div_tujuan;
            } else {
                echo $value->nama_org_satu;
            }
            ?>
        </td>
        <td>
            <?php
            if ($value->hasil_evaluasi_akhir == 0) {
                echo "Belum Dapat Ditindaklanjuti";
            } else {
                echo "Dapat Ditindaklanjuti";
            }

            ?>
        </td>

    </tr>
<?php endforeach; ?>