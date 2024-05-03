<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

require '../conexao/conexao.php';

$conn = new Conexao();
$conexao = $conn->getConn();

$email = $_POST['valor'];

$sql = "SELECT * FROM usuarios WHERE email='".$email."'";
$response = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($response);

$result = array( 
    "id"=> $row['id'],
    "nome"=> $row['nome'],
    "email"=> $row['email'],
    "senha"=> $row['senha'],
    "tipoUsuario"=> $row['tipoUsuario']
);


echo json_encode($result);

