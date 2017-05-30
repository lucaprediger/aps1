<?php

require_once './UsuarioDao.php';
require_once './PessoaDao.php';

$nivelAcesso = $_POST['nivelAcesso'];
$nome = $_POST['nomePessoa'];
$nivel = $_POST['nivel'];
$identificacao = $_POST['identificacao'];
$cpf = $_POST['CPF'];
$rg = $_POST['RG'];
$dtNasc = $_POST['dtNasc'];
$email = $_POST['email'];
$nomeUsuario = $_POST['login'];
$pwd = $_POST['senha'];
$hash = md5(rand(0,1000));


$p = PessoaDao::newPessoa();
$p->setCpf($cpf);
$p->setDtNasc($dtNasc);
$p->setEmail($email);
$p->setIdentificacao($identificacao);
$p->setNome($nome);
$p->setRg($rg);

$p->inserir();
$p->setId(DB::lastId($p->getTabela(), 'pesId'));

echo 'Nova pessoa tem o id: ' . $p->getId();

$pessoa = $p->getId();       
$u = new UsuarioDao($pwd, 0, $nivel, $nomeUsuario, $pessoa);

$u->setHash($hash);

if($u->cadastrarUsuario()){
    echo 'usuarioCadastrado';
}

