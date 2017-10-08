var id;

function infoHandler(pathname)
{
    requestServer(pathname, null, resultHandler)
}

function resultHandler(data)
{
    var form = document.forms.create;

    form.elements.name.value = data[0]['name'];

    var select = form.elements.statusSelect;
    for (var f = 0; f < select.options.length; f++) {
        if (select.options[f].value === data[0]['t_status']) {
            select.options[f].selected = true;
        }
    }

    select = form.elements.type;
    for (var f = 0; f < select.options.length; f++) {
        if (select.options[f].value === data[0]['type']) {
            select.options[f].selected = true;
        }
    }

    form.elements.description.value = data[0]['description'];

    document.querySelector('#submit').classList.add('hide');
    document.querySelector('#save').classList.remove('hide');

    id = data[0]['id'];

    dialog.showModal();
}

document.querySelector('.close').onclick = function() {
    dialog.close();
    document.forms.create.reset();

    document.querySelector('#submit').classList.remove('hide');
    document.querySelector('#save').classList.add('hide');
};

document.querySelector('.save').onclick = function() {
    data = getFormData();

    requestServer('/task/update', data, updateHandler);
};

function getFormData()
{
    var form = new FormData(document.forms.create);

    var params = {
        id: id,
        name: form.get('name'),
        t_status: form.get('statusSelect'),
        type: form.get('type'),
        description: form.get('description')
    };

    return JSON.stringify(params);
}

function updateHandler(data)
{
    if(!data) {
        renderError();
        return;
    }

    document.querySelector('#submit').classList.remove('hide');
    document.querySelector('#save').classList.add('hide');

    dialog.close();

    var div = document.getElementById(data['id']);

    div.querySelector('#status').innerHTML = data['t_status'];
    div.querySelector('.status').setAttribute('class', 'status ' + data['t_status']);
    div.querySelector('.name').innerHTML = data['name'];
    div.querySelector('.description').innerHTML = data['description'];
}

document.onclick = function (event) {
    if (event.target.classList.contains('action-link')) {
        event.preventDefault();
        infoHandler(event.target.pathname);
    }
};
