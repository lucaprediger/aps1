<?php

class PermissaoUsuario {
    private $id;
    private $perId;
    private $perUsuId;
    private $perLeitura;
    private $perGravacao;
    
    function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getPerId() {
        return $this->perId;
    }

    function getPerUsuId() {
        return $this->perUsuId;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPerId($perId) {
        $this->perId = $perId;
    }

    function setPerUsuId($perUsuId) {
        $this->perUsuId = $perUsuId;
    }
    
    function getPerLeitura() {
        return ($this->perLeitura=="true"?1:0);
    }

    function getPerGravacao() {
        return ($this->perGravacao=="1"?1:0);
    }

    function setPerLeitura($perLeitura) {
        $this->perLeitura = $perLeitura;
    }

    function setPerGravacao($perGravacao) {
        $this->perGravacao = $perGravacao;
    }



}

