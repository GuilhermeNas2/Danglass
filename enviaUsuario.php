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

$email = $_POST['email'];
$email = mysqli_real_escape_string($conexao, $email);

$sql = "SELECT email FROM cadastrodanglass.usuarios WHERE email = '$email'";
$retorno = mysqli_query($conexao, $sql);
 
if(mysqli_num_rows($retorno) > 0) {
    echo "E-mail já cadastrado!";

}   else{
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    $tipoUsuario = $_POST['tipoUsuario'];

    $sql = "INSERT INTO cadastrodanglass.usuarios (nome, senha, email, tipoUsuario) values ('$nome', '$senha', '$email', '$tipoUsuario')";
    $resultado = mysqli_query($conexao, $sql);
    
    header("Location: inicio.php");
    
}
 
?>



</body>
</html>