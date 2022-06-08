$(function () {
    $(':input').on('change', function (event) {
        var element = $(this);
        element.removeClass('tagError');
            switch (element.attr('id')) {
                case 'name':
                    var pattern = /^([A-Za-z])+$/;
                    $('#lettereNome').remove();
                    if (!pattern.test(element.val())) {
                        element.addClass('tagError');
                        if(element.val()!==''){
                            element.after('<p class="errors" id="lettereNome">Inserire solo lettere maiuscole o minuscole</p>');
                        }
                        
                    }
                    break;
                case 'surname':
                    var pattern = /^([A-Za-z])+$/;
                    $('#lettereCognome').remove();
                    if (!pattern.test(element.val())) {
                        element.addClass('tagError');
                        if(element.val()!==''){
                            element.after('<p class="errors" id="lettereCognome">Inserire solo lettere maiuscole o minuscole</p>');
                        }
                    }
                    break;
                case 'username':
                    var pattern = /^([A-Za-z0-9_\-\.\@])+$/;
                    $('#usNonValido').remove();
                    if (!pattern.test(element.val())) {
                        element.addClass('tagError');
                        if(element.val()!==''){
                            element.after('<p class="errors" id="usNonValido">Username non valido</p>');
                        }
                    }
                    break;
                case 'password':
                    $('#corto').remove();
                    if (element.val().length < 4) {
                        element.addClass('tagError');
                        if(element.val()!==''){
                            element.after('<p class="errors" id="corto">Password troppo corta</p>');
                        }
                        
                    }
                    break;
                case 'email':
                    var pattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,6})$/;
                    $('#mailNonValido').remove();
                    if (!pattern.test(element.val())) {
                        element.addClass('tagError');
                        if(element.val()!==''){
                            element.after('<p class="errors" id="mailNonValido">E-mail non valida</p>');
                        }
                        
                    }
                    break;
            }
        

    });

    $('form').on('submit', function (event) {
        $(':input').trigger('change');
        if ($(':input').filter('[class*=tagError]').length !== 0) {
            return false;
        }
        ;
    });
});

