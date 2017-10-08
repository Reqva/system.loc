<?php
return [
    '/' => 'ProjectController:index',
    '/projects' => 'ProjectController:index',
    '/project/view' => 'ProjectController:viewProjects',
    '/project/([a-zA-Z]{3})' => 'TaskController:projectTasks',
    '/project/create' => 'ProjectController:createProject',
    '/tasks' => 'TaskController:index',
    '/tasks/view' => 'TaskController:viewTasks',
    '/tasks/status' => 'TaskController:getStatusList',
    '/task/create' => 'TaskController:createTask',
    '/project/tasks' => 'TaskController:viewProjectTasks',
    '/project/title' => 'TaskController:viewProjectTitle',
    '/task/([0-9]+)' => 'TaskController:getTaskInfo',
    '/task/update' => 'TaskController:updateTask',

];