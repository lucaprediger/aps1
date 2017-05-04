<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css"  href="estilo.css" /> <!-- faz a ligaçao entre o css e o html-->
        <title>Cadastar-se</title>
    </head>
    <body>
        <div class="areaColorida" id="corpo">
            <fieldset id="formCadastro">
                <label>Cadastro de usuário</label>
                <form action="CadastrarUsuario.php" method="post">  
                    Nome: <input type="text" name="Nome" size="40" maxlength="150"/>
                    <br>
                    Email: <input type="text" name="email" size="40" maxlength="200"/>
                    <br>
                    Login:  <input type="text" name="login" size="40" maxlength="12"/>
                    <br>
                    Senha:  <input type="password" name="senha" size="40" maxlength="16" />
                    <br>                  
                    <button type="submit"  style="align-items: flex-end">Confirmar</button>
                </form>
            </fieldset>
        </div>
    </body>
</html>
