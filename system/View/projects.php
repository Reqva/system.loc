<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Project System</title>
    <link rel="stylesheet" href="/System/Assets/Css/project.css">
</head>
<body>
<div class="content">
    <div class="title">Проекты</div>
    <div class="project row clone" hidden>
        <div class="name"><a href="" class="name-link"></a></div>
        <div class="key">1</div>
        <div class="action"><a href="" class="action-link">Задачи</a></div>
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
            <label for="name">Название</label><br>
            <input type="text" id="name" name="name" required maxlength="255"><br>
            <label for="p_key">Ключ</label><br>
            <input type="text" id="p_key" name="p_key" required maxlength="3"><br>
            <button form="project-create" class="btn submit">Создать</button>
        </form>
        <div id="errorMessage"></div>
    </div>
</dialog>
<script type="text/javascript" src="/System/Assets/JS/main.js"></script>
<script type="text/javascript" src="/System/Assets/JS/project.js"></script>
</body>
</html>

