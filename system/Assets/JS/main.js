function requestServer(url, data, functionHandler) {
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        contentType: 'application/json',
        data: data,
        cache: false,
        processData: false,
        success: function (result) {
            functionHandler(result);
        }
    });
}

function recordHandler(data) {
    if (!data) {
        renderError();
        return;
    }
        dialog.close();
        document.forms.create.reset();
        renderRow(data);
}

var dialog = document.querySelector('dialog');

document.querySelector('.row-add').onclick = function() {
    dialog.showModal();
};
document.querySelector('.close').onclick = function() {
    dialog.close();
    document.forms.create.reset();
};

document.querySelector('.submit').onclick = function () {
    var form = new FormData(document.forms.create);
    formHandler(form);
};

function renderError() {
    dialog.querySelector('#errorMessage').innerHTML = 'Произошла ошибка';
}

