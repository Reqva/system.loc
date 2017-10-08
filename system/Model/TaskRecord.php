<?php

namespace System\Model;


use Engine\Service\AbstractModel;

class TaskRecord extends AbstractModel
{
    private $id;
    private $key;
    private $name;
    private $status;
    private $type;
    private $description;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setKey($key)
    {
        $this->key = $key;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function save()
    {
        if (isset($this->id)) {
            return $this->update();
        }

        return $this->insert();
    }

    private function insert()
    {
        $sql = 'INSERT INTO task (p_key, name, t_status, type, description) VALUE (?, ?, ?, ?, ?)';
        $values = [$this->key, $this->name, $this->status, $this->type, $this->description];

        $this->db->query($sql, $values);

        return $this->db->getId();
    }

    private function update()
    {
        $sql = 'UPDATE task SET name = ?, t_status = ?, type = ?, description = ? WHERE id = ?';
        $values = [$this->name, $this->status, $this->type, $this->description, $this->id];

        $this->db->query($sql, $values);

        return true;
    }
}