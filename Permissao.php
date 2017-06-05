<?php

require_once './DB.php';

class Permissao {
    
    protected $tabela = "permissoes";
    protected $id = 0;
    protected $descricao = "";
    protected $usuId = "";
    protected $leitura;
    protected $gravacao;

    
    function getPerId() {
        return $this->perId;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getUsuPerId() {
        return $this->usuPerId;
    }

    function getLeitura() {
        return $this->leitura;
    }

    function getGravacao() {
        return $this->gravacao;
    }

    function setPerId($perId) {
        $this->perId = $perId;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setUsuPerId($usuPerId) {
        $this->usuPerId = $usuPerId;
    }

    function setLeitura($leitura) {
        $this->leitura = $leitura;
    }

    function setGravacao($gravacao) {
        $this->gravacao = $gravacao;
    }

    function __construct() {
        
    }


    
}
