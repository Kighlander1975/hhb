<?= $this->extend('Layouts/Backend/default') ?>

<?= $this->section('content') ?>

<div class="container-xl">

    <h1 class="app-page-title">Neue Kategorie vorschlagen</h1>
    <div class="col-12 shadow-sm rounded my-1 bg-body p-2">
        <p>
            Wähle eine Kategorie-ID aus (entweder eine Einnahme- ode Ausgabe-Kategorie). Es ist möglich, dass so viele Kategorien vorgeschlagen wurden, dass derzeit keine weiteren hinzugefügt werden können.<br>
            Wenn alle Kategorie-Plätze vergeben sind, wird dieser Menüpunkt außer Kraft gesetzt.
        </p>
        <?php if ($cat_id_ein === null && $cat_id_aus === null) : ?>
            <p>Maximale Anzahl an (vorgeschlagenen) Kategorien erreicht.</p>
        <?php else : ?>
            <?= form_open('/create_new_cat', ['class' => 'row row-cols-lg-auto g-3 align-items-center']); ?>
            <div class="col-12 form-floating">
                <?= form_dropdown('cat_id', $cat_options, ($cat_id_ein !== null) ? $cat_id_ein : $cat_id_aus, ['class' => 'form-select', 'id' => 'cat_id', 'aria-label' => 'Kategorie ID']) ?>
                <label for="cat_id">Kategorie ID</label>
            </div>
            <div class="col-12 form-floating">
                <?= form_input('cat_text', '', ['class' => 'form-control', 'id' => 'cat_text', 'placeholder' => 'Kategorie Titel', 'style' => 'width:400px']) ?>
                <?= form_label('Kategorie Titel', 'cat_text') ?>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit"><?= (auth()->user()->inGroup('superadmin') ? "Anlegen" : "Vorschlagen") ?></button>
            </div>
            <?= form_close(); ?>
        <?php endif; ?>
    </div>
</div><!--//container-fluid-->

<?= $this->endSection() ?>