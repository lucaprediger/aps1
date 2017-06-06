function carregarPermissoes(idUsuario) {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var result = document.getElementById('result');
            result.innerHTML = xmlhttp.responseText;
        }
    }

    xmlhttp.open('GET', 'mostrarPermissoes.php', true);
    xmlhttp.send();
}
