<?php
    if (empty($_FILES['file'])) {
        header("Location: enviarResultado.php?erro='O envio de um arquivo é obrigatório.'"); 
        exit;
    }else {
        $targetfolder = "arquives/";

        $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
       
        if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder)){
            echo "The file ". basename( $_FILES['file']['name']). " is uploaded";
        }
        else {
            echo "Erro ao enviar o arquivo";
        }
    }
?>