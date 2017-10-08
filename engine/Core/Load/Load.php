<?php

namespace Engine\Core\Load;

class Load
{
    private $di;

    public function __construct($di)
    {
        $this->di = $di;
    }

    public function model($class)
    {
        $model = '\\System\\Model\\' . $class;

        return new $model($this->di);
    }
}