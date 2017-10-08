<?php

namespace System\Model;

use Engine\Service\AbstractModel;

class ShowEntries extends AbstractModel
{
    public function show($table, $parameter = null, $key = null)
    {
        $condition = '';

        if (isset($key) && isset($parameter)) {
            $condition = ' WHERE ' . $parameter . ' = ?';
        }

        $sql = "SELECT * FROM "  . $table . $condition;

        return $this->db->query($sql, [$key]);
    }
}