<?php
require 'config.php';
require 'models/UsuarioDao.php';

$usuarioDao = new UsuarioDaoMysql($pdo);
$lista = $usuarioDao->findAll();

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
    <table>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Data de Nascimento</th>
            <th>Data de Registro</th>
            <th>Excluir</th>
        </tr>
        <?php foreach ($lista as $usuarios): ?>
        <tr>
            <td>
                <?=$usuarios->getId(); ?>
            </td>
            <td>
                <?=$usuarios->getNome(); ?>
            </td>
            <td>
                <?=$usuarios->getEmail(); ?>
            </td>
            <td>
                <?=$usuarios->getTelefone(); ?>
            </td>
            <td>
                <?=$usuarios->getNascimento(); ?>
            </td>
            <td>
                <?=$usuarios->getRegistro(); ?>
            </td>
            <td>
                <form action="deleteUser.php" method="post">
                    <input type="hidden" name="idDel" value="<?=$usuarios->getId(); ?>">
                    <input type="submit" value="Excluir">
                </form>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
</body>

</html>