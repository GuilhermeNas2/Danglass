<?php
    require '../vendor/autoload.php';
    use App\Core\Auth;    

    if (!Auth::check()) {
        header("Location: /Danglass/public/login.php");
        exit();
    };  
?>    
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Controle de estoque - Entradas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/styleEntradas.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/8b665a2e02.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>   
</head>
<body class="bg-dark" data-bs-theme="dark">
  <?php 
    include "./components/menu.php"
  ?>

    <main class="container mt-5 fw-light text-center">
        <h2>Entradas</h2>
    </main>
        <span id ="msgAlerta"></span>
    <form onsubmit="enviaBanco(event, 1)" id="formularioEntrada" >
    <?php
        include "./components/selects.php"
       ?>      
          <div id="fEP2">
            <div id="quantidadeEntrada" class="container mt-4 ">
                <div class="input-group mx-auto">
                    <span class="input-group-text" id="quantidadeqtd">Quantidade</span>
                    <input name="quantidade" id="quantidade" type="number"class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
            </div> 

            
            <div id="iconeAdicionar" class=" container mt-3" style="text-align: right;">

                <button onclick="displaySelected()" type="button" class="btn btn-outline-light">
                        <i class="bi bi-plus "></i>    
                </button>

            </div>

        </div>
        <?php
            include "./components/itensCar.php"
        ?>
    </form>    
       <script src="./js/entradas.js"></script>   
</body>
</html>