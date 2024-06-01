<?php
namespace App\Models;
use App\Models\Conexao;
use Log\Logs;

class ReqModels{
    private $conn;
    private $log;

    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->getConn();
        $this->log = new Logs();
    }

    public function getReq() {
        $sql = "SELECT * FROM requisicoes";
        $result = mysqli_query($this->conn, $sql);

        $data = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $data[] = $row;
            };
        };

        return $data;

    }

    public function updateReq($dados) {
        mysqli_begin_transaction($this->conn);
        foreach ($dados as $dado) {
            try{
                $tipo = $dado['tipo'];
                $chapa = $dado['chapa'];
                $espessura = $dado['espessura'];
                $quantidade = $dado['quantidade'];        
                
                $sql = "INSERT INTO cadastrodanglass.requisicoes (tipo, chapa, espessura, quantidade) VALUES ('$tipo', '$chapa', '$espessura', '$quantidade')"; 
                $this->log->writeLog("\n".$sql."\n");       
                $response = mysqli_query($this->conn, $sql); 
               
                
                if (!($response)) {
                    throw new \mysqli_sql_exception($this->conn->error);
                };   

                mysqli_commit($this->conn);
            } 
            catch (\mysqli_sql_exception $exception) {
                $this->log->writeLog("\n".$sql." -----> ".$exception."\n");
                mysqli_rollback($this->conn);           
                http_response_code(500); 
            };    
        };
        
        $result = array(            
            "value" => "Deu certo"
        );  
    
        return $result;
    }

    public function deleteReq($infowhere) {
        mysqli_begin_transaction($this->conn);
        try{
            $sql= "DELETE FROM cadastrodanglass.requisicoes WHERE ".$infowhere."";
            $response= mysqli_query($this->conn,$sql);

            if (!($response)) {
                throw new \mysqli_sql_exception($this->conn->error);
            };  

            if(mysqli_affected_rows($this->conn)> 0){
                $this->log->writeLog("\n".$sql."\n");
                $responsepage = array(
                    "error" => false,
                    "status"=> "Operação finalizada com sucesso!",
                );
                mysqli_commit($this->conn);
            };
        } catch(\mysqli_sql_exception $exception){
            $this->log->writeLog("\n".$sql." -----> ".$exception."\n");            
            mysqli_rollback($this->conn);           
            http_response_code(500); 
        }
        return $responsepage;
    }
}
?>