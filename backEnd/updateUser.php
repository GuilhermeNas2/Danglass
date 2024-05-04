<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

require '../conexao/conexao.php';

$conn = new Conexao();
$conexao = $conn->getConn();

$id = $_POST['key'];
if(isset($_POST['valor'])){    
    $infos = $_POST['valor'];
    $string = '';

    if(count($infos) == 1) {
        
        $cond = "'".$infos[0]['e']."'";  

        $string = $infos[0]['id']." = ".$cond;
    } else {
        foreach($infos as $key => $value ) {        
            
            $cond = "'".$infos[$key]['e']."'";          
        
            if(count($infos) != $key + 1) {
                $string .= $infos[$key]['id']." = ".$cond.", ";        
            }; 

            if(count($infos) == $key + 1) {
                $string .= $infos[$key]['id']." = ".$cond;
            };
        };
    };

    mysqli_begin_transaction($conexao);
    
    try {
        $sql = "UPDATE usuarios SET ".$string." WHERE id=".$id."";
        $response = mysqli_query($conexao, $sql);

        
        if (!($response)) {
            throw new mysqli_sql_exception("Erro durante a execução da consulta SQL");
        }; 

        mysqli_commit($conexao);
        $result = array(
            "value" => "Operação feita com sucesso"
        );
       

    } catch (mysqli_sql_exception $exception) {

        mysqli_rollback($conexao);
        $result = array(
            "value" => "Operação não concluida"
        );
        http_response_code(500); 

    };            
};

if(!isset($_POST['valor'])){
    mysqli_begin_transaction($conexao);
    try {
        $sql = "DELETE FROM usuarios WHERE id=".$id;
        $response = mysqli_query($conexao, $sql);
        
        if (!($response)) {
            throw new mysqli_sql_exception("Erro durante a execução da consulta SQL");
        }; 

        mysqli_commit($conexao);
        $result = array(
            "value" => "Usuario excluido"
        );       

    } catch (mysqli_sql_exception $exception) {

        mysqli_rollback($conexao);
        $result = array(
            "value" => "Operação não concluida"
        );
        http_response_code(500); 
    };        
};

echo json_encode($result);
?>