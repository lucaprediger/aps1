<?php

require_once './UsuarioDao.php';
require_once './PessoaDao.php';

$nome = $_POST['nomePessoa'];
$nomeUsuario = $_POST['login'];
$nivel = $_POST['nivelAcesso'];
$pwd = $_POST['senha'];
$email = $_POST['mailAccount'];

$p = PessoaDao::newSonome($nome);
$p->inserir();
$p->setId(DB::lastId($p->getTabela(), 'pesId'));
echo 'Nova pessoa tem o id: ' . $p->getId();
$pessoa = $p->getId();
       
$u = new UsuarioDao($pwd, $nivel, $nomeUsuario, $pessoa, $email);

if($u->cadastrarUsuario()){
    echo 'usuarioCadastrado';
}

