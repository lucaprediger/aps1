<?php

class Permissao{
    private $pusId = 0;
    private $pusPagina = "";
    private $pusUsuId = 0;
    
    function getPusId() {
        return $this->pusId;
    }

    function getPusPagina() {
        return $this->pusPagina;
    }

    function getPusUsuId() {
        return $this->pusUsuId;
    }

    function setPusId($pusId) {
        $this->pusId = $pusId;
    }

    function setPusPagina($pusPagina) {
        $this->pusPagina = $pusPagina;
    }

    function setPusUsuId($pusUsuId) {
        $this->pusUsuId = $pusUsuId;
    }

    
}