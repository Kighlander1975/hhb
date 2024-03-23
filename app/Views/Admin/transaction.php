<?= $this->extend('Layouts/Backend/default') ?>

<?= $this->section('content') ?>

    <h1>Neue Buchung</h1>
    <?= form_open('step1') ?>



    <?= form_close() ?>

<?= $this->endSection() ?>