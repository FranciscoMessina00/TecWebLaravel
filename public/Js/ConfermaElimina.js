$(function () {

    $('li#elimina').on('click', function () {
        var modifica = $(this).closest('ul').find('#modifica');
        var elimina = $(this).closest('ul').find('#elimina');
        var sicuro = $(this).closest('ul').find('#sicuro');
        var si = $(this).closest('ul').find('#si');
        var no = $(this).closest('ul').find('#no');

        var buttons = [
            modifica,
            elimina,
            sicuro,
            si,
            no
        ];
        
        for (var button in buttons) {
            buttons[button].toggle('fast');
        }

    });
    
    $('li#no').on('click', function () {
        var modifica = $(this).closest('ul').find('#modifica');
        var elimina = $(this).closest('ul').find('#elimina');
        var sicuro = $(this).closest('ul').find('#sicuro');
        var si = $(this).closest('ul').find('#si');
        var no = $(this).closest('ul').find('#no');

        var buttons = [
            modifica,
            elimina,
            sicuro,
            si,
            no
        ];
        for (var button in buttons) {
            buttons[button].toggle('fast');
        }

    });
});
