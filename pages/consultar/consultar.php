<?php
session_start();
if (!isset($_SESSION["idUsuario"])) {
    header('Location: ../../index.php');
    exit();
}

include_once __DIR__."/../../backend/controller/userController.php";
$user = new UserController();
$gastos = $user->GetAllGastos($_SESSION["idUsuario"]);

$meses = ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'];

if(!empty($_GET["filtroMes"])){
    $gastos = $user->GetGastosByMonth($_SESSION["idUsuario"], $_GET["filtroMes"]);

}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Gastos</title>
    <link rel="stylesheet" href="consultar.css">
</head>
<body>

<div class="main">
    
    <form class="voltar" action="./../home/home.php">
        <button>Voltar</button>
    </form>
    
    <form class="filtro" method="POST" action="./../../backend/router/userRouter.php?acao=filtroMes">
        <select name="mes" id="" require>
        <option value=""></option>

        <?php
        $i = 1;    
        foreach($meses as $mes){
        
        echo'<option value="' . $i . '">' . $mes . '</option>';
        $i = $i + 1;
        }
        ?>
        </select>
        <button type="submit">Filtrar por mês</button>
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
        <tbody>
            <?php 
            $total = 0.0;
            foreach ($gastos as $gasto){
            $total += $gasto['valor'];    
                ?>
                <tr>
                    <td><?php echo number_format($gasto['valor'], 2, ',', '.'); ?></td>
                    <td><?= $gasto['descricao'] ?></td>
                    <td><?= $gasto['dataGasto'] ?></td>
                    <td><?= $gasto['horario'] ?></td>
                    <td>
                        <form class='formApagar' method="POST" action="./../../backend/router/userRouter.php?acao=deletarGasto">
                            <input type="hidden" name="idGasto" value="<?= $gasto['idGasto'] ?>">
                            <button class="apagar" type="submit">Apagar</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
            <tr class="total"> 
            <td>Total = <?php echo number_format($total, 2, ',', '.');?></td>
            </tr>
        </tbody>
    </table>

    <h1 class="msg">
        <?php if (!empty($_GET['msg'])){
            echo $_GET['msg'];
        }
            ?>
    </h1>
</div>

</body>
</html>
