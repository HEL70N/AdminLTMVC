<?php

require_once "connection.php";

class mdlUsuarios
{
    static public function mdlMostrarUsuarios($tabela)
    {
        $stmt = Conexao::conectar()->prepare("SELECT * FROM $tabela");
        $stmt->execute();

        return $stmt->fetcAll();

        $stmt->close();
        $stmt = null;
    }
}
