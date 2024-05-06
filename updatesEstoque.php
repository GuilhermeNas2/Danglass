<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

require './conexao/conexao.php';

$responsepage = array();
$dados = $_POST["array"];
$modulo = $_POST["modo"];

$conn = new Conexao(); 
$conexao = $conn->getConn(); 
$string = 'Esses produtos não possuem estoque suficiente, refaça a operação';


if ($modulo == 2) {
    foreach ($dados as $key => $val) {
        $sql = "SELECT quantidade FROM cadastrodanglass.produto WHERE tipo = '".$val['tipo']."' AND chapa = '".$val['chapa']."' AND espessura = '".$val['espessura']."'";
        $response = mysqli_query($conexao, $sql);
        $row = mysqli_fetch_assoc($response);

        if($row['quantidade'] <= $val['quantidade']){  
            $cond = false;        
            // $string .=  $val['tipo']." x ".$val['chapa']." x ".$val['espessura'];
            $result = array(
                "error" => true,
                "value" => $string
            );   
            
        }; 
        
    };
}

if(!(isset($cond))) {
    foreach ($dados as $key => $val) {        
        $sql = "SELECT quantidade FROM cadastrodanglass.produto WHERE tipo = '".$val['tipo']."' AND chapa = '".$val['chapa']."' AND espessura = '".$val['espessura']."'";        
        $retornoqtd = mysqli_query($conexao, $sql);
        $row = mysqli_fetch_assoc($retornoqtd);
        
        if ($modulo == 1) {
            $quantidade = $val["quantidade"] + $row['quantidade'];
        }
       
        if ($modulo == 2) {
            if($row['quantidade'] >= $val['quantidade']){          
                $quantidade = $row["quantidade"] - $val['quantidade'];
                
            };
        };
    
        if(isset($quantidade) && $quantidade > 0){
            
            mysqli_begin_transaction($conexao);
            try {
                $sql =  "UPDATE cadastrodanglass.produto SET quantidade = ".$quantidade." WHERE tipo = '".$val['tipo']."' AND chapa = '".$val['chapa']."' AND espessura = '".$val['espessura']."'";
               
                $resultado = mysqli_query($conexao, $sql); 
                $quantidade = 0;
                
                if (!($resultado)) {
                    throw new mysqli_sql_exception("Erro duante a execução da consulta SQL");
                }; 
    
                mysqli_commit($conexao);
                $result = array(
                    "value" => "Operação feita com sucesso"
                );
    
            } catch (mysqli_sql_exception $exception) {
                mysqli_rollback($conexao);           
                http_response_code(500); 
            };    
           
        };
        
    };
    
};


echo json_encode($result);
?>