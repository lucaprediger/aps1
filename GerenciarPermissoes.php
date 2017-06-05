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
        echo '<h1>Cadastro de permissões</h1><br>
                <form action="login.php" method="post" >
                    Login:  <input type="text" name="nomeUsuario" size="20" maxlength="100"/>
                    <br><br>
                    Senha:  <input type="password" name="senha" size="20" maxlength="16" />
                    <br><br>
                    <input type="checkbox" value="lembrarme" id="lembrarme" style="align-content: flex-start">Lembrar-me
                    <br>
                    <input type="submit" name="login" class="login loginmodal-submit" value="Login">
                    
                </form>';
    }

    
}
