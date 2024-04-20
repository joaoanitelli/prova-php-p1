<?php

namespace Php\Primeiroprojetocomposer\Models\DAO;

use Exception;
use PDO;
use Php\Primeiroprojetocomposer\Models\Domain\Fornecedor;

class FornecedorDAO{
    private DAO $dao;

    public function __construct() {
        $this->dao = new DAO();
    }

    public function create(Fornecedor $fornecedor){
        try {
            $sql = "
                INSERT INTO fornecedor 
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
            $p->bindValue(":nome",$fornecedor->getNome());
            $p->bindValue(":tel",$fornecedor->getTel());
            $p->bindValue(":cidade",$fornecedor->getCidade());
            $p->bindValue(":estado",$fornecedor->getEstado());
            return $p->execute();
        } catch (Exception $e) {
            // Exibe a mensagem de erro do PDO
            echo "Erro ao inserir fornecedor: " . $e->getMessage();
            return 0;
        }
    }
    

    public function query(){
        $sql = "SELECT * FROM fornecedor";
        $stm = $this->dao->getConexao()->query($sql);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}