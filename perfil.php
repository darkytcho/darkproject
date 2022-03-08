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
            <p>Nome:
                <?php echo $usuarioLogado->getNome() ?>
            </p>
            <p>Email:
                <?php echo $usuarioLogado->getEmail() ?>
            </p>
            <p>Data de Nascimento:
            <?php echo date('d/m/Y', strtotime($usuarioLogado->getNascimento())) ?></p>

            <p>Telefone:
            <?php echo $usuarioLogado->getTelefone() ?></p>

            <p>Data de Cadastro:
            <?php echo $usuarioLogado->getRegistro() ?></p>
            <a href="editarPerfil.php">
                <buttom>Editar Perfil</buttom>
            </a>
        </div>
    </div>
</body>

</html>