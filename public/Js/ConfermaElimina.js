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
            //vedi se usare toggleClass()
            if (buttons[button].hasClass('nascondi')) {
                buttons[button].show('fast');
            } else {
                buttons[button].hide('fast');
            }
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
            if (buttons[button].hasClass('nascondi')) {
                buttons[button].hide('fast');
            } else {
                buttons[button].show('fast');
            }
        }

    });
});
