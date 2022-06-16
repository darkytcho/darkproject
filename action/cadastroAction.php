<?php
require '../config.php';
require '../models/UsuarioDao.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$senha = filter_input(INPUT_POST, 'senha');
$senha2 = filter_input(INPUT_POST, 'senha2');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone');
$nascimento = filter_input(INPUT_POST, 'nascimento');


if ($senha === $senha2 && $email && $telefone && $nome && $nascimento) {
    if ($usuarioDao->findByEmail($email) === false) {
        $novoUsuario = new Usuario();
        $novoUsuario->setNome($nome);
        $novoUsuario->setSenha($senha);
        $novoUsuario->setEmail($email);
        $novoUsuario->setTelefone($telefone);
        $novoUsuario->setNascimento($nascimento);

        $usuarioDao->add($novoUsuario);
        

        header('Location: ../index.php');

    } else {
        header('Location: ../cadastro.php');
    }
} else {
    header('Location: ../cadastro.php');
}

?>
