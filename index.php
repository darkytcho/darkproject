<?php 
    session_start();
    if (isset($_SESSION['id'])) {
        header('Location: logado.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Inicio</title>
    <link href="/css/style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" , charset="UTF8">
</head>

<body>
    <div class="container">
        <div class="bigBox">
            <div class="box1">
                <h1>Bem-vindo!</h1>
                <p>Digite seu login e senha para acessar.</p>

                <p>Primeira vez por aqui? Faça seu cadastro.</p>
        <a href="cadastro.php">
            <button>Cadastro</button>
        </a></div>
            <div class="box2">

                <h1>Login</h1>
                <h4>Digite email e senha para acessar o sistema.</h4>
                <form method="post" action="/action/indexAction.php">
                    <h5 class="left">Email:</h5>
                    <input name="email" type="email" minlength="10" maxlength="256" placeholder="Email cadastrado"
                        required="required" autofocus>
                    <h5 class="left">Senha:</h5>
                    <input name="senha" type="password" minlength="8" maxlength="20" placeholder="Senha"
                        required="required">
                    <br>
                    <input type="submit" value="Entrar">
                </form>
            </div>
        </div>
       
    </div>
</body>

</html>