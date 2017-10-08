requestServer('/tasks/view', null, renderRow);

var taskRow = document.querySelector('.clone');

function renderRow(data) {
    for (var i = 0; i < data.length; i++) {
        var newRow = taskRow.cloneNode(true);
        newRow.classList.remove('clone');
        newRow.hidden = false;
        newRow.setAttribute('id', data[i]['id']);
        newRow.setAttribute('data-project-key', data[i]['p_key']);
        newRow.querySelector('.key-id').appendChild(document.createTextNode(data[i]['key-id']));
        newRow.querySelector('#status').appendChild(document.createTextNode(data[i]['t_status']));
        newRow.querySelector('.status').classList.add(data[i]['t_status']);
        newRow.querySelector('.name').appendChild(document.createTextNode(data[i]['name']));
        newRow.querySelector('.description').appendChild(document.createTextNode(data[i]['description']));
        newRow.querySelector('.key-link').setAttribute('href', '/task/' + data[i]['id']);
        newRow.querySelector('.action-link').setAttribute('href', '/task/' + data[i]['id']);
        taskRow.parentElement.insertBefore(newRow, taskRow);
    }
}


requestServer('/tasks/status', null, renderStatus);

function renderStatus(data) {
    var select = document.querySelector('#statusSelect');

    for (var i = 0; i < data.length; i++) {
        var option = document.createElement('option');
        var status = data[i]['status'];
        option.className = status;
        option.innerHTML = status;
        option.setAttribute('value', status);
        select.appendChild(option);
    }
}