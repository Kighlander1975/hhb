<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center m-0">

        <li class="page-item mx-1">
            <a class="btn btn-outline-info<?= ($pager->hasPrevious()) ? "" : " disabled" ?>" role="button" href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
                <span aria-hidden="true"><i class="fa-solid fa-backward-fast"></i></span>
            </a>
        </li>
        <li class="page-item mx-1">
            <a class="btn btn-outline-info<?= ($pager->hasPrevious()) ? "" : " disabled" ?>" role="button" href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
                <span aria-hidden="true"><i class="fa-solid fa-backward-step"></i></span>
            </a>
        </li>


        <?php foreach ($pager->links() as $link) : ?>
            <li class="mx-1">
                <a class="btn <?= $link['active'] ? 'btn-info' : 'btn-outline-info' ?>" role="button" href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>


        <li class="page-item mx-1">
            <a class="btn btn-outline-info<?= ($pager->hasNext()) ? "" : " disabled" ?>" role="button" href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
                <span aria-hidden="true"><i class="fa-solid fa-forward-step"></i></span>
            </a>
        </li>
        <li class="page-item mx-1">
            <a class="btn btn-outline-info<?= ($pager->hasNext()) ? "" : " disabled" ?>" role="button" href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
                <span aria-hidden="true"><i class="fa-solid fa-forward-fast"></i></span>
            </a>
        </li>

    </ul>
</nav>