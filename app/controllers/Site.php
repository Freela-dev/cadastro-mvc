<?php

namespace app\controllers;
use app\models\Cadastro;

class Site 
{
     public $objCadastro;

    public function __construct()
    {
        $this->objCadastro = new Cadastro();
    }
    public function home()
    {
        require_once __DIR__ . '/../views/home.php';
    }

    public function cadastro()
    {
        $cadastro = $this->objCadastro->create();
        require_once __DIR__ . '/../views/cadastro.php';
    }

    public function consulta()
    { 
        $consulta = $this->objCadastro->read();
        require_once __DIR__ . '/../views/consulta.php';
    }

    public function editar()
    {
        $contato = $this->objCadastro->updateForm();
        require_once __DIR__ . '/../views/editar.php';
    }

    public function alterar()
    {
        $alterar = $this->objCadastro->update();
        header("Location:?router=Site/consulta/");
    }

    public function deletar(){

        $delete = $this->objCadastro->delete();
        header("Location:?router=Site/consulta/");

    }

    public function DeleteForm(){
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        require_once __DIR__ . '/../views/deleteForm.php';
    }
}