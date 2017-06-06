<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>

            <h1>Cadastro de permissões</h1><br>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Módulo</th>
                    <th>Leitura</th>
                    <th>Gravação</th>
                </tr>
                <?php
                require_once './PermissaoUsuarioDao.php';
                require_once './PermissaoDao.php';
                $pu = new PermissaoUsuarioDao;
                $stmtPU = PermissaoDao::getAll();
                $stmtPU->execute();
                $per = new PermissaoUsuario();
                while ($per = $stmtPU->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
                    //$stmtPER = PermissaoDao::getByPuIdAndUsuId($pu->getId(),1);    
                ?>
                <tr id="linha<?php echo $per[1] ?>" > 
                    <th scope="row"><?php echo $per[0]; ?></th> 
                    <td><?php echo $per[1] ?></td>
                    <td><input type="checkbox" > </td>
                    <td><input type="checkbox" > </td>
                </tr> 
                <?php } ?>
            </table>
        </div>
    </body>
</html>
