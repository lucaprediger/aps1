<?php

require_once './UsuarioDao.php';

$nomeUsuario = $_POST['nomeUsuario'];
$pwd = $_POST['senha'];
$u =  UsuarioDao::paraLogar($nomeUsuario, $pwd);


$u->listAll();
if ($u->existeUsuario()) {
    echo 'usuarioLogado';
} else {
    echo 'Usuario inválido';
}

