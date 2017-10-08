<?php

namespace System\Controller;


use Engine\AbstractController;

class ErrorController extends AbstractController
{
    public function index()
    {
        $this->view->render('header');
        $this->view->render('error');
    }
}