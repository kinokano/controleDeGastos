<?php
session_start();
if (!isset($_SESSION["idUsuario"])) {
    header('Location: ../../index.php');
    exit();
}

include_once __DIR__."/../../backend/controller/userController.php";
$user = new UserController();
$gastos = $user->GetAllGastos($_SESSION["idUsuario"]);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="consultar.css">
</head>
<body>

<div class="main">
    
    <form class="voltar" method="POST" action="./../home/home.php">
        <button>Voltar</button>
    </form>

    <table class="tabela">
        <thead>
            <tr>
                <th>Valor</th>
                <th>Descrição</th>
                <th>Data</th>
                <th>Horário</th>
                <th>Ação</th>
            </tr>
        </thead>
            <tb>
                <?php
                
                foreach ($gastos as $gasto) {
                ?>
                    <tr>
                        <td><?php echo $gasto['valor']; ?></td>
                        <td><?php echo $gasto['descricao']; ?></td>
                        <td><?php echo $gasto['dataGasto']; ?></td>
                        <td><?php echo $gasto['horario']; ?></td>
                        <td>
                            <form class='formApagar' method="POST" action="./../../backend/router/userRouter.php?acao=deletarGasto">
                                <input type="hidden" name="idGasto" value=<?php echo $gasto['idGasto'];?>>
                                <button class="apagar" type="submit">
                                    Apagar
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
             </tb>
    </table>

    <h1 class="msgErro"> <?php
    if (!empty($_GET['msg'])){
    $erro = $_GET['msg'];
    echo $erro;
    }
    ?> </h1>

</div>

    
    
</body>
</html>