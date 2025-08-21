<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation">
    <ul class="pagination">
        <?php if ($pager->hasPrevious()) : ?>
            <!-- <li class="page-item shadow">
                <a class="page-link" href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
                    <span aria-hidden="true">#1</span>
                </a>
            </li> -->
            <li class="page-item shadow">
                <a class="page-link" href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
                    <i data-cs-icon="chevron-left"></i>
                    <!-- <span aria-hidden="true"><?= lang('Pager.previous') ?></span> -->
                </a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li class="page-item shadow <?= $link['active'] ? 'active' : '' ?>">
                <a class="page-link" href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
            <li class="page-item shadow">
                <a class="page-link" href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
                    <i data-cs-icon="chevron-right"></i>
                    <!-- <span aria-hidden="true"><?= lang('Pager.next') ?></span> -->
                </a>
            </li>
            <!-- <li class="page-item shadow"> -->
            <!-- <a class="page-link" href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>"> -->
            <!-- <span aria-hidden="true">end</span> -->
            <!-- </a> -->
            <!-- </li> -->
        <?php endif ?>
    </ul>
</nav>