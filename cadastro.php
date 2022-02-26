<!DOCTYPE html>
<html>

<head>
    <title>Cadastro</title>
    <meta name='viewport' charset='utf-8' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='/css/style.css'>
</head>

<body>
    <div class="container">
        <div class="box">
            <div class="sideLogin">
            </div>
            <h1>Cadastro</h1>
            <hr>
            <form method="post">
                <h5 class="left">Digite seu nome:</h5>
                <input type="text" minlength="5" maxlength="70" placeholder="Digite seu nome" required="required" autofocus>
                <h5 class="left">Digite sua senha:</h5>
                <input type="password" maxlength="20" minlength="8" placeholder="8 - 20 Caracteres" required="required">
                <h5 class="left">Digite a senha novamente:</h5>
                <input type="password" maxlength="20" minlength="8" placeholder="Repita a senha" required="required">
                <h5 class="left">Digite seu endereço de email</h5>
                <input type="email" minlength="10" maxlength="256" placeholder="Digite o email" required="required">
                <input type="submit" value="Cadastrar">
            </form>
            <a href="/index.php">
                <button>Inicio</button>
            </a>
        </div>
    </div>
    </div>
</body>

</html>