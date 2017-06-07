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

            

            var dados = 'idUsu=' + usuario
                    + '&tipo=' + inputs[i].value
                    + '&permissao=' + inputs[i].name
                    + '&valor=' + inputs[i].checked;
            alert(dados);
            
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    var result = document.getElementById('result');
                    result.innerHTML = xmlhttp.responseText;
//                    alert("Permissões atulizadas");

                }
            }

            xmlhttp.open('POST', './atualizarPermissao.php', true);
            xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xmlhttp.send(dados);

        }
 

    }





}

