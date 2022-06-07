function getErrorHtml(elemErrors)
{
    if (typeof (elemErrors) === 'undefined' || elemErrors.length < 1)
    {
        return;
    }
    
    var out = '<div><ul class="errors">';
    for (var i = 0; i < elemErrors.length; i++)
    {
        out += '<li>' + elemErrors[i] + '</li>';
    }
    out += '</ul></div>';

    return out;
}

function validateElement(id, actionUrl, formId, ids = ["tipology"])
{
    var formData;
    
    function addFormToken(formData)
    {
        var token = $("#" + formId + " input[name=_token]").val();
        formData.append('_token', token);
    }
    
    function addElement(formData, id)
    {
        var element = $("#" + id);
        var val = element.val();
        formData.append(id, val);
    }

    function sendAjaxRequest()
    {
        $.ajax({
            type: 'POST',
            url: actionUrl,
            data: formData,
            dataType: "json",
            error: function (data)
            {
                if (data.status === 403)
                {
                    var errMessages = JSON.parse(data.responseText);
                    $("#" + id).parent().find('.errors').html(' ');
                    $("#" + id).after(getErrorHtml(errMessages[id]));
                }
            },
            contentType: false,
            processData: false
        });
    }

    var element = $("#" + id);
    if (element.attr('type') === 'file')
    {
        if (element.val() !== '')
        {
            inputVal = element.get(0).files[0];
        } else
        {
            inputVal = new File([""], "");
        }
    } else
    {
        inputVal = element.val();
    }

    formData = new FormData();
    formData.append(id, inputVal);
    addFormToken(formData);
    
    for(var i=0; i<ids.length; i++)
    {
        if(id != ids[i])
        {
            addElement(formData, ids[i]);
        }
    }
    
    sendAjaxRequest(formData);
}

function validateForm(actionUrl, formId)
{
    var formData = new FormData(document.getElementById(formId));

    $.ajax({
        type: 'POST',
        url: actionUrl,
        data: formData,
        dataType: "json",
        error: function (data)
        {
            if (data.status === 403)
            {
                var errMessages = JSON.parse(data.responseText);

                $.each(errMessages, function (id)
                {
                    $("#" + id).parent().find('.errors').html(' ');
                    $("#" + id).after(getErrorHtml(errMessages[id]));
                });
            }
        },
        success: function (data)
        {
            window.location = data.redirect;
        },
        contentType: false,
        processData: false
    });
}

