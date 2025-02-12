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
    <link rel="stylesheet" href="gasto.css">
</head>
<body>
    
    <div class="main">

    <form class="voltar" method="POST" action="./../home/home.php">
        <button>Voltar</button>
    </form>
    
    <form class="gasto" method="POST" action="./../../backend/router/userRouter.php?acao=inserirGasto">
        <input type="hidden" name="idUsuario" value="<?php echo $_SESSION["idUsuario"]?>" >

        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" placeholder="Descrição">

        <label for="valor">Valor</label>
        <input type="text" name="valor" placeholder="50.00">

        <label for="data">Data</label>
        <input type="date" name="data">

        <label for="horario">Horário</label>
        <input type="time" name="horario">

        <button type="submit">Cadastrar Gasto</button>
    </form>

    <h1 class="msg"> <?php
    if (!empty($_GET['msg'])){
    $msg = $_GET['msg'];
    echo $msg;
    }
?> </h1>

</div>


</body>
</html>