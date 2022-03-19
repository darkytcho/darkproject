<?php
require '../config.php';
require '../models/UsuarioDao.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

if (isset($_SESSION['id'])) {
        $usuarioLogado = $usuarioDao->findById($_SESSION['id']);
} else {
    header('Location: ../index.php');
}

$usuarioDelete = filter_input(INPUT_POST, 'idDel');
$usuarioDelete = $usuarioDao->delete($usuarioDelete);
header('Location: ../gerenciar.php');
?>