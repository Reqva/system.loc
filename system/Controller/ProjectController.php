<?php

namespace System\Controller;


use Engine\AbstractController;
use Engine\Helper\Common;

class ProjectController extends AbstractController
{
    public function index()
    {
        $this->view->render('header');
        $this->view->render('projects');
    }

    public function viewProjects()
    {
        $projects = $this->show->show('project');

        echo json_encode($projects);
    }

    public function createProject()
    {
        $response = Common::getPostBody();

        $this->checker->setCheckParams(['name' => 255, 'p_key' => 3]);


        if (!$this->checker->runCheck($response) || strlen($response['p_key']) != 3) {
            echo json_encode(false);
            return;
        }

        if (!$this->checkKey($response['p_key'])) {
            echo json_encode(false);
            return;
        }

        $projectRecord = $this->load->model('ProjectRecord');
        $projectRecord->setName($response['name']);
        $projectRecord->setKey($response['p_key']);
        $id = $projectRecord->save();

        if (!$id) {
            echo json_encode(false);
            return;
        }

        $response['id'] = $id;

        echo json_encode([$response]);
    }

    private function checkKey($key)
    {
        $keyArray = $this->show->show('project');

        for ($i = 0; $i < count($keyArray); $i++) {
            if ($keyArray[$i]['p_key'] === $key) {
                return false;
            }
        }

        return true;
    }
}