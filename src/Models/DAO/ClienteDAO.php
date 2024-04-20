<?php

namespace Php\Primeiroprojetocomposer\Models\DAO;

use Exception;
use PDO;
use Php\Primeiroprojetocomposer\Models\Domain\Cliente;

class ClienteDAO{
    private DAO $dao;

    public function __construct() {
        $this->dao = new DAO();
    }

    public function create(Cliente $cliente){
        try {
            $sql = "
                INSERT INTO cliente 
                (
                    nome,
                    cpf,
                    cidade,
                    estado
                ) 
                VALUES (
                    :nome,
                    :cpf,
                    :cidade,
                    :estado
                )
            ";
            $p = $this->dao->getConexao()->prepare($sql);
            $p->bindValue(":nome",$cliente->getNome());
            $p->bindValue(":cpf",$cliente->getCpf());
            $p->bindValue(":cidade",$cliente->getCidade());
            $p->bindValue(":estado",$cliente->getEstado());
            return $p->execute();
        } catch (Exception $e) {
            return 0;
        }
    }

    public function query(){
        $sql = "SELECT * FROM cliente";
        $stm = $this->dao->getConexao()->query($sql);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}