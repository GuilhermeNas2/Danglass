

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

</head>
<body class="bg-dark" data-bs-theme="dark">
    <header class="navbar bg-body-tertiary">

        <div id="navBar" class="container">
            <a class="link-offset-2 link-underline link-underline-opacity-0" href="inicio.php">
                <h1 class="navbar-brand">Danglass</h1>
            
            </a>

            <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                <i class="bi bi-list"></i>
            </button>

            <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header">

                  
                    <h4 class="offcanvas-title text-light" id="offcanvasWithBothOptionsLabel">Menu</h4>
                    
                </div>
                <hr class="me-3 ms-3 mt-0">

                <ul class="nav nav-pills flex-column mb-auto ms-3" >

                    <li class="">
                        
                        <a class="nav-link text-light" href="PaginaInicial.html" class="nav-link active" aria-current="page">
                            
                            Página Inicial
                        </a>
                    </li>

                    <li class="">
                        
                        <a class="nav-link text-white" href="Entradas.html" class="nav-link active" aria-current="page">
                            
                            Entradas
                        </a>
                    </li>

                    <li class="">
                        
                        <a class="nav-link text-white" href="saidas.php" class="nav-link active " aria-current="page">
                            
                            Saídas
                        </a>
                    </li>

                    <li class="">
                        
                        <a class="nav-link text-white" href="requisicoes.php" class="nav-link active" aria-current="page">
                            
                            Requisições
                        </a>
                    </li>

                    <li class="">
                        
                        <a class="nav-link text-white" href="requisicoesAdm.php" class="nav-link active" aria-current="page">
                            
                            Requisições - Adm
                        </a>
                    </li>

                    <li class="">
                        
                        <a class="nav-link text-white" href="estoque.php" class="nav-link active" aria-current="page">
                            
                            Estoque
                        </a>
                    </li>

                </ul>

                <hr class="me-3 ms-3">

                <div class="dropdown ms-5 hstack mb-3">
                    <a href="" class="d-flex aling-items-center link-body-emphasis text-decoration-none dropdown-toggle show" data-bs-toggle="dropdown" aria-expanded="true">
                    <i class="bi bi-person-circle me-2"></i>
                    <strong>Perfil</strong>
                    </a>
                    
                    <ul class="dropdown-menu text-small shadom show " style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(0px, -34px);" data-popper-placement="top-start">
                        <li>
                            <a href="cadastroUsuario.php" class="dropdown-item">Cadastrar Usuário</a>
                        </li>

                        <hr class="mb-1">
                        
                        <li>
                            <a href="logout.php" class="dropdown-item">Sair</a>
                        </li>
                    </ul>
                        
                </div>
                    
            
            </div>

        </div>

    </header>

    <main class="container mt-5 fw-light text-center">
        <h2>Saidas</h2>
    </main>
        <span id ="msgAlerta"></span>
    <form onsubmit="enviaBanco(event)"  id="formularioEntrada" >
        <?php
        include "some.php"
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
    
       <script src= "entradas.js"></script>
</body>
</html>