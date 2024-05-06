<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Usuário - Danglass</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
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
                    
                    <ul class="dropdown-menu text-small " style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(0px, -34px);" data-popper-placement="top-start">
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
        <h2>Edição de Usuários</h2>
    </main>


    <form class="mt-4" action="">
        <div class="container">
            
    
            <div class="form-floating mt-1">
                <input type="email" class="form-control" id="email" name="email" placeholder="email" maxlength="100"/>
                <label for="email">Digite o E-mail:</label>
            </div>

            <div id="baixaEntrada" class="mt-3 mb-5" style=" justify-content: end;  text-align: right;">
                <button type ="submit" class="btn btn-secondary">
                    <i class="bi bi-search"></i>
                    Buscar
                </button>
    
            </div>

           
            <section id="sobre" class="row mt-5">
                <form action="">
                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                
                                <strong> Daniela da Silva - Administrador(a)</strong>
                                
                                <div class="mb-4">
                                    <p class="mt-3 mb-1">Mudar  Usuário para:</p>
                                    <select name="tipo" id="tipo" class="form-select  mt-1 mb-3" aria-label="Large select example">
                                        <option selected>Selecione</option>
                                        <option value="Normal">Normal</option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Administrador Master">Administrador Master</option>
                                    
                                    </select>
                                    <div class="d-flex justify-content-end aling-items-end">
                                        <button type ="submit" class="btn btn-secondary">
                                            <i class="bi bi-check2-circle"></i>
                                            Concluir
                                        </button>
                                    </div>
                                </div>
                                
                                <hr class="mt-3">
                                
                                <div class="mt-2">
                            
                                <button type ="button" onclick='deleteUser(event)' class="btn btn-outline-secondary lead text-light">
                                    <i class="bi bi-x"></i>
                                    Deletar Usuário
                                </button>

                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </form>

			</section>

        </div>

        

    </form>
   

</body>
</html>