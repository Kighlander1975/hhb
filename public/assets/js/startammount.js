$(document).ready(function () {

const startAmmountModal = new bootstrap.Modal('#startammountModal', {
    keyboard: false,
    backdrop: 'static',
});

startAmmountModal.show();

console.log(startAmmountModal);

$('.modal').on('shown.bs.modal', function () {
   $(this).find('[autofocus]').focus();
});

});



