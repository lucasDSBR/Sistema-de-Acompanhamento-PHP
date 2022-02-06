<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href='css/style.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
</head>
<body>
    <form action='validLogin.php' method='POST' class="formulario">
        <div class="formulario-corpo">
            <h1>Entrar</h1>
            <div class="formulario-input">
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" id="usuario" class="usuario"/>
            </div>
            <div class="formulario-input">
                <label for="password">Senha</label>
                <input type="password" name="password" class="password" id="password"/>
            </div>
            <div class="formulario-input">
                <input type="submit" value="Entrar" class="btnEntrar" />
            </div>
        </div>
    </form>    
</body>
</html>