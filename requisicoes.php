<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Estoque - Requisições </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styleEntradas.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 

</head>
<body class="bg-dark" data-bs-theme="dark">   
   <?php
        include './components/menu.php'
   ?>

<main class="container mt-5 fw-light text-center">
     <h2>Requisições</h2>
</main>
    <form id="formRequisicoes" onsubmit="salvarNoBancoDeDados(event)">
    <?php
        include "./components/selects.php"
    ?>             
            <div id="fRP2">

                <div id="quantidades" class="container mt-4 ">
                    <div class="input-group mx-auto">
                        <span class="input-group-text" id="inputGroup-sizing-default">Quantidade</span>
                        <input name="quantidade" id ="quantidadeReq" type="number"class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                </div> 
        
                <div id="iconeAdicionar" class=" container mt-3" style="text-align: right;">
            
                    <button onclick="adicionarNaDiv()" type="button" class="btn btn-outline-light">
                            <i class="bi bi-plus "></i>    
                    </button>
        
                </div>
        
            </div>

        </div>

        <?php
            include "./components/itensCar.php"
        ?>
    </form>
        <script src="requisicao.js"></script>

</body>
</html>