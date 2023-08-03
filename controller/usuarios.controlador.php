<?php

class ctrUsuarios
{
    static public function ctrMostrarUsuarios()
    {
        $tabela = "usuarios";

        $respostas = mdlUsuarios::mdlMostrarUsuarios($tabela);

        return $respostas;
    }

    static public function ctrGuardarUsuarios()
    {
        if (isset($_POST["nome_usuarios"])) {
            if (isset($_FILES["subirImgusuarios"]["tmp_name"]) && !empty($_FILES["subirImgusuarios"]["tmp_name"])) {
                list($largura, $altura) = getimagesize($_FILES["subirImgusuarios"]["tmp_name"]);

                $novaLargura = 480;
                $novaAltura = 320;

                // Criação do directório onde vamos guardar a foto do usuarios
                $directorio = "views/imagens/usuarios";

                // De acordo com o tipo de imagem aplicamos as funções padrão do PHP
                if ($_FILES["subirImgusuarios"]["type"] == "image/jpeg") {

                    $aleatorio = mt_rand(100, 999);

                    $rota = $directorio . "/" . $aleatorio . ".jpg";

                    $origem = imagecreatefromjpeg($_FILES["subirImgusuarios"]["tmp_name"]);

                    $destino = imagecreatetruecolor($novaLargura, $novaAltura);

                    imagecopyresized($destino, $origem, 0, 0, 0, 0, $novaLargura, $novaAltura, $largura, $altura);

                    imagejpeg($destino, $rota);
                } else  if ($_FILES["subirImgusuarios"]["type"] == "image/png") {

                    $aleatorio = mt_rand(100, 999);

                    $rota = $directorio . "/" . $aleatorio . ".png";

                    $origem = imagecreatefrompng($_FILES["subirImgusuarios"]["tmp_name"]);

                    $destino = imagecreatetruecolor($novaLargura, $novaAltura);

                    imagealphablending($destino, FALSE);

                    imagesavealpha($destino, TRUE);

                    imagecopyresized($destino, $origem, 0, 0, 0, 0, $novaLargura, $novaAltura, $largura, $altura);

                    imagejpeg($destino, $rota);
                } else {
                    echo
                    '<script>
                        swal({

                            type:"error",
                            style:"CORRIGIR!!",
                            texte:"Não é permitido formatos diferentes de JPG e ou PNG.",
                            showConfirmButton: true,
                            showConfirmText: "Fechar"

                        }).then(function(result){
                            
                            if(result.value){
                                history.back();
                            }

                        })                    
                    </script>';
                    return;
                }

                $encriptarPassword = crypt($_POST["pass_user"], '$2a$07$usesomesillystringforsalt$');

                $dados = array(
                    "nome_usuarios" => $_POST["nome_usuarios"],
                    "nome_user" => $_POST["nome_user"],
                    "pass_user" =>  $encriptarPassword,
                    "nivel_user" => $_POST["nivel_user"],
                    "foto" => $rota
                );

                echo "</pre>";
                print_r($dados);
                echo "</pre>";
            }
        }
    }
}
