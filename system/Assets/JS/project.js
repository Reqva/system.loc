requestServer('/project/view', null, renderRow);

var projectRow = document.querySelector('.clone');

function renderRow(data) {
    for (var i = 0; i < data.length; i++) {
        var newRow = projectRow.cloneNode(true);
        newRow.classList.remove('clone');
        newRow.hidden = false;
        newRow.setAttribute('data-project-key', data[i]['p_key']);
        newRow.querySelector('.name-link').appendChild(document.createTextNode(data[i]['name']));
        newRow.querySelector('.key').innerHTML = (data[i]['p_key']);
        newRow.querySelector('.name-link').setAttribute('href', '/project/' + data[i]['p_key']);
        newRow.querySelector('.action-link').setAttribute('href', '/project/' + data[i]['p_key']);
        projectRow.parentElement.insertBefore(newRow, projectRow);
    }
}

function formHandler(form) {
    if (!checker(form)) {
        return;
    }

    var params = {
        name: form.get('name'),
        p_key: form.get('p_key')
    };

    var data = JSON.stringify(params);

    requestServer('/project/create', data, recordHandler)
}

function checker(form) {
    var name = form.get('name');
    var key = form.get('p_key');
    var messageSpace = dialog.querySelector('#errorMessage');

    if (name.length > 255 ) {
        messageSpace.innerHTML = 'Название превышает допустимую длину';
        return false;
    }

    if (key.length > 3 || !isNaN(key) || !keyChecker(key)) {
        messageSpace.innerHTML = 'Ключ должен состоять из трех латинских символов и быть уникальным';
        return false;
    }

    if (name.length < 1 || key.length < 1) {
        messageSpace.innerHTML = 'Все поля обязательны к заполнению';
        return false;
    }

    return true;
}

function keyChecker(key) {
    var keys = document.querySelectorAll('.key');

    for (var i = 0; i < keys.length; i++) {
        if (key === keys[i].firstChild.data) {
            return false;
        }
    }

    return true;
}