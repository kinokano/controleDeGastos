<?php
session_start();
if (!isset($_SESSION["idUsuario"])) {
    header('Location: ../../index.php');
    exit();
}

if (isset($_POST['logout'])) {
    // Destrói todas as variáveis de sessão
    session_unset();
    
    // Finaliza a sessão
    session_destroy();
    
    // Redireciona para a página de login ou homepage
    header("Location: ../../index.php");
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
</head>
<body>
    <h1>Bem vindo <?php echo $_SESSION["nome"];?></h1>

    <table>
        <th>
            <tr>
                <th>Valor</th>
                <th>Descrição</th>
                <th>Data</th>
                <th>Horário</th>
            </tr>
        </th>
            <tb>
                <?php
                foreach ($gastos as $gasto) {
                ?>
                    <tr>
                        <td><?php echo $gasto['valor']; ?></td>
                        <td><?php echo $gasto['descricao']; ?></td>
                        <td><?php echo $gasto['dataGasto']; ?></td>
                        <td><?php echo $gasto['horario']; ?></td>
                    </tr>
                <?php
                }
                ?>
             </tb>
    </table>


    <form method="POST">
        <button type="submit" name="logout">Fechar Sessão</button>
    </form>

</body>
</html>