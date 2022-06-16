<?php
require 'config.php';
require 'models/UsuarioDao.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

if (isset($_SESSION['id'])) {
        $usuarioLogado = $usuarioDao->findById($_SESSION['id']);
        
print_r($_SESSION);
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
    <h2>Seja bem vindo
        <?php echo $usuarioLogado->getNome()?>
    </h2>
    <?php include "menu.php" ?>
</body>

</html>