// untuk bikin pop up dengan js

$(document).ready(function () {
    $(document.body).on('submit', '.js-confirm', function () {
        var sel = $(this)
        var text = sel.data('confirm') ? sel.data('confirm') : 'Anda yakin akan menghapus ?'
        var c = confirm(text)
        return c;
    })

    $('.js-selectize').selectize({
        sortField: 'text'
    });
});