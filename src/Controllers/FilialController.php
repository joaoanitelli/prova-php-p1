<?php

namespace Php\Primeiroprojetocomposer\Controllers;

use Php\Primeiroprojetocomposer\Models\DAO\FilialDAO;
use Php\Primeiroprojetocomposer\Models\Domain\Filial;


class FilialController {
    public function index(){
        require_once("../src/Views/filial/index.html");
    }

    public function create() {
        $filial = new Filial(0,(string)$_POST["nome"],(int)$_POST["tel"],(string)$_POST["cidade"],(string)$_POST["estado"]);
        $FilialDAO = new FilialDAO();

        if ($FilialDAO->create($filial)) {
            return "Inserido com sucesso";
        }

        return "Erro ao inserir";
    }
}