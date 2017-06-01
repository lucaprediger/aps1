<?php

require_once './PessoaDao.php';
require_once './UsuarioDao.php';
$mail = $_GET['email'];
$hash5 = $_GET['hash'];

$pessoa = PessoaDao::newPessoa()->getByMail($mail);

if ($pessoa != NULL) {
    
    $usu = UsuarioDao::newUsuarioDao()->getByIdPessoa($pessoa->getId());
    echo $usu->getHash();
    if($usu->getHash() == $hash5){
        $usu->setAtivo(true);
        echo 'email verificado com sucesso';
        if($usu->atualizar()){
            echo 'usuário ativado';
        }
    }
    
    
    
} else {
    echo 'email inválido';
}

