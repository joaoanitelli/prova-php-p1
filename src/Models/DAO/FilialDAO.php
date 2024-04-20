<?php

namespace Php\Primeiroprojetocomposer\Models\DAO;

use Exception;
use PDO;
use Php\Primeiroprojetocomposer\Models\Domain\Filial;

class FilialDAO{
    private DAO $dao;

    public function __construct() {
        $this->dao = new DAO();
    }

    public function create(Filial $filial){
        try {
            $sql = "
                INSERT INTO filial 
                (
                    nome,
                    tel,
                    cidade,
                    estado
                ) 
                VALUES (
                    :nome,
                    :tel,
                    :cidade,
                    :estado
                )
            ";
            $p = $this->dao->getConexao()->prepare($sql);
            $p->bindValue(":nome",$filial->getNome());
            $p->bindValue(":tel",$filial->getTel());
            $p->bindValue(":cidade",$filial->getCidade());
            $p->bindValue(":estado",$filial->getEstado());
            return $p->execute();
        } catch (Exception $e) {
            return 0;
        }
    }

    public function query(){
        $sql = "SELECT * FROM filial";
        $stm = $this->dao->getConexao()->query($sql);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}