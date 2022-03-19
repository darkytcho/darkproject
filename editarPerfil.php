<?php
require 'config.php';
require 'models/UsuarioDao.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

if (isset($_SESSION['id'])) {
        $usuarioLogado = $usuarioDao->findById($_SESSION['id']);
} else {
    header('Location: ../index.php');
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
    <?php include "menu.php" ?>
    <form method="post" action="action/editarPerfilAction.php">
        <label for="nome">Nome:</label>
        <input name="nome" type="text" minlength="5" maxlength="70" placeholder="Nome"
            value="<?php echo $usuarioLogado->getNome() ?>">
        <label for="email">Email:</label>
        <input name="email" type="email" minlength="10" maxlength="256"
            value="<?php echo $usuarioLogado->getEmail() ?>">
        <label for="telefone">Telefone:</label>
        <input name="telefone" type="tel" minlength="10" maxlength="13" placeholder="Digite o telefone"
            value="<?php echo $usuarioLogado->getTelefone() ?>">
        <label for="nascimento">Data de Nascimento:</label>
        <input name="nascimento" type="date" value="<?php echo $usuarioLogado->getNascimento() ?>">
        <label for="senha">Alteração de Senha:</label>

        <input name="senha" type="password" placeholder="Senha Atual">
        <input name="senha1" type="password" placeholder="Nova Senha">
        <input name="senha2" type="password" placeholder="Repita a Nova Senha">

        <input type="submit" value="Atualizar">
</body>

</html>