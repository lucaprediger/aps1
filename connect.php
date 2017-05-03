<?php

    try {
        $con = new PDO('mysql:host=127.0.0.1;dbname=eventus;charset=utf8', 'root', 'utfprsh');
    } catch (PDOException $ex) {
        throw new Exception("Erro ao conectar com o banco");
    }
?>