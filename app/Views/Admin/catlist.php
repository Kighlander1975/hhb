<?= $this->extend('Layouts/Backend/default') ?>

<?= $this->section('content') ?>

<div class="container-xl">

    <h1 class="app-page-title">Kategorien - Liste</h1>
    <div class="row justify-content-around">

        <div class="col-md-8 shadow-sm rounded my-1 bg-body p-2">

            <?php $flag = 0; ?>
            <?php if ($categories) : ?>
                <div class="table-responsive">
                    <table class="table table-striped table-sm align-middle" style="font-size: 0.9rem">
                        <thead>
                            <tr class="align-top">
                                <th style="width: 15%;">Kategorie Nr.</th>
                                <th style="width: 70%;">Kategorie Titel</th>
                                <th style="width: 15%;">Aktionen*</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="background-color:gray !important;">
                                <td colspan="3"><em style="color: #fff !important"><strong>Einnahmen - Kategorien</strong></em></td>
                            </tr>
                            <?php foreach ($categories as $category) : ?>
                                <?php if ((int)$category->cat_id > 4999 && $flag === 0) : ?>
                                    <tr style="background-color:gray !important;">
                                        <td colspan="3"><em style="color: #fff !important"><strong>Ausgaben - Kategorien</strong></em></td>
                                    </tr>
                                <?php $flag = 1;
                                endif; ?>
                                <tr>
                                    <td><?= esc($category->cat_id) ?></td>
                                    <td><?= esc($category->cat_text) ?></td>
                                    <td>
                                        <a role="button" class="btn btn-primary<?= (auth()->user()->inGroup('superadmin')) ? "" : " disabled" ?>" href="<?= (auth()->user()->inGroup('superadmin')) ? '#' : '#' ?>" <?= (auth()->user()->inGroup('superadmin')) ? '' : ' aria-disabled="true"' ?>>
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                        <a role="button" class="btn btn-danger<?= (auth()->user()->inGroup('superadmin')) ? "" : " disabled" ?>" href="<?= (auth()->user()->inGroup('superadmin')) ? site_url('/deletecategory/') . $category->cat_id : '#' ?>" <?= (auth()->user()->inGroup('superadmin')) ? '' : ' aria-disabled="true"' ?>>
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr class="align-middle">
                                <td colspan="2"><?= $pager->links(); ?></td>
                                <td class="text-end"><span class="text-muted" style="font-size: 0.7rem;">* nur für Admins</span></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <a role="button" href="#" class="btn btn-primary mb-3">Neue Kategorie<?= (!auth()->user()->inGroup('superadmin')) ? " vorschlagen" : "" ?></a>
            <?php else : ?>
                <p>Keine Kategorien vorhanden</p>
            <?php endif; ?>
        </div>
        <div class="col-md-3 shadow-sm rounded my-1 bg-body p-2">
            <p>Die Kategorien sind in zwei Bereiche aufgeteilt: Einnahmen und Ausgaben. Die Einnahmen haben die Nummern 0100 bis 4900, die Ausgaben 5000 bis 9900. Die Nummern 4900 und 9900 sind reserviert.</p>
        </div>
    </div>
</div><!--//container-fluid-->

<?= $this->endSection() ?>