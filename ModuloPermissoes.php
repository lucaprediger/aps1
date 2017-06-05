<?php

class ModuloPermissoes {
    private $descricao;
    private $leitura;
    private $gravacao;
    
    
    function __construct($descricao, $leitura, $gravacao) {
        $this->descricao = $descricao;
        $this->leitura = $leitura;
        $this->gravacao = $gravacao;
    }

    
    public static function CADASTROS_PARTICIPANTES(){
        return new ModuloPermissoes("Cadastro de participantes",true,true);
    }
    public static function CADASTROS_EVENTOS(){
        return new ModuloPermissoes("Cadastro de eventos",true,true);
    }
    public static function CADASTROS_ATIVIDADES(){
        return new ModuloPermissoes("Cadastro de atividades",true,true);
    }
    public static function EMISSAO_CERTIFICADOS(){
        return new ModuloPermissoes("Emissão de certificados",true,true);
    }
    

    function getDescricao() {
        return $this->descricao;
    }

    function getLeitura() {
        return $this->leitura;
    }

    function getGravacao() {
        return $this->gravacao;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setLeitura($leitura) {
        $this->leitura = $leitura;
    }

    function setGravacao($gravacao) {
        $this->gravacao = $gravacao;
    }


    

    
}
