<?php
require_once './UsuarioDao.php';


$nomeUsuario = $_POST['nomeUsuario'];
$pwd = $_POST['senha'];
$u =  UsuarioDao::paraLogar($nomeUsuario, $pwd);


if ($u->existeUsuario()) {
   session_start();
   $_SESSION["usuario"] = $u->getNomeUsuario();
   echo 'usuario logado!!!';
   header('Location: GerenciarPermissoes.php');
    
} else {
    echo 'Usuario inválido';
}

