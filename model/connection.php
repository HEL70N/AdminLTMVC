<?php

class Conexao
{
    static public function conectar()
    {
        try {
            $link = new PDO("mysql:host=localhost;dbname=adminltmvc", "root", "");
            $link->exec("set names utf8mb4");
            return $link;
            $link = null;
        } catch (PDOException $e) {
            print "!Erro!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
