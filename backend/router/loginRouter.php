<?php

    require_once __DIR__ . "/../controller/loginController.php";

    $loginController = new LoginController();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        switch ($_GET["acao"]){
            case 'validarLogin':
                $email = $_POST["email"];
                $senha = $_POST["senha"];
                if(!(empty($email) || empty($senha))){
                    $resposta = $loginController->Login($email,$senha);
                    
                    if($resposta){
                        header("Location: ../../pages/home/home.php");
                        
                    }
                    else{
                        header("Location: ../../index.php?erro_msg= Login Inválido!");
                    }
                
                }else{
                    header("Location: ../../index.php?erro_msg= Todos os campos são obrigatórios!");
                }
                break;
            
            default:
                echo "Login achei nenhuma das opções";
                break;
    }
}

?>