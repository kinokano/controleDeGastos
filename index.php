

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    
    <div class="login">
    <h1 class="titulo">Login</h1>

    <form class="form-login" method="POST" action="./backend/router/loginRouter.php?acao=validarLogin">
            <label for="email">Email</label>
            <input type="email" name="email" require>
            <label for="senha">Senha</label>
            <input type="password" name="senha" require>
            <button type="submit">Logar</button>
    </form>
    
        <a href="./pages/cadastrar/cadastrar.php">Cadastrar</a>
   


    <h1 class="msgErro"> <?php
    if (!empty($_GET['erro_msg'])){
    $erro = $_GET['erro_msg'];
    echo $erro;
    }
    ?> </h1>

    </div>

</body>
</html>