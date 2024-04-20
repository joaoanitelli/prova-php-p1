<?php

namespace Php\Primeiroprojetocomposer\Controllers;

use Php\Primeiroprojetocomposer\Models\DAO\ClienteDAO;
use Php\Primeiroprojetocomposer\Models\Domain\Cliente;

class ClienteController {
    public function index(){
        require_once("../src/Views/cliente/index.html");
    }

    public function create() {
        $cliente = new Cliente(0,(string)$_POST["nome"],(int)$_POST["cpf"],(string)$_POST["cidade"],(string)$_POST["estado"]);
        $ClienteDAO = new ClienteDAO();

        if ($ClienteDAO->create($cliente)) {
            return "Inserido com sucesso";
        }

        return "Erro ao inserir";
    }
}