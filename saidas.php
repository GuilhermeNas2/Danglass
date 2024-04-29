

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Controle de estoque - Entradas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>   
    <link rel="stylesheet" href="styleEntradas.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>

</head>
<body class="bg-dark" data-bs-theme="dark">    
    <?php
        include "./components/menu.php"
    ?>    
    <main class="container mt-5 fw-light text-center">
        <h2>Saidas</h2>
    </main>
        <span id ="msgAlerta"></span>
    <form onsubmit="enviaBanco(event, 2)"  id="formularioEntrada" >
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

            <div id="baixaEntrada" class="mt-5" style=" justify-content: end;  text-align: right;">
                <button type="submit" class="btn btn-secondary" style="text-align: right;">
                    <i class="bi bi-check-circle"></i>
                    Dar baixa
                </button>

            </div>
        <div id="iconeAdicionar" class=" container mt-3" style="text-align: right;">

            <button onclick="displaySelected()" type="button" class="btn btn-outline-light">
                    <i class="bi bi-plus "></i>    
            </button>

        </div>



        </div>


        <div id="carrinhoEntrada" class="container mt-5 fw-light text-start" ></div>
    </form>

       <script src="./js/entradas.js"></script>
</body>
</html>