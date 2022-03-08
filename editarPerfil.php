<?php
require 'config.php';
require 'models/UsuarioDao.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

if (isset($_SESSION['id'])) {
        $usuarioLogado = $usuarioDao->findById($_SESSION['id']);
} else {
    header('Location: index.php');
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
            <div class="menu">
                <?php include "menu.php" ?>
            </div>
            <form method="post" action="editarPerfilAction">
                <p>Nome: </p>
                <input type="text" value="<?php echo $usuarioLogado->getNome() ?>">
                <p>Email:</p>
                <input type="email" value="<?php echo $usuarioLogado->getEmail() ?>"><br>

                <label for="telefone">Telefone:</label><br>
                <input name="telefone" type="tel" minlength="10" maxlength="13" placeholder="Digite o telefone" value="<?php echo $usuarioLogado->getTelefone() ?>"><br>
                <p>Data de Nascimento:</p>
                <input type="date" value="<?php echo $usuarioLogado->getNascimento() ?>">
                <p>Alteração de Senha:</p>

                <input type="password" placeholder="Senha Atual">
                <input type="password" placeholder="Nova Senha">
                <input type="password" placeholder="Repita a Nova Senha"><br>


                <input type="submit">

        </div>
    </div>
</body>

</html>