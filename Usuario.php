<?php


class Usuario {

    protected $tabela = "usuarios";
    protected $id = "";
    protected $pwd = "";
    protected $nivel = "";
    protected $nomeUsuario = "";
    protected $pessoa = "";
    protected $email = "";
    
    function getPessoa() {
        return $this->pessoa;
    }

    function getEmail() {
        return $this->email;
    }

    function setPessoa($pessoa) {
        $this->pessoa = $pessoa;
    }

    function setEmail($email) {
        $this->email = $email;
    }

        function getNivel() {
        return $this->nivel;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }


    function getId() {
        return $this->id;
    }

    function getPwd() {
        return $this->pwd;
    }

    function getNomeUsuario() {
        return $this->nomeUsuario;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPwd($pwd) {
        $this->pwd = $pwd;
    }

    function setNomeUsuario($nomeUsuario) {
        $this->nomeUsuario = $nomeUsuario;
    }

    function __construct($pwd, $nivel, $nomeUsuario, $pessoa, $email) {
        
        $this->pwd = $pwd;
        $this->nivel = $nivel;
        $this->nomeUsuario = $nomeUsuario;
        $this->pessoa = $pessoa;
        $this->email = $email;
    }

    
}
