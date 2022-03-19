<?php
require '../config.php';
require '../models/UsuarioDao.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

if (isset($_SESSION['id'])) {
        $usuarioLogado = $usuarioDao->findById($_SESSION['id']);
} else {
    header('Location: index.php');
}

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$senha = filter_input(INPUT_POST, 'senha');
$senha = filter_input(INPUT_POST, 'senha1');
$senha2 = filter_input(INPUT_POST, 'senha2');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone');
$nascimento = filter_input(INPUT_POST, 'nascimento');

        $updateUser = new Usuario();
        $updateUser->setNome($nome);
        $updateUser->setSenha($senha);
        $updateUser->setEmail($email);
        $updateUser->setTelefone($telefone);
        $updateUser->setNascimento($nascimento);
        $updateUser->setId($_SESSION['id']);
        $usuarioDao->update( $updateUser );

        header ('Location: ../editarPerfil.php')


?>