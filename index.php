<?php
include 'dbconnection.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Inicio</title>
    <link href="/style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" , charset="UTF8">
</head>

<body>
    <div class="bg"></div>
    <div class="container">
        <div class="login">
            <h1>Faça Login</h1>
            <form method="POST">
                <input id="inputLogin" type="text" placeholder="Nome de usuário ou email"><br>
                <input id="inputPass" type="password" placeholder="Senha"><br>
                <input type="submit">
            </form>
        </div>
    </div>
</body>

</html>