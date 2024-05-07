<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

require '../conexao/conexao.php';

$conn = new Conexao();
$conexao = $conn->getConn();

$email = $_POST['valor'];

$sql = "SELECT id,nome,
            CASE tipoUsuario
            WHEN 0 THEN 'Normal'
            WHEN 1 THEN 'Administrador'
            WHEN 2 THEN 'Administrador Master'
            END AS tipoUsuario
             FROM usuarios WHERE email='".$email."'";
$response = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($response);

if($response){
    mysqli_free_result($response);

    $sql = "SELECT tipo FROM tipouser ";
    $response = mysqli_query($conexao, $sql);
    $arrayType = array();
    while($rowS = mysqli_fetch_assoc($response)){
        $arrayType[] =  $rowS;
    };

    mysqli_free_result($response);
};

mysqli_close($conexao);

$result = array( 
    "id"=> $row['id'],
    "nome"=> $row['nome'],    
    "tipoUsuario"=> $row['tipoUsuario'],
    "tipos"=> $arrayType
);


echo json_encode($result);

