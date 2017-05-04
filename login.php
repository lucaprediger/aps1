<?php

require_once './UsuarioDao.php';

$nomeUsuario = $_POST['login'];
$pwd = $_POST['senha'];
$u = new UsuarioDao($nomeUsuario, $pwd);

if ($u->existeUsuario()) {
    echo 'usuarioLogado';
} else {
    echo 'Usuario inválido';
}

