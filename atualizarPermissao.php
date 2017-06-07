<?php

require_once './PermissaoUsuarioDao.php';


$perDao = new PermissaoUsuarioDao();

$perId = $_POST['permissao'];
$usuId = $_POST['idUsu'];
$perDao = $perDao->getByPermissaoAndUsuario($perId, $usuId);
$valor = $_POST['valor'];
$tipo = $_POST['tipo'];

$perDao->setPerLeitura($tipo == "leitura" ? $valor : $perDao->getPerLeitura());

$perDao->setPerGravacao($tipo == "gravacao" ? $valor : $perDao->getPerGravacao());

$perDao->atualizarPermissao();
