<?php

namespace app\models;
use core\Database;

class Cadastro extends Database
{

    public $conn;

    public function __construct()
    {
       $this->conn = $this->connect();
    }

    public function create()
    {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $telefone = filter_input(INPUT_POST, 'telefone',FILTER_SANITIZE_NUMBER_INT);
        $sql = 'INSERT INTO cadastro (nome,email,telefone) VALUES (:nome, :email, :telefone)';
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(':nome', $nome);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':telefone', $telefone);
        $statement->execute();

        return $statement;

    }

    public function read()
    {
       $sql = 'SELECT * FROM cadastro ORDER BY nome';
       $statement = $this->conn->prepare($sql);
       $statement->execute();
       $result = $statement->fetchAll();
       return $result;
    }

    public function update()
    {   
        $id = filter_input(INPUT_POST, 'id',FILTER_SANITIZE_NUMBER_INT);
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $telefone = filter_input(INPUT_POST, 'telefone',FILTER_SANITIZE_NUMBER_INT);
        $sql = 'UPDATE cadastro SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id';
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':nome', $nome);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':telefone', $telefone);
        $statement->execute();

        return $statement;
    }

    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_SPECIAL_CHARS);

        $sql = "DELETE FROM cadastro WHERE id = :id";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        return $statement;

    }

    public function findByID($id)
    {
        $sql = 'SELECT * FROM cadastro WHERE id = :id';
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(':id',$id);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;   
    }

    public function updateForm()
    {
       $id = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_SPECIAL_CHARS);
    
       $cadastro = $this->findByID($id);
       return $cadastro;
    }
}