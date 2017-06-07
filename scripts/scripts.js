function carregarPermissoes() {

    var usuario = document.getElementById('usuario').value;
    var dados = 'idUsu=' + usuario;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var result = document.getElementById('result');
            result.innerHTML = xmlhttp.responseText;
        }
    }

    xmlhttp.open('POST', './mostrarPermissoes.php', true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(dados);
}

function atualizarPermissoes() {

    var usuario = document.getElementById('usuario').value;


    var inputs = document.getElementsByTagName('input');
    var totInputs = inputs.length;

    for (var i = 0; i < totInputs; i++) {

        if (inputs[i].type == 'checkbox') {
            var xmlhttp = new XMLHttpRequest();


            var vetTipoValor = inputs[i].name.split(":");
            var dados = 'idUsu=' + usuario
                    + '&permissao=' + vetTipoValor[1]
                    + '&tipo=' + vetTipoValor[0]
                    + '&valor=' + (inputs[i].checked ? 1 : 0);
            alert(dados);

            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    var result = document.getElementById('result');
                    result.innerHTML = xmlhttp.responseText;


                }
            }

            xmlhttp.open('POST', './atualizarPermissao.php', true);
            xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xmlhttp.send(dados);

        }


    }



    
}

function recuperaSenha() {
           var email = document.getElementById('inEmail').value;
 alert(email);

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var result = document.getElementById('msgEmail');
                result.innerHTML = xmlhttp.responseText;
            }
        }

        xmlhttp.open('POST', './enviarRecuperacao.php', true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send("email="+email);

    }
