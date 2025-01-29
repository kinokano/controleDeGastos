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
        
        default:
            echo "Login achei nenhuma das opções";
            break;
}
}

?>