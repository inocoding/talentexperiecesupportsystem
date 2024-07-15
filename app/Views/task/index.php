<div id="tabel_list">
    <table class="table table-borderless">
        <tbody>
            <?php
            foreach ($list as $key => $value) : ?>
                <tr>
                    <td scope="row">
                        <div class="mb-2 scroll-item">
                            <label class="form-check w-100 checked-line-through checked-opacity-75">
                                <input type="checkbox" class="form-check-input" />
                                <span class="form-check-label d-block">
                                    <span><?= $value->deskripsi_list ?></span>
                                    <span class="text-muted d-block text-small mt-0"><?= $value->start_date_list ?></span>
                                </span>
                            </label>
                        </div>
                    </td>
                    <td align="right">
                        <button class="btn btn-outline btn-foreground float-right" style="margin-right: 0px;" type="button">
                            delete
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>