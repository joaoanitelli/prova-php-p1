<?php

namespace Php\Primeiroprojetocomposer\Controllers;

use Php\Primeiroprojetocomposer\Models\DAO\CarroDAO;
use Php\Primeiroprojetocomposer\Models\Domain\Carro;


class CarroController {
    public function index(){
        require_once("../src/Views/carro/index.html");
    }

    public function create() {
        $carro = new Carro(0,(string)$_POST["modelo"],(int)$_POST["ano"],(string)$_POST["cor"],(float)$_POST["valor"]);
        $carroDAO = new CarroDAO();

        if ($carroDAO->create($carro)) {
            return "Inserido com sucesso";
        }

        return "Erro ao inserir";
    }
}