<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Project System</title>
    <link rel="stylesheet" href="/System/Assets/Css/task.css">
</head>
<body>
<div class="content">
    <div class="title project-title">Задачи <span class="project-pointer">в проекте <a href="" class="task-project-name"></a></span></div>
        <div class="task row clone" hidden>
            <div class="key-id"><a href="" class="key-link"></a></div>
            <div class="status"><span id="status"></span></div>
            <div class="name"></div>
            <div class="description"></div>
            <div class="action"><a href="" class="action-link">Подробнее</a></div>
        </div>
        <button type="button" class="btn row-add">+ добавить</button>
</div>
<dialog class="form">
    <div class="title">
        <span class="form-title">Новая задача</span>
        <span class="close">X</span>
    </div>
    <div class="input">
        <form action="" method="post" name="create">
            <label for="name">Название:</label><br>
            <input type="text" id="name" name="name" required maxlength="255"><br>
            <label for="status">Статус:</label><br>
            <select id="statusSelect" name="statusSelect">
            </select><br>
            <label for="type">Тип задачи:</label><br>
            <select id="type" name="type">
                <option value="улучшение">улучшение</option>
                <option value="баг">баг</option>
                <option value="доработка">доработка</option>
            </select><br>
            <label for="description">Описание:</label><br>
            <textarea id="description" name="description"></textarea><br>
            <button form="task-create" id="submit" class="btn submit" >Создать</button>
            <button form="task-create" id="save" class="btn save hide">Сохранить</button>
        </form>
    </div>
    <div id="errorMessage"></div>
</dialog>
<script type="text/javascript" src="/System/Assets/JS/main.js"></script>
<script type="text/javascript" src="/System/Assets/JS/projectTasks.js"></script>
<script type="text/javascript" src="/System/Assets/JS/moreInfo.js"></script>
</body>
</html>