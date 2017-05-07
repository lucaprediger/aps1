<?php


require_once './DB.php';

class PessoaDao extends Pessoa {

    function __construct($nome, $tipo, $cpf, $identificacao) {
        parent::__construct($nome, $tipo, $cpf, $identificacao);
    }
    
    function newSoNome($nome){
        $instance = new self($nome, 1, 0, "");
        return $instance;
    }
        
    public function inserir() {
        $dbh = DB::getInstance();
        $sql = "INSERT INTO $this->tabela (pesNome, pesTipo, pesIdentificacao, pesCPF) 
            values(:pesNome, :pesTipo, :pesIdentificacao, :pesCPF)";
        $stm = $dbh->prepare($sql);
        $stm->bindParam(':pesNome', $this->nome);
        $stm->bindParam(':pesTipo', $this->tipo);
        $stm->bindParam(':pesIdentificacao', $this->identificacao);
        $stm->bindParam(':pesCPF', $this->cpf);
        
        try {
            $dbh->beginTransaction();
            $result = $stm->execute();
            $dbh->commit();
        } catch (Exception $ex) {
            return false;
        }
        
        
        return true;
    }
    
   
    

}
