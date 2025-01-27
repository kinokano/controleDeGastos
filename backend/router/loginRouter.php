<?php

    require_once __DIR__ . "/../controller/loginController.php";

    $loginController = new LoginController();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        switch ($_GET["acao"]){
            case 'validarLogin':
                $email = $_POST["email"]

        }
    }


?>