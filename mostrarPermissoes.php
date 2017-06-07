<!--PERMISSOES-->
<table>
    <?php
    require_once './PermissaoUsuarioDao.php';
    require_once './PermissaoDao.php';
    $usuId = $_POST['idUsu'];

    $perDao = new PermissaoUsuarioDao();

    $per = PermissaoDao::getAll();
    $per->execute();
    $perDaoFinded = new PermissaoUsuarioDao();
    while ($permissao = $per->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {

        $perDaoFinded = $perDao->getByPermissaoAndUsuario($permissao['perId'], $usuId);
        
        if ($perDaoFinded->getId() != 0) {
            $leitura = ($perDaoFinded->getPerLeitura() == 1 ? 1 : 0);
            $gravacao = ($perDaoFinded->getPerGravacao() == 1 ? 1 : 0);
        }else{
            $leitura = 0;
            $gravacao = 0; 
        }

        ?>
        <tr id="linha<?php echo $permissao['perId'] ?>" > 
            <th scope="row"><?php echo $permissao['perId']; ?></th> 
            <td><?php echo $permissao['perDescricao'] ?></td>
            <td><input type="checkbox" name="leitura:<?php echo $permissao['perId']; ?>"  <?php echo ($leitura == 1 ? "checked" : ""); ?>> </td>
            <td><input type="checkbox" name="gravacao:<?php echo $permissao['perId']; ?>" <?php echo ($gravacao == 1 ? "checked" : ""); ?>> </td>

        </tr> 
    <?php } ?>

</table>