<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    
    <body>
        <form method="POST" action="./backend/router/loginRouter.php?acao=validarLogin">
            <div>
                <input type="email" name="email" placeholder="email">
                <input type="password" name="senha" placeholder="senha">
                <button type="submit">Logar</button>
            </div>
        </form>
    </body>


</body>
</html>