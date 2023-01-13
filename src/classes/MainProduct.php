<?php

namespace Myapp\Project\classes;

// MainProduct class creation

abstract class MainProduct
{
    private $host = 'localhost';
    private $databaseName = 'ecommerce';
    private $user = 'root';
    private $password = '';

    public function databaseConnection()
    {
        try {
            $conn = new \PDO("mysql:host=$this->host;dbname=$this->databaseName;", $this->user, $this->password);
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    abstract protected function validateProduct();
}
