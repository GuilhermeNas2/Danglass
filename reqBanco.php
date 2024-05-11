<?php

require './conexao/conexao.php';
require './backEnd/log.php';

$content = new Log();

$conn = new Conexao(); 
$conexao = $conn->getConn(); 

$dados = $_POST['data'];

foreach ($dados as $dado) {
    $tipo = $dado['tipo'];
    $chapa = $dado['chapa'];
    $espessura = $dado['espessura'];
    $quantidade = $dado['quantidade'];

    try{

    }
    $sql = "INSERT INTO cadastrodanglass.requisicoes (tipo, chapa, espessura, quantidade) VALUES ('$tipo', '$chapa', '$espessura', '$quantidade')";        
    $retorno = mysqli_query($conexao, $sql);

    $result = array(            
        "value" => "Deu certo"
    );  

    catch{
        
    }
        
}

mysqli_close($conexao);


echo json_encode($result)
   

?>
