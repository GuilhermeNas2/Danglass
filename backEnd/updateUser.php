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

    $sql = "UPDATE usuarios SET ".$string." WHERE id=".$id."";
    $response = mysqli_query($conexao, $sql);

    var_dump($sql);
};

if(!(isset($_POST['valor']))){
    $sql = "DELETE FROM usuarios WHERE id=".$id;
    $response = mysqli_query($conexao, $sql);

    var_dump($sql);
};


?>