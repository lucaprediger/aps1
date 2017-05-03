<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css"  href="estilo.css" /> <!-- faz a ligaçao entre o css e o html-->
        <title></title>
    </head>
    <body>
        <div class="areaColorida" id="corpo">
            
            <fieldset id="formulario">
                <form action="login.php" method="post">
                    Login:  <input type="text" name="login" size="20" maxlength="100"/>
                    <br><br>
                    Senha:  <input type="password" name="senha" size="20" maxlength="16" />
                    <br><br>
                    <button type="button" onclick="#">Login</button>
                </form>
            </fieldset>
        </div>
        <?php
        ?>
    </body>
</html>
