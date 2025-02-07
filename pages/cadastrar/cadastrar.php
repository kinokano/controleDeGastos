
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="cadastrar.css">
</head>
<body>

    <form action="../../index.php">
        <button>Voltar</button>
    </form>

    <body>
        <form method="POST" action="../../backend/router/loginRouter.php?acao=cadastrar">
            <div>
                <input type="text" name="nome" placeholder="nome" require>
                <input type="email" name="email" placeholder="email" require>
                <input type="password" name="senha" placeholder="senha" require>
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </body>

    <h1> <?php
    if (!empty($_GET['erro_msg'])){
    $erro = $_GET['erro_msg'];
    echo $erro;
    }
?> </h1>

</body>
</html>