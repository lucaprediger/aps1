<?php

require_once './PermissaoUsuarioDao.php';


$perDao = new PermissaoUsuarioDao();

$perId = $_POST['permissao'];
$usuId = $_POST['idUsu'];
$perDao = $perDao->getByPermissaoAndUsuario($perId, $usuId);
$valor = $_POST['valor'];
$tipo = $_POST['tipo'];
$valor = $valor == "true" ? 1 : 0;
$perDao->setPerLeitura($tipo == "leitura" ? $valor : 0);

$perDao->setPerGravacao($tipo == "gravacao" ? $valor : 0);

$perDao->atualizarPermissao();
