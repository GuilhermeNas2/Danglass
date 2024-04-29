<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");


$responsepage = array();
$dados = $_POST["array"];
$conexao = mysqli_connect("localhost", "root", "", "Nego");


foreach ($dados as $key => $val) {
    echo $val["tipo"];
    $sql = "SELECT quantidade FROM Nego.produto WHERE tipo = '".$val['tipo']."' AND chapa = '".$val['chapa']."' AND espessura = '".$val['espessura']."'";
    $retornoqtd = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($retornoqtd);
    var_dump($row);
    $quantidade = $val["quantidade"] + $row['quantidade'];
    
    $sql =  "UPDATE Nego.produto SET quantidade = ".$quantidade." WHERE tipo = '".$val['tipo']."' AND chapa = '".$val['chapa']."' AND espessura = '".$val['espessura']."'";
    var_dump($sql);
    $resultado = mysqli_query($conexao, $sql);
};


?>