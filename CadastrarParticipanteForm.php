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
                        Nome: <input type="text" name="nomePessoa" size="20" value="marcio" maxlength="150"/>
                        <br>
                        Nível: 
                        <select name="nivel">
                            <option value="0">Administrador</option>
                            <option value="1">Comum</option>
                        </select>
                        <br>
                        Identificaçao: <input type="text" name="identificacao" value="3456789" size="40" maxlength="200" placeholder="RA, matricula"/>
                        <br>
                        CPF: <input type="text" name="CPF" size="40" value="456789" maxlength="200"/>
                        <br>
                        RG: <input type="text" name="RG" value="456789" size="40" maxlength="200"/>
                        <br>
                        Data de nascimento:<input type="date" name="dtNasc" value="2010-10-10" size="40" maxlength="200"/>
                        <br>
                        Email: <input type="text" name="email" size="40" value="marciomjapr@gmail.com" maxlength="200"/>
                        <br>
                        Nome de usuário:  <input type="text" name="login" value="joao"  size="40" maxlength="12"/>
                        <br>
                        Senha:  <input type="password" name="senha" size="40" value="1234" maxlength="16" />
                        <br>                  
                        <input type="submit" name="cadastrar" class="login loginmodal-submit" value="Confirmar">
                    </form>
                </fieldset>
            </div>
        </div>
    </body>
</html>
