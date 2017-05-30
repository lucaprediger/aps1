<?php


class Usuario {

    protected $tabela = "usuarios"; //nome da tabela
    protected $id = "";
    protected $pwd = ""; 
    protected $tipo = "";
    protected $nivel = "";
    protected $nomeUsuario = ""; //username
    protected $pessoaID = "";
    protected $ativo = "";
    protected $hash = "";
    
    function getTabela() {
        return $this->tabela;
    }

    function getId() {
        return $this->id;
    }

    function getPwd() {
        return $this->pwd;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getNivel() {
        return $this->nivel;
    }

    function getNomeUsuario() {
        return $this->nomeUsuario;
    }

    function getPessoaID() {
        return $this->pessoaID;
    }

    function getAtivo() {
        return $this->ativo;
    }

    function getHash() {
        return $this->hash;
    }

    function setTabela($tabela) {
        $this->tabela = $tabela;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPwd($pwd) {
        $this->pwd = $pwd;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function setNomeUsuario($nomeUsuario) {
        $this->nomeUsuario = $nomeUsuario;
    }

    function setPessoaID($pessoaID) {
        $this->pessoaID = $pessoaID;
    }

    function setAtivo($ativo) {
        $this->ativo = $ativo;
    }

    function setHash($hash) {
        $this->hash = $hash;
    }

    function __construct($pwd, $tipo, $nivel, $nomeUsuario, $pessoaID) {
        $this->pwd = $pwd;
        $this->tipo = $tipo;
        $this->nivel = $nivel;
        $this->nomeUsuario = $nomeUsuario;
        $this->pessoaID = $pessoaID;
        $this->ativo = 0;
    }


    
}
