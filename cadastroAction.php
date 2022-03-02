<?php
require 'config.php';
require 'models/UsuarioDao.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$senha = filter_input(INPUT_POST, 'senha');
$senha2 = filter_input(INPUT_POST, 'senha2');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($senha === $senha2 && $email) {
    if ($usuarioDao->findByEmail($email) === false) {
        $novoUsuario = new Usuario();
        $novoUsuario->setNome($nome);
        $novoUsuario->setSenha($senha);
        $novoUsuario->setEmail($email);

        $usuarioDao->add( $novoUsuario );

        header('Location: index.php');

    } else {
        header('Location: cadastro.php');
    }
} else {
    header('Location: cadastro.php');
}

?>
