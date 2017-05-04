<?php


class Usuario {

    protected $tabela = "usuarios";
    protected $id = "";
    protected $pwd = "";
    protected $nomeUsuario = "";

    function __construct($nomeUsuario, $pwd) {
        $this->pwd = $pwd;
        $this->nomeUsuario = $nomeUsuario;
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

}
