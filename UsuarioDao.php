<?php


function __autoload($class) {
    require_once $class . '.php';
}

require_once './DB.php';

class UsuarioDao extends Usuario {

    function __construct($pwd, $nivel, $nomeUsuario, $pessoa, $email) {
        parent::__construct( $pwd, $nivel, $nomeUsuario, $pessoa, $email);
        
    }
    
   
    function paraLogar($usuario, $senha){
        $instance = new self($senha, 0, $usuario, 0, "");
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
    
    public function cadastrarUsuario() {
        //INSERT INTO eventus.usuarios (usuUsername, usuSenha, usuNivel, usuPessoa, email) VALUES ('luca', '1234', '1', '2', 'luca@gmail.com');
        $sql = "INSERT INTO $this->tabela (usuUsername, usuSenha, usuNivel, usuPessoa, email) VALUES(:usuUsername, :usuSenha, :usuNivel, :usuPessoa, :email)";
        $stm = DB::prepare($sql);
        $stm->bindParam(':usuUsername',$this->nomeUsuario);
        $stm->bindParam(':usuSenha', $this->pwd);
        $stm->bindParam(':usuNivel', $this->nivel);
        $stm->bindParam(':usuPessoa',$this->pessoa);
        $stm->bindParam(':email', $this->email);
        $stm->execute();

        return ($stm->rowCount() > 0);
    }
    

}
