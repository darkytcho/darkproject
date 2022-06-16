<?php
require '../config.php';
require '../models/UsuarioDao.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha');

if ($email && $senha) {
    $login = $usuarioDao->login($senha, $email);

    if ($login) {
        $_SESSION['id'] = $login->getId();
        header('Location: ../logado.php');
    } 

}

?>