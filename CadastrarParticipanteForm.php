<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css"  href="view/css/formulario.css" /> <!-- faz a ligaçao entre o css e o html-->
        <title>Cadastar-se</title>
    </head>
    <body>
        <div class="modal-dialog">
            <div class="loginmodal-container">
                <fieldset id="formCadastro">
                    <label>Cadastro de usuário</label>
                    <form action="CadastrarParticipante.php" method="post">  
                        <input type="hidden" name='nivelAcesso' value='0'>
                        Nome: <input type="text" name="nomePessoa" size="20" maxlength="150"/>
                        <br>
                        Tipo: 
                        <select name="tipo">
                            <option value="0">Administrador</option>
                            <option value="1">Comum</option>
                        </select>
                        <br>
                        Email: <input type="text" name="mailAccount" size="40" maxlength="200"/>
                        <br>
                        Nome de usuário:  <input type="text" name="login" size="40" maxlength="12"/>
                        <br>
                        Senha:  <input type="password" name="senha" size="40" maxlength="16" />
                        <br>                  
                        <input type="submit" name="login" class="login loginmodal-submit" value="Confirmar">
                    </form>
                </fieldset>
            </div>
        </div>
    </body>
</html>
