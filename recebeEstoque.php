
<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
session_start();
$conexao = mysqli_connect("localhost", "root", "", "cadastrodanglass");
//Recebendo as informações do formulário (estoque.php)

$cond ="";
if(isset($_POST['tipo']) && !empty($_POST['tipo'])){
    $tipo = $_POST['tipo'];
    $cond .="tipo ='".$tipo."'" ;
}else{
   $tipo = ""; 
}
if(isset($_POST['chapa']) && !empty($_POST['chapa'])){
    $chapa = $_POST['chapa']; 
    $cond .="AND chapa ='".$chapa."'";
}else{
   $chapa = ""; 
}
if(isset($_POST['espessura']) && !empty($_POST['espessura'])){
    $espessura = $_POST['espessura']; 
    $cond .="AND espessura ='".$espessura."'";
}else{
   $espessura = ""; 
}



//Identificando o ID do produto a partir das informações (Tipo, Chapa, Espessura)

$sql = "SELECT * FROM cadastrodanglass.produto WHERE ".$cond;
$retorno = mysqli_query($conexao, $sql);
$result = array();



while($row = mysqli_fetch_array($retorno)) {
    //$nego[] = $rowid['espessura'];
    $result[] = array(
        'id'=> $row['id'],
        'espessura'=> $row['espessura'],
        'chapa'=> $row['chapa'],    
        'quantidade'=> $row['quantidade']
    );

}

$contador = 0;
foreach($result as $qtd) {
    $contador += $qtd['quantidade'];
}


//Selecionando o campo (Quantidade) referente ao ID encontrado

//$sql = "SELECT quantidade FROM cadastrodanglass.produto WHERE id = '".$row['id']."'";
//$retornoqtd = mysqli_query($conexao, $sql);
//$row = mysqli_fetch_assoc($retornoqtd);

//var_dump($result);

$tipo .= " ".$chapa." ".$espessura." (".$contador.")";

$response = array(
    "tipo"=> $tipo,
    "chapa"=> $cond,
    "espessura"=> $espessura,
    "quantidade"=> $contador,
    "data"=> $result
);


echo json_encode($response)


?>




