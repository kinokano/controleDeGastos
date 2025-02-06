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
            
            case 'cadastrar':
                $nome =  $_POST["nome"];
                $email = $_POST["email"];
                $senha = $_POST["senha"];

                if(!(empty($email) || empty($senha) || empty($nome))){
                    $resposta = $loginController->Cadastro($nome,$email,$senha);

                    if($resposta){
                        $logar = $loginController->Login($email,$senha);
                        if($logar){
                            header("Location: ../../pages/home/home.php");
                        }
                    }
                    else{
                        header("Location: ../../pages/cadastrar/cadastrar.php?erro_msg= Cadastro Inválido!");
                    }

                }else{

                    header("Location ../../pages/cadastrar/cadastrar.php");
                }

            default:
                echo "Não achei nenhuma das opções";
               
                break;
    }
}

?>