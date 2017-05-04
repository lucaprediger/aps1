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
                    <input type="checkbox" value="lembrarme" id="lembrarme" style="align-content: flex-start">Lembrar-me
                    <button type="submit" style="align-items: flex-end">Login</button>
                </form>
                <a href="CadastrarUsuarioForm.php" style="alignment-baseline: initial">Cadastre-se</a>
            </fieldset>
            
        </div>

    </body>
</html>
