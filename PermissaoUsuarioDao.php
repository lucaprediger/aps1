<?php

require_once './PermissaoUsuario.php';

class PermissaoUsuarioDao extends PermissaoUsuario {
    
    function __construct() {
        
    }

    function inserir() {
        $dbh = DB::getInstance();

       
        $sql = "INSERT INTO permissoesUsuarios (pusUsuId, pusPerId, pusLeitura, pusGravacao) "
                . "values(:usuID, :perId)";
        $stm = $dbh->prepare($sql);
        $stm->bindParam(':usuId', $this->getPerId());
        $stm->bindParam(':perId', $this->getPerUsuId());
        $stm->bindParam(':perLeitura', $this->getPerLeitura());
        $stm->bindParam(':perGravacao', $this->getPerGravacao());
        
        try {
            $result = $stm->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
        return true;
    }

}
