<?php

require_once './UsuarioDao.php';

$nomeUsuario = $_POST['nomeUsuario'];
$pwd = $_POST['senha'];
$u =  UsuarioDao::paraLogar($nomeUsuario, $pwd);

if ($u->existeUsuario()) {
    header("location:GerenciarPermissoes.php");
} else {
    echo 'Usuario inválido';
}

