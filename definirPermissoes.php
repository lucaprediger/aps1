<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Definir permissoes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <script type="text/javascript" src="scripts/scripts.js"></script>
    </head>
    <body>

        <h1>Cadastro de permissões</h1><br>

        <div>
            <!--USUARIO-->
            Usuario: 
            <select name="usuario" id="usuario">

                <?php
                require_once './Usuario.php';
                require_once './UsuarioDao.php';
                $usu = UsuarioDao::getAll();
                $usu->execute();
                while ($r = $usu->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
                    echo '<pre>';
                    ?>
                    <option value=<?php echo $r['usuId']; ?>><?php echo $r['usuUsername']; ?></option>
                <?php } ?>
            </select>
            <input type="button" value="verificar" onclick="carregarPermissoes()">
            <div>
            <table class="table "> 
                <thead> 
                    <tr> 
                        <th>#</th> 
                        <th>Permissão</th> 
                        <th>Leitura</th> 
                        <th>Gravaçao</th> 
                    </tr> 
                </thead> 
                <tbody id="result"> 

                </tbody> 
            </table>
        </div>
        </div>
        <input type="button" value="OK" id="btOk" onclick="atualizarPermissoes()">
        <input type="button" value="CANCELAR" id="btCancelar">
    </body>
</html>
