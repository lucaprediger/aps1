<?php

class login{
    protected function lembrar($senha)
    {
        $cookie=array(
            'usuario'=>$this->salt().base64_encode($_POST['usuario']),
            'senha'=>$this->salt().base64_encode($senha)
        );
        setcookie('blog_ghj', $cookie['usuario'], (time() + (15 * 24 * 3600)),$_SERVER['SERVER_NAME']);
        setcookie('blog_ghk', $cookie['senha'], (time() + (15 * 24 * 3600)),$_SERVER['SERVER_NAME']);
    }
    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.html');
    } 
    
    
} 
