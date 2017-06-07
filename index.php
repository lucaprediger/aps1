<!DOCTYPE html>


<html>
    <head>
        <meta charset="utf-8">
        <meta name="robots" content="noindex">

        <title>Clean Modal Login Form - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            window.alert = function () {};
            var defaultCSS = document.getElementById('bootstrap-css');
            function changeCSS(css) {
                if (css)
                    $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="' + css + '" type="text/css" />');
                else
                    $('head > link').filter(':first').replaceWith(defaultCSS);  
            }
            $(document).ready(function () {
                var iframe_height = parseInt($('html').height());
                window.parent.postMessage(iframe_height, 'http://bootsnipp.com');
            });
        </script>
        
    </head>
    <body>
        <div class="modal-dialog">
            <div class="loginmodal-container">
                <h1>Faça login para ter acesso</h1><br>
                <form action="loginForm.php" method="post" >
                    Login:  <input type="text" name="nomeUsuario" size="20" maxlength="100"/>
                    <br><br>
                    Senha:  <input type="password" name="senha" size="20" maxlength="16" />
                    <br><br>
                    <input type="checkbox" value="lembrarme" id="lembrarme" style="align-content: flex-start">Lembrar-me
                    <br>
                    <input type="submit" name="login" class="login loginmodal-submit" value="Login">
                    
                </form>
                
                <div class="login-help">
                    <a href="CadastrarParticipanteForm.php">Registrar-se</a> - <a href="recuperarSenha.php">Esqueci a Senha</a>
                </div>
            </div>
        </div>

</html>
