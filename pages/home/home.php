<?php
session_start();
if (!isset($_SESSION["idUsuario"])) {
    header('Location: ../../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home.css">

</head>
<body>
   
    <div class="main">

    <h1 class="titulo">Bem vindo <?php echo $_SESSION["nome"];?></h1>

    
    <form action="./../gasto/gasto.php">
        <button>Cadastrar Gasto</button>
    </form>

    <form action="./../consultar/consultar.php">
        <button>Consultar Gastos</button>
    </form>

    <form method="POST" action="./../../backend/router/userRouter.php?acao=logout">
        <button name="logout">Logout</button>
    </form>

    </div>


</body>
</html>