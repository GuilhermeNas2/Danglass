<?php
include_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src=" https://cdn.jsdelivr.net/npm/sweetalert@2.1.2/dist/sweetalert.min.js "></script>
</head>
<body>
<script>
    function openPopup() {
            document.getElementById('popup').style.display = 'block';
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
</script>

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

if($row['quantidade']>=$quantidade){
    $quantidade = $row['quantidade'] - $quantidade;
    $sql = "UPDATE cadastrodanglass.produto SET quantidade = '$quantidade' WHERE id = '".$rowid['id']."'";
    $resultado = mysqli_query($conexao, $sql); 
    header("Location: saidas.php");
}else{
       echo "Estoque não ser ficar negativo!";
}








?>





</body>
</html>

