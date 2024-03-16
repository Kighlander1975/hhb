<div class="modal fade" tabindex="-1" id="startammountModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?= form_open('/setammount') ?>
            <div class="modal-header">
                <h5 class="modal-title">Initialer Kontostand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= validation_list_errors() ?>
                <p>Für das erste Benutzen des Haushaltsbuches muss ein Startbetrag des zu verwaltenes Konto eingegeben
                    werden. Bitte KEINE 1000er Trennzeichen, Währungssymbole oder Leerzeichen benutzen. Als Trenner für
                    die Cent-Beträge kann das Komma oder der Punkt genutzt werden.</p>
                <div class="form-floating">
                    <input type="text" class="form-control" id="ammount" name="ammount" title="Start Kontostand"
                           placeholder="Start Kontostand" autofocus required value="<?= esc(old('ammount')) ?>">
                    <label for="ammount">Start Kontostand</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>