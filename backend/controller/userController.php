<?php
    include_once __DIR__ . "/../database/database.php";

class UserController{
    private $conn;

    public function __construct(){
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function InserirGasto($idUsuario, $valor, $descricao, $dataGasto, $horario){
        try{
            if($dataGasto && $horario){
                $sql = "INSERT INTO gastos(idUsuario, valor, descricao, dataGasto,horario)
                VALUES (:idUsuario, :valor, :descricao, :dataGasto, :horario)";
                $db = $this->conn->prepare($sql);
                $db->bindParam(":idUsuario",$idUsuario);
                $db->bindParam(":valor",$valor);
                $db->bindParam(":descricao",$descricao);
                $db->bindParam(":dataGasto",$dataGasto);
                $db->bindParam(":horario",$horario);
                if($db->execute()){
                    return true;
                }
                else{
                    return false;
                }
            }
            else if($dataGasto && !$horario){
                $sql = "INSERT INTO gastos(idUsuario, valor, descricao, dataGasto)
                VALUES (:idUsuario, :valor, :descricao, :dataGasto)";
                $db = $this->conn->prepare($sql);
                $db->bindParam(":idUsuario",$idUsuario);
                $db->bindParam(":valor",$valor);
                $db->bindParam(":descricao",$descricao);
                $db->bindParam(":dataGasto",$dataGasto);
                if($db->execute()){
                    return true;
                }
                else{
                    return false;
                }
            }
            else if(!$dataGasto && $horario){
                $sql = "INSERT INTO gastos(idUsuario, valor, descricao,horario)
                VALUES (:idUsuario, :valor, :descricao, :horario)";
                $db = $this->conn->prepare($sql);
                $db->bindParam(":idUsuario",$idUsuario);
                $db->bindParam(":valor",$valor);
                $db->bindParam(":descricao",$descricao);
                $db->bindParam(":horario",$horario);
                if($db->execute()){
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                $sql = "INSERT INTO gastos(idUsuario, valor, descricao)
                VALUES (:idUsuario, :valor, :descricao)";
                $db = $this->conn->prepare($sql);
                $db->bindParam(":idUsuario",$idUsuario);
                $db->bindParam(":valor",$valor);
                $db->bindParam(":descricao",$descricao);
                if($db->execute()){
                    return true;
                }
                else{
                    return false;
                }
            }

        }
        catch (\Exception $e) {
            // Caso ocorra algum erro durante o processo, exibe uma mensagem de erro
            echo "Erro: " . $e->getMessage();
        }

    }

    public function GetAllGastos($idUsuario){
        try{
            $sql = "SELECT * FROM gastos WHERE idUsuario = :idUsuario";
            $db = $this->conn->prepare($sql);
            $db->bindParam(":idUsuario",$idUsuario);
            $db->execute();
            
            $gastos = $db->fetchAll(PDO::FETCH_ASSOC);
            return $gastos;
        }
        catch (\Exception $e) {
            // Caso ocorra algum erro durante o processo, exibe uma mensagem de erro
            echo "Erro: " . $e->getMessage();
        }
    }

    public function DeletarGasto($idGasto){
        try{
            $sql = "DELETE FROM gastos WHERE idGasto = :idGasto";
            $db = $this->conn->prepare($sql);
            $db->bindParam(":idGasto",$idGasto);
            if($db->execute()){
                return true;
            }
            else{
                return false;
            }
            
        }
        catch (\Exception $e) {
            // Caso ocorra algum erro durante o processo, exibe uma mensagem de erro
            echo "Erro: " . $e->getMessage();
        }
    }

}