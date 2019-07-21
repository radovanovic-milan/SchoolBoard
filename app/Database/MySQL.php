<?php


namespace App\Database;


use PDO;
use PDOException;

class MySQL implements Database
{
    private $host = 'localhost';
    private $name = 'qtest';
    private $username = 'root';
    private $password = '';

    public $connection = null;

    public function connect()
    {
        try {

            $this->connection = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->name, $this->username, $this->password);

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        } catch(PDOException $exception) {
            echo 'Connection to DB failed! Error: ' . $exception->getMessage();
        }

        return $this->connection;
    }
}