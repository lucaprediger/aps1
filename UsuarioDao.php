<?php


function __autoload($class) {
    require_once $class . '.php';
}

require_once './DB.php';
class UsuarioDao extends Usuario {

    function __construct($nomeUsuario, $pwd) {
        parent::__construct($nomeUsuario, $pwd);
    }

    public function existeUsuario() {
        $sql = "SELECT * FROM $this->tabela WHERE usuUsername = :nomeUsuario and usuSenha = :senha";
        $stm = DB::prepare($sql);
        $stm->bindParam(':nomeUsuario', $this->nomeUsuario);
        $stm->bindParam(':senha', $this->pwd);
        $stm->execute();

        return ($stm->rowCount() > 0);
    }
    

}
