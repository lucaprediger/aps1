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

    public function existeUsuario() {
        $sql = "SELECT * FROM $this->tabela WHERE usuUsername = :nomeUsuario and usuSenha = :senha";
        $stm = DB::prepare($sql);
        $stm->bindParam(':nomeUsuario', $this->nomeUsuario);
        $stm->bindParam(':senha', $this->pwd);
        $stm->execute();
       
        echo '<br>NomeUsuario: '. $this->nomeUsuario . '<br>';
        echo 'SENHA: '. $this->pwd  .'<br>';
        
        return ($stm->rowCount() > 0);
    }

    public function listAll() {
        $sql = "SELECT * FROM $this->tabela";
        $stm = DB::prepare($sql);
        $stm->bindParam(':nomeUsuario', $this->nomeUsuario);
        $stm->bindParam(':senha', $this->pwd);
        $stm->execute();
         echo 'Quantidade: ' . $stm->rowCount();
        var_dump($stm);
        echo('</pre>');
        
        return ($stm->rowCount() > 0);
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

}
