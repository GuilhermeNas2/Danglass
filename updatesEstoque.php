<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
$responsepage = array();
$dados = $_POST["array"];
$modulo = $_POST["modo"];
$conexao = mysqli_connect("localhost", "root", "", "cadastrodanglass");


foreach ($dados as $key => $val) {
    var_dump($val['quantidade']);
    $sql = "SELECT quantidade FROM cadastrodanglass.produto WHERE tipo = '".$val['tipo']."' AND chapa = '".$val['chapa']."' AND espessura = '".$val['espessura']."'";
    $retornoqtd = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($retornoqtd);
    
    if ($modulo == 1) {
        $quantidade = $val["quantidade"] + $row['quantidade'];
    }
    if ($modulo == 2) {
        if($row['quantidade']>=$val['quantidade']){
            $quantidade = $row["quantidade"] - $val['quantidade'];
            var_dump(1);
        }else{
            echo "Estoque não ser ficar negativo!";
            var_dump(2);
        }
    }
    
    
    
    
    
    $sql =  "UPDATE cadastrodanglass.produto SET quantidade = ".$quantidade." WHERE tipo = '".$val['tipo']."' AND chapa = '".$val['chapa']."' AND espessura = '".$val['espessura']."'";
    
    $resultado = mysqli_query($conexao, $sql);
}



?>