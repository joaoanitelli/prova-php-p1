<?php

namespace Php\Primeiroprojetocomposer\Controllers;

use Php\Primeiroprojetocomposer\Models\DAO\FornecedorDAO;
use Php\Primeiroprojetocomposer\Models\Domain\Fornecedor;


class FornecedorController {
    public function index(){
        require_once("../src/Views/fornecedor/index.html");
    }

    public function create() {
        $fornecedor = new Fornecedor(0,(string)$_POST["nome"],(int)$_POST["tel"],(string)$_POST["cidade"],(string)$_POST["estado"]);
        $FornecedorDAO = new FornecedorDAO();

        if ($FornecedorDAO->create($fornecedor)) {
            return "Inserido com sucesso";
        }

        return "Erro ao inserir";
    }
}