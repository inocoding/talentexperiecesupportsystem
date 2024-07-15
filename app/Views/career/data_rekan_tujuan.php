<?php $no = 1;
foreach ($rekan as $key => $value) : ?>
    <tr style="font-size: smaller;">
        <td><?= $no++ ?></td>
        <td><?= $value->nama_user ?></td>
        <td><?= $value->nip ?></td>
        <td><?= $value->sebutan_jabatan ?></td>
    </tr>
<?php endforeach; ?>