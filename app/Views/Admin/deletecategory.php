<?= $this->extend('Layouts/Backend/default') ?>

<?= $this->section('content') ?>

<div class="container-xl text-center">

    <h1 class="app-page-title">Vorgeschlagene Kategorie "<strong><?= esc($category->cat_id)." ".esc($category->cat_text) ?></strong>" wirklich löschen?</h1>
    <?=  form_open('/deletecategory/'.$category->cat_id); ?>
    <button class="btn btn-primary mx-2">Löschen</button>
    <a class="btn btn-danger" role="button" href="<?= previous_url() ?>">Abbruch</a>
    <?= form_close() ?>

</div><!--//container-fluid-->

<?= $this->endSection() ?>