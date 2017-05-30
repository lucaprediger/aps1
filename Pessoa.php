<?php

class Pessoa{

    protected $id = 0;
    protected $nome = "";
    protected $email = '';
    protected $cpf ="";
    protected $rg = "";
    protected $identificacao =""; //RA ou matricula
    protected $dtNasc = "";
    protected $tabela = 'pessoas'; 
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getRg() {
        return $this->rg;
    }

    function getIdentificacao() {
        return $this->identificacao;
    }

    function getDtNasc() {
        return $this->dtNasc;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setRg($rg) {
        $this->rg = $rg;
    }

    function setIdentificacao($identificacao) {
        $this->identificacao = $identificacao;
    }

    function setDtNasc($dtNasc) {
        $this->dtNasc = $dtNasc;
    }

    
    function __construct($nome, $email, $cpf, $rg, $identificacao, $dtNasc) {
        $this->nome = $nome;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->identificacao = $identificacao;
        $this->dtNasc = $dtNasc;
    }

        
    
    function getTabela() {
        return $this->tabela;
    }

      
    

    //put your code here
}
