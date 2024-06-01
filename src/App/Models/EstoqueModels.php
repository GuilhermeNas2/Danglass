<?php
namespace App\Models;
use Log\Logs;

class EstoqueModels{
    private $conn;    
    private $result = array();
    private $log;

    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->getConn();
        $this->log = new Logs();
    }

    public function updateEstoque($data, $modulo){
        $cond = true;

        if($modulo == 2){
           $cond = EstoqueModels::verifyEstoque($data);

           if($cond != ''){
                return $cond;
           }
        } 
        
        foreach ($data as $key => $val) {        
            $sql = "SELECT quantidade FROM cadastrodanglass.produto WHERE tipo = '".$val['tipo']."' AND chapa = '".$val['chapa']."' AND espessura = '".$val['espessura']."'";        
            $response = mysqli_query($this->conn, $sql);
            $row = mysqli_fetch_assoc($response);
                
            if ($modulo == 1) {
                $quantidade = $val["quantidade"] + $row['quantidade'];
            }
             
            if ($modulo == 2) {
                if($row['quantidade'] >= $val['quantidade']){                          
                    $quantidade = $row["quantidade"] - $val['quantidade'];                        
                };
            };
        
            mysqli_free_result($response);
                
            
            if(isset($quantidade)){
                mysqli_begin_transaction($this->conn);
                try {
                    $sql =  "UPDATE cadastrodanglass.produto SET quantidade = ".$quantidade." WHERE tipo = '".$val['tipo']."' AND chapa = '".$val['chapa']."' AND espessura = '".$val['espessura']."'";
                    $this->log->writeLog("\n".$sql."\n");
                    $newQtd[] = array(
                       'id' => $val['id'],
                        'qtd' => $quantidade
                    );
        
                    $response = mysqli_query($this->conn, $sql); 
                    $quantidade = 0;
                       
                    if (!($response)) {
                        throw new \mysqli_sql_exception($this->conn->error);
                    }; 
            
                    mysqli_commit($this->conn);
            
                    } 
                    catch(\mysqli_sql_exception $exception) {
                        $this->log->writeLog("\n".$sql." -----> ".$exception."\n");
                        mysqli_rollback($this->conn);           
                        http_response_code(500); 
                    };    
                   
                };
               
            };

            $result = array(
                "value" => "Operação feita com sucesso",
                "newQtd" => $newQtd
            );
            
            mysqli_close($this->conn);
            return $result;
        

    }

    private function verifyEstoque($data){
        $string = 'Esses produtos não possuem estoque suficiente, refaça a operação:  ';

        foreach ($data as $key => $val) {
            $sql = "SELECT quantidade FROM cadastrodanglass.produto WHERE tipo = '".$val['tipo']."' AND chapa = '".$val['chapa']."' AND espessura = '".$val['espessura']."'";
            $response = mysqli_query($this->conn, $sql);
            $row = mysqli_fetch_assoc($response);
            
            if($row['quantidade'] < $val['quantidade']){  
                $string .= $val['tipo']." x ".$val['chapa']." x ".$val['espessura']."";
                $result = array(
                    "error" => true,
                    "value" => $string
                );   
                return $result;
            }; 
            mysqli_free_result($response);
        };   
        return;
    }
    
    public function getEstoque($cond){
       $sql = "SELECT * FROM cadastrodanglass.produto WHERE ".$cond;
       $retorno = mysqli_query($this->conn, $sql);

       while($row = mysqli_fetch_array($retorno)) {    
            $result[] = array(
                'id'=> $row['id'],
                'espessura'=> $row['espessura'],
                'chapa'=> $row['chapa'],    
                'quantidade'=> $row['quantidade']
            );

       };  
       return $result;
    }

    public static function count($data) {
        $contador = 0;
        foreach($data as $qtd) {
             $contador += $qtd['quantidade'];
          
        };
        
        return $contador;        
    }

}

?>