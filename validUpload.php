<?php
    if (empty($_FILES['file'])) {
        header("Location: enviarResultado.php?erro='O envio de um arquivo é obrigatório.'"); 
        exit;
    }else {
        $url_components = parse_url($_SERVER['HTTP_REFERER']);
        parse_str($url_components['query'], $params);
        $targetfolder = "arquives/";

        $targetfolder = $targetfolder.$params['idAcompanhamento']."-".date("Y-m-d")."-".basename( $_FILES['file']['name']) ;
       
        if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder)){
            $path = basename($params['idAcompanhamento']."-".date("Y-m-d")."-".$_FILES['file']['name']);
            $imagedata = file_get_contents("./arquives/".$params['idAcompanhamento']."-".date("Y-m-d")."-".$_FILES['file']['name']);


            //Iniciando conexao e enviadno atualização
            // Tenta se conectar ao servidor MySQL
            $conexao = mysqli_connect("localhost", "root", "", "dbtradunilab") or trigger_error(mysqli_error($conexao));
            // Tenta se conectar a um banco de dados MySQL
            mysqli_select_db($conexao, 'dbtradunilab') or trigger_error(mysqli_error($conexao));

            $id_acompanhamento = mysqli_real_escape_string($conexao, $params['idAcompanhamento']);
            echo $id_acompanhamento;
            // Validação do usuário/senha digitados
            $sql = "UPDATE `acompanhamentos` SET `resultado`='$path' WHERE (`id` = '".$id_acompanhamento ."')";
            $query = mysqli_query($conexao, $sql);
            if($query == 1){
                header("Location: restrito.php?suc='Resultado Enviado.'");
            }

        }
        else {
            echo "Erro ao enviar o arquivo";
        }
    }
?>