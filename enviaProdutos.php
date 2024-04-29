<?php
include_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php  
$conexao = mysqli_connect("localhost", "root", "", "cadastrodanglass");
include_once "conexao.php";
$tipo = $_POST['tipo'];

$espessura = $_POST['espessura'];

$chapa = $_POST['chapa'];

$quantidade = $_POST['quantidade'];



$sql = "SELECT id FROM cadastrodanglass.produto WHERE tipo = '$tipo' AND espessura = '$espessura' AND chapa = '$chapa'";
$retorno = mysqli_query($conexao, $sql);
$rowid = mysqli_fetch_assoc($retorno);


$sql = "SELECT quantidade FROM cadastrodanglass.produto WHERE id = '".$rowid['id']."'";
$retornoqtd = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($retornoqtd);

$quantidade = $quantidade + $row['quantidade'];


$sql = "UPDATE cadastrodanglass.produto SET quantidade = '$quantidade' WHERE id = '".$rowid['id']."'";
$resultado = mysqli_query($conexao, $sql);

header("Location: entradas.php");

?>




</body>
</html>

