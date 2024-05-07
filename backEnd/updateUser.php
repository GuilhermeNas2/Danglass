<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

require '../conexao/conexao.php';
require '../backEnd/log.php';

$content = new Log();
$conn = new Conexao();
$conexao = $conn->getConn();

$id = $_POST['key'];
if(isset($_POST['valor'])){    
    $infos = $_POST['valor'];  

    mysqli_begin_transaction($conexao);
    
    try {
        $sql = "SELECT codigo FROM tipouser WHERE tipo='".$infos."'";
        $response = mysqli_query($conexao, $sql);
        $row = mysqli_fetch_assoc($response);

        mysqli_free_result($response);
        
        
        $infos = $row['codigo'];
        
        $sql = "UPDATE usuarios SET tipoUsuario=".$infos." WHERE id=".$id."";
        $content->writeLog("\n".$sql."\n");
        
        $response = mysqli_query($conexao, $sql);       
              
        
        if (!($response)) {            
            throw new mysqli_sql_exception($conexao->error);            
        }; 

        mysqli_commit($conexao);        
        $result = array(
            "value" => "Operação feita com sucesso"
        );
       

    } catch (mysqli_sql_exception $exception) {
        $content->writeLog("\n".$sql." -----> ".$exception."\n");

        mysqli_rollback($conexao);
        $result = array(
            "value" => "Operação não concluida"
        );
        http_response_code(500); 

    };   
    mysqli_close($conexao);         
};

if(!isset($_POST['valor'])){
    mysqli_begin_transaction($conexao);
    try {
        $sql = "DELETE FROM usuarios WHERE id=".$id;
        $content->writeLog("\n".$sql."\n");
        $response = mysqli_query($conexao, $sql);
        
        if (!($response)) {
            throw new mysqli_sql_exception($conexao->error);
        }; 
                 
        mysqli_commit($conexao);

        $result = array(
            "value" => "Usuario excluido"
        );       

    } catch (mysqli_sql_exception $exception) {
        $content->writeLog("\n".$sql." -----> ".$exception."\n");

        mysqli_rollback($conexao);
        $result = array(
            "value" => "Operação não concluida"
        );
        http_response_code(500); 
    };   
    mysqli_close($conexao);     
};

echo json_encode($result);
?>