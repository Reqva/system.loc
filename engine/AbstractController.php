<?php

namespace Engine;

class AbstractController
{
    protected $di;
    protected $db;
    protected $view;
    protected $load;
    protected $parameters;
    protected $show;
    protected $checker;

    public function __construct($di, $parameters)
    {
        $this->di = $di;
        $this->db = $this->di->get('db');
        $this->view = $this->di->get('view');
        $this->load = $this->di->get('load');
        $this->show = $this->load->model('ShowEntries');
        $this->checker = $this->load->model('CheckModel');
        $this->parameters = $parameters;
    }

}