<?php

require_once __DIR__ . "/../controller/userController.php";

$userController = new UserController();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    switch ($_GET["acao"]){
        case 'logout':
            session_unset();
            session_destroy();
            header("Location: ../../index.php");
            exit();
            break;

        case 'inserirGasto':
            $idUsuario = $_POST["idUsuario"];
            $descricao = $_POST["descricao"];
            $valor = $_POST["valor"];
            $data = $_POST["data"];
            $horario = $_POST["horario"];

            if(empty($valor)){
                header("Location: ../../pages/gasto/gasto.php?msg= Campo de valor é obrigatório!");
            }
            else{
                $resposta = $userController ->InserirGasto($idUsuario, $valor, $descricao, $data, $horario);
                if($resposta){
                    header("Location: ../../pages/gasto/gasto.php?msg= Gasto inserido com sucesso!");
                }
                else{
                    header("Location: ../../pages/gasto/gasto.php?msg= Erro ao inserir gasto!");
                }
            }

            break;

        case 'deletarGasto':
            $idGasto = $_POST["idGasto"];
            echo $idGasto;
            $deletar = $userController -> DeletarGasto($idGasto);
            if($deletar){
                header("Location: ../../pages/home/home.php?msg=Gasto deletado com sucesso!");
            }
            else{
                header("Location: ../../pages/home/home.php?msg=Erro ao deletar gasto!");
            }

            break;
        
        default:
            echo "Login achei nenhuma das opções";
            break;
}
}

?>