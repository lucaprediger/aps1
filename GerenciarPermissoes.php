<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GerenciarPermissoes
 *
 * @author marcio
 */
require_once './PermissaoDao.php';

$g = new GerenciarPermissoes();
class GerenciarPermissoes {

    function __construct() {
        $this->inicializarPermissoes();
    }

    function inicializarPermissoes() {
        require_once './ModuloPermissoes.php';

        $class = new ReflectionClass("ModuloPermissoes");
        $staticmethods = $class->getMethods(ReflectionMethod::IS_STATIC);
        echo '<pre>';


        foreach ($staticmethods as $key => $value) {
            $x = new ModuloPermissoes("", false, false);
            $r = new ReflectionMethod("ModuloPermissoes", $value->name);
            $x = $r->invoke(NULL);


            $per = new PermissaoDao();
            $per->setDescricao($x->getDescricao() );
            $per->setGravacao($x->getGravacao() );
            $per->setLeitura($x->getLeitura());
            if(!$per->jaCadastrada()){
                $per->inserir();
            }
        }
        
        include './definirPermissoes.php';

        
    }
    
    
    
}
