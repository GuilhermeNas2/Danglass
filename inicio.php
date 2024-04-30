<?php
    require 'verifica.php';
    if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])):
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

        <a href="entradas.php?pg=entradas" class= "btn-lg btn btn-outline-light lead"> Entradas </a>

        <a href="saidas.php?pg=saidas" class="btn-lg btn btn-outline-light"> Saídas </a>

        <a href="requisicoes.php?pg=requisicoes" class="btn-lg btn btn-outline-light"> Requisições </a>
        
        <a href="requisicoesAdm.php?pg=requisicoesAdm" class="btn-lg btn btn-outline-light"> Requisições-ADM </a>

        <a href="estoque.php?pg=estoque" class="btn-lg btn btn-outline-light"> Estoque </a>
        
        
    
        
   </div>

</body>
</html>

<?php else: header("Location: login.php"); endif;
?> 