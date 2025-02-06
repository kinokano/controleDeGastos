<?php
    include_once __DIR__ . "/../database/database.php";

class LoginController{

    private $conn;

    public function __construct(){
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function Login($email, $senha){
        try{
            $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
            $db = $this->conn->prepare($sql);
            $db->bindParam(":email",$email);
            $db->bindParam(":senha",$senha);
            $db->execute();
            
            $usuario = $db->fetchAll(PDO::FETCH_ASSOC);
            
            if ($usuario) {
                // Inicia a sessão para armazenar informações do usuário logado
                session_start();
                // Armazena o ID do usuário na sessão para uso posterior
                $_SESSION["idUsuario"] = $usuario[0]["idUsuario"];
                $_SESSION["nome"] = $usuario[0]["nome"];
                // Retorna verdadeiro para indicar que o login foi bem-sucedido
                return true;
            } else {
                // Se o usuário não for encontrado, retorna falso indicando falha no login
                return false;
            }

        }
        catch (\Exception $e) {
            // Caso ocorra algum erro durante o processo, exibe uma mensagem de erro
            echo "Erro: " . $e->getMessage();
        }

    }

    public function Cadastro($nome, $email, $senha){
        try{
            $sql = "INSERT INTO usuarios(nome, email, senha) VALUES (:nome, :email ,:senha)";
            $db = $this->conn->prepare($sql);
            $db = $this->conn->prepare($sql);
            $db->bindParam(":nome",$nome);
            $db->bindParam(":email",$email);
            $db->bindParam(":senha",$senha);
            
            if ($db->execute()) {
                return true;
            } else {
                return false;
            }

        }
        catch (\Exception $e) {
            // Caso ocorra algum erro durante o processo, exibe uma mensagem de erro
            echo "Erro: " . $e->getMessage();
        }

    }

}

// $login = new LoginController();
// $login->Login('joao.silva@example.com','senha123');


?>  