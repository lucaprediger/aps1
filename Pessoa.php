<?php

class Pessoa{

    protected $id = 0;
    protected $nome = "";
    protected $tipo = '1';
    protected $cpf ="";
    protected $identificacao ="";
    
    
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

        
    function getNome() {
        return $this->nome;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getIdentificacao() {
        return $this->identificacao;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setIdentificacao($identificacao) {
        $this->identificacao = $identificacao;
    }

    function __construct($nome, $tipo, $cpf, $identificacao) {
        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->cpf = $cpf;
        $this->identificacao = $identificacao;
     }

    
    protected $tabela = 'pessoas';
    function getTabela() {
        return $this->tabela;
    }

      
    

    //put your code here
}
