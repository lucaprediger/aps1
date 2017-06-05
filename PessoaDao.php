<?php

require_once './DB.php';
require_once './Pessoa.php';
class PessoaDao extends Pessoa {
    /*
      function __construct($nome, $tipo, $cpf, $identificacao) {
      parent::__construct($nome, $tipo, $cpf, $identificacao);
      }
     */

    function __construct($nome, $email, $cpf, $rg, $identificacao, $dtNasc) {
        parent::__construct($nome, $email, $cpf, $rg, $identificacao, $dtNasc);
    }

    function newSoNome($nome) {
        $instance = new self($nome, "", 0, 0, 0, "");
        return $instance;
    }

    function newSoMail($mail) {
        $instance = new self("", $mail, 0, 0, 0, "");
        return $instance;
    }

    public static function newPessoa() {    //pra nao dar erro no php
        $instance = new self("", "", "", "", "", "");
        return $instance;
    }

    public function getByMail($mail) {
        $dbh = DB::getInstance();

        $sql = "SELECT * FROM pessoas WHERE pesEmail = :email";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':email', $mail, PDO::PARAM_STR);
        
        $pes = PessoaDao::newPessoa();
        
        $stmt->setFetchMode(PDO::FETCH_INTO, $pes);
        $stmt->execute();
        $pesFinded = $stmt->fetch(PDO::FETCH_INTO);
        $stmt->closeCursor();
        
        if($pesFinded!=NULL){
            $pes->setCpf($pesFinded->pesCPF);
            $pes->setDtNasc($pesFinded->pesDtNasc);
            $pes->setEmail($mail);
            $pes->setId($pesFinded->pesId);
            $pes->setIdentificacao($pesFinded->identificacao);
            $pes->setNome($pesFinded->pesNome);
            $pes->setRg($pesFinded->pesRG);
        }
        return $pes;
            
        
    }

    public function ativar() {
        $dbh = DB::getInstance();

        $sql = "UPDA INTO $this->tabela (pesNome, pesIdentificacao, pesCPF, pesDtNasc, pesEmail, pesRG) "
                . "values(:pesNome, :pesIdentificacao, :pesCPF, :pesDtNasc, :pesEmail, :pesRG)";
        ;
        $stm = $dbh->prepare($sql);
        $stm->bindParam(':pesNome', $this->nome);
        $stm->bindParam(':pesIdentificacao', $this->identificacao);
        $stm->bindParam(':pesCPF', $this->cpf);
        $stm->bindParam(':pesDtNasc', $data);
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
    }

    public function inserir() {
        $dbh = DB::getInstance();

        $data = explode('/', $this->dtNasc);     // transforma em array
        $data = array_reverse($data); // inverte posicoes do array
        $data = implode('-', $data);     // transforma em string novamente


        $sql = "INSERT INTO $this->tabela (pesNome, pesIdentificacao, pesCPF, pesDtNasc, pesEmail, pesRG) "
                . "values(:pesNome, :pesIdentificacao, :pesCPF, :pesDtNasc, :pesEmail, :pesRG)";
        ;
        $stm = $dbh->prepare($sql);
        $stm->bindParam(':pesNome', $this->nome);
        $stm->bindParam(':pesIdentificacao', $this->identificacao);
        $stm->bindParam(':pesCPF', $this->cpf);
        $stm->bindParam(':pesDtNasc', $data);
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
