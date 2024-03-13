<?= $this->extend('Layouts/Backend/default') ?>

<?= $this->section('content') ?>

<div class="container-xl">

    <h1 class="app-page-title">Datenbank</h1>
    <div class="row justify-content-around">

        <div class="col-md-8 shadow-sm rounded my-1 bg-body p-2">
            <h5>Neue Kategorie-Vorschläge</h5>
            <?php if (count($unconfirmed)!==0) : ?>
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr class="align-top">
                                <th style="width: 10%">Kat.-ID</th>
                                <th style="width: 70%">Kategorie-Text</th>
                                <th colspan="2" class="text-center">Aktion?</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($unconfirmed as $item) : ?>
                                <tr>
                                    <td><?= esc($item->cat_id) ?></td>
                                    <td><?= esc($item->cat_text) ?></td>
                                    <td><a role="button" class="btn btn-primary" href="<?= site_url('/confirmcategory/') . $item->cat_id ?>" style="width: 120px">Übernehmen</a></td>
                                    <td><a role="button" class="btn btn-danger" href="<?= site_url('/deletecategory/') . $item->cat_id ?>" style="width: 120px">Verwerfen</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else : ?>
                <p>Keine unbestätigten Kategorien vorhanden.</p>
            <?php endif; ?>
        </div>

        <div class="col-md-3 shadow-sm rounded my-1 bg-body p-2">
            <?php if (session('errors') !== null) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Fehler!</strong>
                    <ul>
                        <?php foreach (session('errors') as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            
        </div>

    </div>

</div><!--//container-fluid-->

<?= $this->endSection() ?>