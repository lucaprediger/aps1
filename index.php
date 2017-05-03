<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <fieldset>
            <legend>Cadastrar Aluno</legend>
            <form id="form" name="form" method="post" action="#" onsubmit="cadastrarAluno()">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value=""/>
                <input type="hidden" name="ra" id="ra" value=""/>
                <button type="button" onclick="cadastrarAluno()">Salvar</button>
            </form>
            <span></span>
        </fieldset>
        <?php
        
        ?>
    </body>
</html>
