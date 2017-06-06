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
                    <th>Nome</th>
                    <th>Usuario</th>
                    <th>Módulo</th>
                    <th>Leitura</th>
                    <th>Gravação</th>
                </tr>
                <?php
                require_once './PermissaoUsuarioDao.php';
                require_once './PermissaoDao.php';
                $per = PermissaoDao::getAll();
                $per->execute();
                while ($r = $per->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
                ?>
                <tr id="linha<?php echo $r[0] ?>" > 
                    <th scope="row"><?php echo $r[0]; ?></th> 
                    <td><?php echo $r[1] ?></td>
                    <td><?php echo $r[2] ?></td>
                    <td><?php echo $r[3] ?></td>
                    <td><?php echo $r[4] ?></td>

                    <td><input type="button" onClick="apagarCliente(<?php echo $r[0] ?>)" > </td>
                    <td><input type="button" onClick="editarCliente(<?php echo $r[0] ?>)" > </td>
                </tr> 
                <?php } ?>
            </table>
        </div>
    </body>
</html>
