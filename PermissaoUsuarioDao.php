<?php

require_once './PermissaoUsuario.php';
require_once './DB.php';

class PermissaoUsuarioDao extends PermissaoUsuario {

    function __construct() {
        
    }

    function inserir() {
        $dbh = DB::getInstance();


        $sql = "INSERT INTO permissoesUsuarios (pusUsuId, pusPerId, pusLeitura, pusGravacao) "
                . "values(:usuID, :perId, :perLeitura, :perGravacao)";
        $stm = $dbh->prepare($sql);
        $stm->bindValue(':usuID', $this->getPerUsuId());
        $stm->bindValue(':perId', $this->getPerId());
        $stm->bindValue(':perLeitura', $this->getPerLeitura());
        $stm->bindValue(':perGravacao', $this->getPerGravacao());

        try {
            
            $result = $stm->execute();
            
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
        return true;
    }

    function atualizar() {
        $dbh = DB::getInstance();

        
        $sql = "UPDATE permissoesUsuarios set "  
                . "pusLeitura = :leitura, "
                . "pusGravacao = :gravacao "
                . "WHERE  pusId = :idPermissao";
        
        
        
        
        $stm = $dbh->prepare($sql);
        $stm->bindValue(':idPermissao', $this->getId());
        $stm->bindValue(':leitura', $this->getPerLeitura());
        $stm->bindValue(':gravacao', $this->getPerGravacao());
        
        try {
            $result = $stm->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
        return true;
    }

    public function getByPermissaoAndUsuario($idPermissao, $idUsuario) {
        $dbh = DB::getInstance();
        $sql = "SELECT * from permissoesUsuarios WHERE pusPerId =:perId and pusUsuId  =:usuId";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':perId', $idPermissao);
        $stmt->bindParam(':usuId', $idUsuario);
        
        $stmt->execute();
        $perUsuFinded = $stmt->fetch(PDO::FETCH_ASSOC);
        
        
        $perUsu = new PermissaoUsuarioDao();
        if(isset($perUsuFinded["pusID"])){
            $perUsu->setId($perUsuFinded['pusID']);
            $perUsu->setPerGravacao($perUsuFinded['pusGravacao']);
            $perUsu->setPerId($perUsuFinded['pusPerId']);
            $perUsu->setPerLeitura($perUsuFinded['pusLeitura']);
            $perUsu->setPerUsuId($perUsuFinded['pusUsuId']);
        }else{
            $perUsu->setPerId($idPermissao);
            $perUsu->setPerUsuId($idUsuario);
        }
        
        return $perUsu;
    }

    public function atualizarPermissao() {
        
        if ($this->getId() == null) {
            $this->inserir();
        } else {
            $this->atualizar();
        }
    }

}
