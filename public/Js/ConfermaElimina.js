$(function () {

    $('li#elimina').on('click', function () {
        var buttons = [$(this).closest('ul').find('#modifica'), $(this).closest('ul').find('#elimina'), $(this).closest('ul').find('#sicuro'), $(this).closest('ul').find('#si'), $(this).closest('ul').find('#no')];
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
        var buttons = [$(this).closest('ul').find('#modifica'), $(this).closest('ul').find('#elimina'), $(this).closest('ul').find('#sicuro'), $(this).closest('ul').find('#si'), $(this).closest('ul').find('#no')];
        for (var button in buttons) {
            if (buttons[button].hasClass('nascondi')) {
                buttons[button].hide('fast');
            } else {
                buttons[button].show('fast');
            }
        }

    });
});