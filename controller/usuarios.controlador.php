<?php

class ctrUsuarios
{
    static public function ctrMostrarUsuarios()
    {
        $tabela = "usuarios";
        
        $respostas = mdlUsuarios::mdlMostrarUsuarios($tabela);
        
        return $respostas;
    }
}
