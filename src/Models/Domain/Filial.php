<?php

namespace Php\Primeiroprojetocomposer\Models\Domain;

class Filial {
    private int $id;
    private string $nome;
    private int $tel;
    private string $cidade;
    private string $estado;

    public function __construct(int $id, string $nome, int $tel, string $cidade, string $estado) {
        $this->setId($id);
        $this->setNome($nome);
        $this->setTel($tel);
        $this->setCidade($cidade);
        $this->setEstado($estado);
    }

    public function getId() : int {
        return $this->id;
    }

    public function setId(int $id):void {
        $this->id = $id;
    }

    public function getNome():string {
        return $this->nome;
    }

    public function setNome(string $nome):void {
        $this->nome = $nome;
    }

    public function getTel():int {
        return $this->tel;
    }

    public function setTel(int $tel):void {
        $this->tel = $tel;
    }

    public function getCidade():string {
        return $this->cidade;
    }

    public function setCidade(string $cidade):void {
        $this->cidade = $cidade;
    }
    public function getEstado():string {
        return $this->estado;
    }

    public function setEstado(string $estado):void {
        $this->estado = $estado;
    }

}