<?php
namespace App\Models;

class EstoqueModels{
    private $conn;    
    private $result = array();

    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->getConn();
    }

    public function updateEstoque($data, $modulo){
        if($modulo == 2){
            EstoqueModels::verifyEstoque($data);
        } 

    }

    private static function verifyEstoque($data){
        foreach ($dados as $key => $val) {
            $sql = "SELECT quantidade FROM cadastrodanglass.produto WHERE tipo = '".$val['tipo']."' AND chapa = '".$val['chapa']."' AND espessura = '".$val['espessura']."'";
            $response = mysqli_query($conexao, $sql);
            $row = mysqli_fetch_assoc($response);
            
            if($row['quantidade'] < $val['quantidade']){             
                $cond = false;  
                $string .= $val['tipo']." x ".$val['chapa']." x ".$val['espessura']."";
                $result = array(
                    "error" => true,
                    "value" => $string
                );   
                
            }; 
            mysqli_free_result($response);
        };    
        
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