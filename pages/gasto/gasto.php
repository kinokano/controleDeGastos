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
</head>
<body>
    <form method="POST" action="./../home/home.php">
        <button>Voltar</button>
    </form>
    <h1>Cadastrar gasto</h1>
    <?php echo $_SESSION["nome"];?>


</body>
</html>