<?php

namespace System\Controller;


use Engine\AbstractController;
use Engine\Helper\Common;

class TaskController extends AbstractController
{
    public function index()
    {
        $this->view->render('header');
        $this->view->render('task');
    }

    public function projectTasks()
    {
        $this->view->render('header');
        $this->view->render('projectTask');
    }

    public function viewProjectTasks()
    {
        $key = Common::getPostBody();
        $key = explode('/', $key['key']);

        $taskList = $this->show->show('task', 'p_key', $key[2]);

        for($i = 0; $i < count($taskList); $i++) {
            $taskList[$i]['key-id'] = $taskList[$i]['p_key'] . '-' . $taskList[$i]['id'];
        }

        echo json_encode($taskList);
    }

    public function viewProjectTitle()
    {
        $key = Common::getPostBody();
        $key = explode('/', $key['key']);

        $taskList = $this->show->show('project', 'p_key', $key[2]);
        $request['name'] = $taskList[0]['name'];
        $request['key'] = $taskList[0]['p_key'];

        echo json_encode($request);
    }

    public function getStatusList()
    {
        $statusList = $this->show->show('status');

        echo json_encode($statusList);
    }

    public function viewTasks()
    {
        $projects = $this->show->show('task');

        for($i = 0; $i < count($projects); $i++) {
            $projects[$i]['key-id'] = $projects[$i]['p_key'] . '-' . $projects[$i]['id'];
        }

        echo json_encode($projects);
    }

    public function createTask()
    {
        $response = Common::getPostBody();

        $this->checker->setCheckParams(['p_key' => 3, 'name' => 255, 't_status' => 20, 'type' => 50]);

        if (!$this->checker->runCheck($response)) {
            echo json_encode(false);
            return;
        }

        $taskRecord = $this->load->model('TaskRecord');
        $taskRecord->setKey($response['p_key']);
        $taskRecord->setName($response['name']);
        $taskRecord->setStatus($response['t_status']);
        $taskRecord->setType($response['type']);
        $taskRecord->setDescription($response['description']);

        $id = $taskRecord->save();

        if(!$id) {
            echo json_encode(false);
            return;
        }

        $response['id'] = $id;
        $response['key-id'] = $response['p_key'] . '-' . $id;

        echo json_encode([$response]);
    }

    public function getTaskInfo()
    {
        $id = $this->parameters;

        $taskInfo = $this->show->show('task', 'id', $id);

        if(!$taskInfo) {
            echo json_encode(false);
            return;
        }

        echo json_encode($taskInfo);
    }

    public function updateTask()
    {
        $response = Common::getPostBody();

        $this->checker->setCheckParams(['id' => 6, 'name' => 255, 't_status' => 20, 'type' => 50]);

        if (!$this->checker->runCheck($response)) {
            echo json_encode(false);
            return;
        }

        $taskRecord = $this->load->model('TaskRecord');
        $taskRecord->setId($response['id']);
        $taskRecord->setKey($response['p_key']);
        $taskRecord->setName($response['name']);
        $taskRecord->setStatus($response['t_status']);
        $taskRecord->setType($response['type']);
        $taskRecord->setDescription($response['description']);

        $id = $taskRecord->save();


        if(!$id) {
            echo json_encode(false);
            return;
        }

        echo json_encode($response);
    }
}