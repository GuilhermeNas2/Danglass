<?php

    header('Content-Type: text/html; charset=utf-8');

    require 'verifica.php';
    
    if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])):
    
    require './conexao/conexao.php';
    require './backend/log.php';

    $archive = new Log();
     

    $conn = new Conexao(); 
    $conexao = $conn->getConn(); 

    $id = $_SESSION['idUser'];

    $sql = "SELECT tipoUsuario FROM usuarios WHERE id =".$id;
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);

    $archive->writeLog("\n".$sql."  --->  ".$row['tipoUsuario']."\n" );   

    mysqli_free_result($result);
  
    $sql = "SELECT display,nome FROM viewTelas WHERE codigo =".$row['tipoUsuario'];
    $result = mysqli_query($conexao, $sql);   

    while($row = mysqli_fetch_array($result)){     
        $archive->writeLog("\n".$sql."--->".$row['display']." -- ".$row['nome']."\n" );      
        $data[] = array(
            'nome'=> $row['nome'],
            'display'=> utf8_encode($row['display'])
        );
               
    };   
    
    mysqli_free_result($result);
    mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Controle de estoque - Danglass </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
</head>

<body class="bg-dark" data-bs-theme="dark">
    <header class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container" >
                
                <h1 class="navbar-brand">Danglass</h1>
            
        </div>
    </header>

   <div class="container mt-5 fw-light text-center">
    <h1>Controle de Estoque</h1>
   </div>

   <div id="navbar-entradas" class="container mt-5 fw-light text-center d-grid gap-4 col-5 mx-auto" >
         <?php
            foreach($data as $key => $value){
                ?>    <a href=<?php echo $data[$key]['nome'].".php?pg=".$data[$key]['nome'] ?> class="btn-lg btn btn-outline-light"> <?php echo $data[$key]['display'] ?> </a> <?php
            }
         ?>  
   </div>

</body>
</html>

<?php else: header("Location: login.php"); endif;
?> 