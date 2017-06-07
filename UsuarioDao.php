<?php

function __autoload($class) {
    require_once $class . '.php';
}

require_once './DB.php';

class UsuarioDao extends Usuario {

    function __construct($pwd, $tipo, $nivel, $nomeUsuario, $pessoaID) {
        parent::__construct($pwd, $tipo, $nivel, $nomeUsuario, $pessoaID);
    }

    public static function paraLogar($usuario, $senha) {
        $instance = new self($senha, 0, 0, $usuario, 0);
        return $instance;
    }

    public static function newUsuarioDao() {
        $instance = new self("", 0, 0, "", 0);
        return $instance;
    }

    public function existeUsuario() {
        $sql = "SELECT * FROM $this->tabela WHERE usuUsername = :nomeUsuario and usuSenha = :senha";
        $stm = DB::prepare($sql);
        $stm->bindParam(':nomeUsuario', $this->nomeUsuario);
        $stm->bindParam(':senha', $this->pwd);
        $stm->execute();


        return ($stm->rowCount() > 0);
    }

    public static function getAll() {
        $dbh = DB::getInstance();

        $sql = "SELECT * FROM usuarios";
        $stmt = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        return $stmt;

    }

    public function cadastrarUsuario() {
        //usuId`, `usuUsername`, `usuSenha`, `usuNivel`, `usuPesId`, `usuHash`, `usuAtivo`, `usuTipo`

        $sql = "INSERT INTO $this->tabela (usuUsername, usuSenha, usuNivel, usuPesId, usuHash, usuAtivo, usuTipo"
                . ") VALUES(:usuUsername, :usuSenha, :usuNivel, :usuPesId, :usuHash, :usuAtivo, :usuTipo)";
        $stm = DB::prepare($sql);
        $stm->bindParam(':usuUsername', $this->nomeUsuario);
        $stm->bindParam(':usuSenha', $this->pwd);
        $stm->bindParam(':usuNivel', $this->nivel);
        $stm->bindParam(':usuPesId', $this->pessoaID);
        $stm->bindParam(':usuHash', $this->hash);
        $stm->bindParam(':usuAtivo', $this->ativo);
        $stm->bindParam(':usuTipo', $this->tipo);
        $stm->execute();

        return ($stm->rowCount() > 0);
    }

    public function atualizar() {
        $sql = "UPDATE $this->tabela   "
                . "SET usuUsername = :usuUsername, "
                . "usuSenha = :usuSenha, "
                . "usuNivel = :usuNivel, "
                . "usuPesId = :usuPesId, "
                . "usuHash = :usuHash, "
                . "usuAtivo =  :usuAtivo, "
                . "usuTipo = :usuTipo "
                . "WHERE usuId = :idUpdate";
        $stm = DB::prepare($sql);
        $stm->bindParam(':idUpdate', $this->id);
        $stm->bindParam(':usuUsername', $this->nomeUsuario);
        $stm->bindParam(':usuSenha', $this->pwd);
        $stm->bindParam(':usuNivel', $this->nivel);
        $stm->bindParam(':usuPesId', $this->pessoaID);
        $stm->bindParam(':usuHash', $this->hash);
        $stm->bindParam(':usuAtivo', $this->ativo);
        $stm->bindParam(':usuTipo', $this->tipo);
        $stm->execute();

        return ($stm->rowCount() > 0);
    }

    public static function getByIdPessoa($idPessoa) {
        $dbh = DB::getInstance();

        $sql = "SELECT * FROM usuarios WHERE usuPesId = :pesId";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':pesId', $idPessoa, PDO::PARAM_STR);

        $usu = UsuarioDao::newUsuarioDao();

        $stmt->setFetchMode(PDO::FETCH_INTO, $usu);
        $stmt->execute();
        $usuFinded = $stmt->fetch(PDO::FETCH_INTO);
        $stmt->closeCursor();

        //usuUsername, usuSenha, usuNivel, usuPesId, usuHash, usuAtivo, usuTipo
        if ($usuFinded != NULL) {
            $usu->setAtivo($usuFinded->usuAtivo);
            $usu->setHash($usuFinded->usuHash);
            $usu->setId($usuFinded->usuId);
            $usu->setNivel($usuFinded->usuNivel);
            $usu->setNomeUsuario($usuFinded->usuUsername);
            $usu->setPessoaID($idPessoa);
            $usu->setPwd($usuFinded->usuSenha);
            $usu->setTipo($usuFinded->usuTipo);
        } else {
            $usu = NULL;
        }
        return $usu;
    }

}
