<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Cadastro</title>
    <meta name='viewport' charset='utf-8' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='/css/style.css'>
</head>

<body>
    <h1>Cadastro</h1>
    <form method="post" action="action/cadastroAction.php">
        <label for="nome">Digite seu nome:</label>
        <input name="nome" type="text" minlength="5" maxlength="70" placeholder="Nome" required="required" autofocus>
        <label for="senha">Digite sua senha:</label>
        <input name="senha" type="password" maxlength="20" minlength="8" placeholder="8 - 20 Caracteres"
            required="required">
        <label for="senha2">Digite a senha novamente:</label>
        <input name="senha2" type="password" maxlength="20" minlength="8" placeholder="Repita a senha"
            required="required">
        <label for="email">Digite seu endereço de email:</label>
        <input name="email" type="email" minlength="10" maxlength="256" placeholder="Digite o email"
            required="required">
        <label for="telefone">Telefone:</label>
        <input name="telefone" type="tel" minlength="10" maxlength="13" placeholder="Digite o telefone">
        <label for="nascimento">Data de nascimento:</label>
        <input name="nascimento" type="date">
        <input type="submit" value="Cadastrar">
    </form>
    <a href="/index.php">
        <button>Inicio</button>
    </a>
</body>

</html>