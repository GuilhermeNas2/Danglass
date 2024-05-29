
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Controle de estoque - Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styleEstoque.css">  
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>   

</head>  


<body class="bg-dark" data-bs-theme="dark">            
       <?php
        include "./components/menu.php"
       ?>    
            <main class="container mt-5 fw-light text-center">
                <h2>Estoque</h2>
            </main>

            <form id="formularioEstoque" onsubmit="sendData(event)">
            <?php
                include "./components/selects.php"
            ?> 
              <div id="baixaEstoque" class="mt-3 mb-5 container" style=" justify-content: end;  text-align: right;">
                    <button type ="submit" class="btn btn-secondary" style="text-align: right;">
                        <i class="bi bi-search"></i>
                        Consultar
                    </button>

                </div>
                                
            </form>
            <div id="consultaEstoque" class="mb-4">
                <div class="text-center">
                    <h2 id="tituloEstoque"></h2>
                </div>
                <div id="body">

                </div>
            </div>
            <!-- <table id="consultaEstoque" class="mb-4">
                <thead>
                            
                        <tr class="text-center">
                        <th colspan="2"></th>
                        </tr>
            
                </thead>
                <tbody>  
                </tbody>
            </table>
             -->
                
        <script src="./js/estoque.js">
         
         </script>  
            
</body> 
    
</html>

