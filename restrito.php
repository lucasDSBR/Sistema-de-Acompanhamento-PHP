<?php

    // A sessão precisa ser iniciada em cada página diferente
    if (!isset($_SESSION)) session_start();

    $nivel_necessario = 1;

    // Verifica se não há a variável da sessão que identifica o usuário
    if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {
        // Destrói a sessão por segurança
        session_destroy();
        // Redireciona o visitante de volta pro login
        header("Location: index.html"); exit;
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Restrito</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href='css/style.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header">
        <h2>Acompanhamento TradUnilab</h2>
        <a href="./logout.php" class="header-sair">Sair</a>
    </div>
    <div class="acompanhamento-corpo">
        <div class="acompanhamento-corpo-header">
            <p>Olá, <?php echo $_SESSION['UsuarioNome']; ?>!</p>
            
        </div>
        <div class="acompanhamento-header-submeter">
            <h4>Arquivos enviados:</h4>
            <div>
                <span>Deseja enviar um arquivo para análise ?</span>
                <button class="btnEnviarFile">Enviar</button>
            </div> 
        </div>
        <div class="acompanhamento-corpo-corpo">
            <table>
                    <tr>
                        <th>Usuario envio</th>
                        <th>Situação</th>
                        <th>Arquivo</th>
                        <th>Resultado</th>
                    </tr>
                    <?php
                        foreach ($_SESSION['Acompanhamentos'] as $item) {
                            echo '<tr>
                            <td>'.($item['id_usuario_envio'] == $_SESSION['UsuarioID'] ? "Você" : "Indefinido").'</td>
                            <td>'.($item['pedente'] == 0 ? "Pendente" : "Ok").'</td>
                            <td><a href="'.$item['arquivo'].'">Baixar</a></td>
                            <td>'.($item['resultado'] == "" ? ($_SESSION['UsuarioNivel'] == 1 ? '<a href="./enviarResultado.php?idAcompanhamento='.$item['id'].'">Enviar Resultado</a>' : "Sem resultado") : ($_SESSION['UsuarioNivel'] == 1 ? '<a href="./arquives/'.$item['resultado'].'">Baixar</a> | <a href="'.$item['resultado'].'">Cancelar</a>' : '<a href="'.$item['resultado'].'">Baixar</a>')).'</td>
                            </tr>';
                        }
                    ?>
            </table>    
        </div>
    </div>
</body>
</html>
  