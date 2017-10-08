<?php

namespace Engine\Core\Database;

use PDO;

class Connect
{
    private $link;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $config = require __DIR__ . '/../../Config/DB_config.php';

        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']}" .';charset='.$config['charset'];

        $this->link = new PDO($dsn, $config['username'], $config['password']);

        return $this;
    }

    public function getId()
    {
        return $this->link->lastInsertId();
    }

    public function query($sql, $values)
    {
        $sth = $this->link->prepare($sql);
        $sth->execute($values);
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        if($result === false) {
            return [];
        }

        return $result;
    }
}