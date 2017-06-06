<?php

require_once './DB.php';
require_once './Permissao.php';

class PermissaoDao extends Permissao {

    function __construct() {
        parent::__construct();
        
    }

    function inserir() {
        $dbh = DB::getInstance();


        $sql = "INSERT INTO permissoes (perDescricao) "
                . "values(:perDescricao)";
        $stm = $dbh->prepare($sql);
        $stm->bindParam(':perDescricao', $this->getDescricao());

        try {
            $result = $stm->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
        return true;
    }

    function jaCadastrada() {
        $dbh = DB::getInstance();

        $per = new Permissao();

        $sql = "SELECT * FROM permissoes where perDescricao = :descricao";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':descricao', $this->getDescricao(), PDO::PARAM_STR);
        $per = new PermissaoDao();
        $stmt->setFetchMode(PDO::FETCH_INTO, $per);
        $stmt->execute();
        $perFinded = $stmt->fetch(PDO::FETCH_INTO);
        $stmt->closeCursor();
        return $perFinded;
        
    }

    function getByDescricao($descricao) {
        $dbh = DB::getInstance();

        $per = new Permissao();

        $sql = "SELECT * FROM permissoes where perDescricao = :descricao";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':descricao', $IdPermissao, PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_INTO, $per);
        $stmt->execute();
        $per = $stmt->fetch(PDO::FETCH_INTO);
        $stmt->closeCursor();
        var_dump($per);
    }

    static function getAll() {
        
        $dbh = DB::getInstance();

        $sql = "SELECT * FROM permissoes";
        $stmt = $dbh->prepare($sql);
        $stmt = DB::prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        return $stmt;
        
    }

}
