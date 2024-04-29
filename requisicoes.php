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
</head>
<body class="bg-dark" data-bs-theme="dark">
    
    <header class="navbar bg-body-tertiary">

        <div id="navBar" class="container">
            <a class="link-offset-2 link-underline link-underline-opacity-0" >
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

                <ul class="nav nav-pills flex-column mb-auto ms-4" >

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
                        
                        <a class="nav-link text-white" href="Saidas.html" class="nav-link active " aria-current="page">
                            
                            Saídas
                        </a>
                    </li>

                    <li class="">
                        
                        <a class="nav-link text-white" href="Requisicoes.html" class="nav-link active" aria-current="page">
                            
                            Requisições
                        </a>
                    </li>

                    <li class="">
                        
                        <a class="nav-link text-white" href="RequisicoesAdm.html" class="nav-link active" aria-current="page">
                            
                            Requisições - Adm
                        </a>
                    </li>

                    <li class="">
                        
                        <a class="nav-link text-white" href="Estoque.html" class="nav-link active" aria-current="page">
                            
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
                            <a href="CadastroDeUsuarios.html" class="dropdown-item">Cadastrar Usuário</a>
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
        <h2>Requisições</h2>
    </main>

    <div id="formularioRequisicoes">
        <div id="fRP1" class="container vstack mt-4 gap-4">
        
            <div id="tiposRequisicoes" class="card text-center">
    
                <div class="card-body">

                    <h4 class="card-title">
                        Tipo
                    </h4>
                    <select id ="tipoReq"class="form-select form-select-lg mb-3" aria-label="Large select example">
                         <option value=""selected>Selecione</option>
                        <option value="Cristal">Cristal</option>
                        <option value="Cristal Fume">Cristal Fume</option>
                        <option value="Reflecta">Cristal Reflecta</option>
                        <option value="Espelho">Espelho</option>
                    </select>

                </div>
                
            </div>
                           
            <div  id="espessuraRequisicoes" class="card text-center">
    
                <div class="card-body">
                    <h4 class="card-title">
                        Espessura
                    </h4>
                    <select id ="espessuraReq" class="form-select form-select-lg mb-3" aria-label="Large select example">
                        <option value=""selected>Selecione</option>
                        <option value="2mm">2mm</option>
                        <option value="3mm">3mm</option>
                        <option value="3.15mm">3.15mm</option>
                        <option value="4mm">4mm</option>
                        <option value="5mm">5mm</option>
                        <option value="6mm">6mm</option>
                        <option value="8mm">8mm</option>
                    </select>

                </div>
                
            </div>      
    
            <div id="chapaRequisicoes" class="card text-center">
    
                <div class="card-body ">
                    <h4 class="card-title">
                        Chapa
                    </h4>
                    <select id="chapaReq"class="form-select form-select-lg mb-3" aria-label="Large select example">
                        <option value=""selected>Selecione</option>
                        <option value="1900cm x 3600cm">1900cm x 3600cm</option>
                        <option value="2200cm x 3210cm">2200cm x 3210cm</option>
                        <option value="2200cm x 3600cm">2200cm x 3600cm</option>
                        <option value="2250cm x 3600cm">2250cm x 3600cm</option>
                        <option value="2400cm x 3210cm">2400cm x 3210cm</option>
                    </select>
                </div>
            </div>

        </div> 
        
        <div id="fRP2">

            <div id="quantidadeRequisicoes" class="container mt-4 ">
                <div class="input-group mx-auto">
                    <span class="input-group-text" id="inputGroup-sizing-default">Quantidade</span>
                    <input id ="quantidadeReq"type="number"class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
            </div> 
    
            <div id="iconeAdicionar" class=" container mt-3" style="text-align: right;">
        
                <button type="button" class="btn btn-outline-light">
                        <i class="bi bi-plus "></i>    
                </button>
    
            </div>
    
        </div>

    </div>

    <div id="carrinhoRequisicoes" class="container mt-5 fw-light text-start ">
        <section class="row py-5 bg-body-tertiary">
            <div class="col ms-5 me-5">
                <h3>Itens</h3>
           
                <ol>
                    <li id="conteudoCarrinhoRequisicoes">
                        <label for="">Lorem ipsum dolor sit amet effhifshififesbcsjdfnfjndfjn hedhsjsajasjkasjasjasjsjsj hahah.</label>
                        <label for="">Lorem ipsum dolor sit amet effhifshififesbcsjdfnfjndfjn.</label>
                        <label for="">Lorem ipsum dolor sit amet effhifshififesbcsjdfnfjndfjn.</label>
                        <label for="">Lorem ipsum dolor sit amet effhifshififesbcsjdfnfjndfjn.</label>
                    </li>

                    <li>
                        <a href=""></a>

                    </li>
    

                </ol>
           
                <div id="baixaRequisicoes" class="mt-5" style=" justify-content: end;  text-align: right;">
                    <button onclick="enviarInformacao()" class="btn btn-secondary" style="text-align: right;">
                        <i class="bi bi-check-circle"></i>
                        Requisitar
                    </button>

                </div>
           
            </div>
           
            
        </section>

    </div>

    

</body>
</html>