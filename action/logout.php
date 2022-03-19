<?php
require '../config.php';
require '../models/UsuarioDao.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

if (isset($_SESSION['id'])) {
        $usuarioLogado = $usuarioDao->findById($_SESSION['id']);
        $_SESSION = array();
        header('Location: ../index.php');
} else {
    header('Location: ../index.php');
}
?>