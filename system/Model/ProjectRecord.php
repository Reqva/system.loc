<?php

namespace System\Model;


use Engine\Service\AbstractModel;

class ProjectRecord extends AbstractModel
{
    private $name;
    private $key;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setKey($key)
    {
        $this->key = $key;
    }

    public function save()
    {
        $sql = 'INSERT INTO project (name, p_key) VALUE (? , ?)';
        $values = [$this->name, $this->key];
        $this->db->query($sql, $values);

        return $this->db->getId();
    }
}