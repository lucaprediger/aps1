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
        //var_dump($perDaoFinded);

        $leitura = $perDaoFinded->getId() == NULL ? false : $perDaoFinded->getPerLeitura();
        $gravacao = $perDaoFinded->getId() == NULL ? false : $perDaoFinded->getPerGravacao();
        ?>
        <tr id="linha<?php echo $permissao['perId'] ?>" > 
            <th scope="row"><?php echo $permissao['perId']; ?></th> 
            <td><?php echo $permissao['perDescricao'] ?></td>
            <td><input type="checkbox" name="<?php echo $permissao['perId']; ?>"  value="<?php echo $leitura; ?>"> </td>
            <td><input type="checkbox" name="<?php echo $permissao['perId']; ?>" value="<?php echo $gravacao; ?>"> </td>

        </tr> 
    <?php } ?>

</table>