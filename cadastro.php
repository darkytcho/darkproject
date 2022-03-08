<!DOCTYPE html>
<html>

<head>
    <title>Cadastro</title>
    <meta name='viewport' charset='utf-8' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='/css/style.css'>
</head>

<body>
    <div class="container">

        <div class="bigBox">
            <h1>Cadastro</h1>
            <form method="post" action="action/cadastroAction.php">
                <div class="box1">
                    <label for="nome">Digite seu nome:</label><br>
                    <input name="nome" type="text" minlength="5" maxlength="70" placeholder="Nome" required="required"
                        autofocus><br>
                    <label for="senha">Digite sua senha:</label><br>
                    <input name="senha" type="password" maxlength="20" minlength="8" placeholder="8 - 20 Caracteres"
                        required="required"><br>
                    <label for="senha2">Digite a senha novamente:</label><br>
                    <input name="senha2" type="password" maxlength="20" minlength="8" placeholder="Repita a senha"
                        required="required"><br>
                    <label for="email">Digite seu endereço de email:</label><br>
                    <input name="email" type="email" minlength="10" maxlength="256" placeholder="Digite o email"
                        required="required">
                </div>
                <div class="box2">
                    <label for="telefone">Telefone:</label><br>
                    <input name="telefone" type="tel" minlength="10" maxlength="13" placeholder="Digite o telefone"><br>

                    <label for="nascimento">Data de nascimento:</label><br>
                    <input name="nascimento" type="date" placeholder="Sua data de nascimento"><br>
                </div>
                <input type="submit" value="Cadastrar">
            </form>
            <a href="/index.php">
                <button>Inicio</button>
            </a>

        </div>
    </div>
</body>

</html>