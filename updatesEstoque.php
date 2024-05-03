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
            
        }else{                       
            http_response_code(500);               
        };
    };

    if(isset($quantidade)){
        $sql =  "UPDATE cadastrodanglass.produto SET quantidade = ".$quantidade." WHERE tipo = '".$val['tipo']."' AND chapa = '".$val['chapa']."' AND espessura = '".$val['espessura']."'";
        $resultado = mysqli_query($conexao, $sql);

        $result = array(
            "value"=>"Foi"
        );
       
    };
    
};


echo json_encode($result)
?>