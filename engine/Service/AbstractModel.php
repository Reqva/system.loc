<?php

namespace Engine\Service;


abstract class AbstractModel
{
    protected $di;
    protected $db;

    public function __construct($di)
    {
        $this->di = $di;
        $this->db = $this->di->get('db');
    }
}