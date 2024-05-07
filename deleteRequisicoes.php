<?php
require './conexao/conexao.php';
require './backEnd/log.php';

$content = new Log();
$conn = new Conexao(); 

$conexao = $conn->getConn(); 
$responsepage =array();

$infowhere = "";
$info = $_POST["selecionados"];
if (count($info)>1){
    foreach ($info as $key => $value) {
        if (count($info)==$key+1){
            $infowhere.= $value.")";
        } if (count($info)!=$key+1){
            $infowhere.="id IN (".$value.",";
        }  
    }
} else{
    $infowhere.= "id=".$info[0]."";
}

$sql= "DELETE FROM cadastrodanglass.requisicoes WHERE ".$infowhere."";
$resultado= mysqli_query($conexao,$sql);

if(mysqli_affected_rows($conexao)> 0){
    $content->writeLog("\n".$sql."\n");
    $responsepage[]=array(
        "error" => false,
        "status"=> "Operação finalizada com sucesso!",
    );
} else {
    $content->writeLog("\n".$sql." -----> ".$exception."\n");
    $responsepage[]=array(
        "status"=> "Operação falhou!",
    );
}
echo json_encode($responsepage);