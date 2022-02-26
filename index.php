<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Inicio</title>
    <link href="/css/style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" , charset="UTF8">
</head>

<body>
    <div class="container">
        <div class="box">
            <div class="sideLogin">
            </div>
            <h1>Login</h1>
            <hr>
            <div>
                <form method="post" action="login.php">
                    <input type="email" minlength="10" maxlength="256" placeholder="Digite seu e-mail" required="required" autofocus>
                    <br>
                    <input type="password" minlength="8" maxlength="20" placeholder="Senha" required="required">
                    <br>
                    <input type="submit" value="Entrar">
                </form>

            </div>
            <p>Primeira vez por aqui? Faça seu cadastro.</p>
            <a href="cadastro.php">
                <button>Cadastro</button>
            </a>
        </div>
    </div>
</body>

</html>