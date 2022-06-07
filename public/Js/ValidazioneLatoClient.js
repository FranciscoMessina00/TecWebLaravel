$(function () {
    $(':input').on('change', function (event) {
        var element = $(this);
        element.removeClass('tagError');
        $('.errors').hide();
        switch (element.attr('id')) {
            case 'name':
            case 'surname':
                var pattern = /^([A-Za-z])+$/;
                if (!pattern.test(element.val())) {
                    element.addClass('tagError');
                    element.after('<p class="errors">Inserire solo lettere maiuscole o minuscole</p>');
                }
                break;
            case 'username':
                var pattern = /^([A-Za-z0-9_\-\.\@])+$/;
                if (!pattern.test(element.val())) {
                    element.addClass('tagError');
                    element.after('<p class="errors">Username non valido</p>');
                }
                break;
            case 'password':
                if (element.val().length < 4) {
                    element.addClass('tagError');
                    element.after('<p class="errors">Password troppo corta</p>');
                }
                break;
            case 'email':
                var pattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,6})$/;
                if (!pattern.test(element.val())) {
                    element.addClass('tagError');
                    element.after('<p class="errors">E-mail non valida</p>');
                }
                break;
        }
        ;
    });

    $('form').on('submit', function (event) {
        $(':input').trigger('change');
        if ($(':input').filter('[class*=tagError]').length !== 0) {
            return false;
        }
        ;
    });
});

