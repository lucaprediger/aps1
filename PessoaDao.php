<?php


require_once './DB.php';

class PessoaDao extends Pessoa {
/*
    function __construct($nome, $tipo, $cpf, $identificacao) {
        parent::__construct($nome, $tipo, $cpf, $identificacao);
    }
  */
 function __construct($nome, $email, $cpf, $rg, $identificacao, $dtNasc) {
     parent::__construct($nome, $email, $cpf, $rg, $identificacao, $dtNasc);
 }

 
    function newSoNome($nome){
        $instance = new self($nome, "",0, 0, 0,"");
        return $instance;
    }
        
     function newPessoa(){
        $instance = new self("", "",0, 0, 0,"");
        return $instance;
    }
    public function inserir() {
        $dbh = DB::getInstance();
        $data = date('Y-m-d');
        $sql = "INSERT INTO $this->tabela (pesNome, pesIdentificacao, pesCPF, pesDtNasc, pesEmail, pesRG)) 
            values(:pesNome, :pesIdentificacao, :pesCPF, :pesDtNasc, :pesEmail, :pesRG)";;
        $stm = $dbh->prepare($sql);
        $stm->bindParam(':pesNome', $this->nome);
        $stm->bindParam(':pesIdentificacao', $this->identificacao);
        $stm->bindParam(':pesCPF', $this->cpf);
        $stm->bindParam(':pesDtNasc',$data);
        $stm->bindParam(':pesEmail', $this->email);
        $stm->bindParam(':pesRG', $this->rg);
         
        
        try {
            $dbh->beginTransaction();
            $result = $stm->execute();
            $dbh->commit();
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
        
        
        return true;
    }
    
   
    

}
