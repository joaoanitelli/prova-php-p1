<?php

namespace Php\Primeiroprojetocomposer\Models\DAO;

use Exception;
use PDO;
use Php\Primeiroprojetocomposer\Models\Domain\Carro;

class CarroDAO{
    private DAO $dao;

    public function __construct() {
        $this->dao = new DAO();
    }

    public function create(Carro $carro){
        try {
            $sql = "
                INSERT INTO carro 
                (
                    modelo,
                    ano,
                    cor,
                    valor
                ) 
                VALUES (
                    :modelo,
                    :ano,
                    :cor,
                    :valor
                )
            ";
            $p = $this->dao->getConexao()->prepare($sql);
            $p->bindValue(":modelo",$carro->getModelo());
            $p->bindValue(":ano",$carro->getAno());
            $p->bindValue(":cor",$carro->getCor());
            $p->bindValue(":valor",$carro->getValor());
            return $p->execute();
        } catch (Exception $e) {
            return 0;
        }
    }

    public function query(){
        $sql = "SELECT * FROM carro";
        $stm = $this->dao->getConexao()->query($sql);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}