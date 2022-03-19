<?php
require 'config.php';
require 'models/UsuarioDao.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

if (isset($_SESSION['id'])) {
        $usuarioLogado = $usuarioDao->findById($_SESSION['id']);
} else {
    header('Location: index.php');
}

$usuarioDelete = filter_input(INPUT_POST, 'idDel');
$usuarioDelete = $usuarioDao->findById($usuarioDelete);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Inicio</title>
    <link href="/css/style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" , charset="UTF8">
</head>

<body>
    <?php include "menu.php" ?>

    <p> Tem certeza que deseja excluir o usuario
        <?= $usuarioDelete->getNome() ?> ?
        O processo é irreversível.
    </p>

    <form action="action/excluirUserAction.php" method="post">
        <input type="hidden" name="idDel" value="<?=$usuarioDelete->getId() ?>">
        <input type="submit" value="Confirmar">
    </form>

</body>

</html>