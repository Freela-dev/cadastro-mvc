<?php

namespace core ;

abstract class Database
{
    private $dbhost = 'localhost';
    private $dbname = 'cadastro-mvc';
    private $dbuser = 'root';
    private $dbpassword = '';

    protected function connect(){
        try {
            $conn = new \PDO("mysql:host=$this->dbhost;dbname=$this->dbname", $this->dbuser, $this->dbpassword);
            $conn->exec("set names UTF8");
            return $conn;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

}