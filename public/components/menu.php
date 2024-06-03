<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header class="navbar bg-body-tertiary">
    <div id="navBar" class="container">
        <a class="link-offset-2 link-underline link-underline-opacity-0" href="home">
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
                    <a class="nav-link text-light" href="home" class="nav-link active" aria-current="page">                        
                        Página Inicial
                    </a>
                </li>
                <li class="">                    
                    <a class="nav-link text-white" href="entradas" class="nav-link active" aria-current="page">                        
                        Entradas
                    </a>
                </li>

                <li class="">
                    
                    <a class="nav-link text-white" href="saidas" class="nav-link active " aria-current="page">
                        
                        Saídas
                    </a>
                </li>

                <li class="">
                    
                    <a class="nav-link text-white" href="requisicoes" class="nav-link active" aria-current="page">
                        
                        Requisições
                    </a>
                </li>

                <li class="">
                    
                    <a class="nav-link text-white" href="requisicoesAdm" class="nav-link active" aria-current="page">
                        
                        Requisições - Adm
                    </a>
                </li>

                <li class="">
                    
                    <a class="nav-link text-white" href="estoque" class="nav-link active" aria-current="page">                        
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
                <ul class="dropdown-menu text-small shadom " style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(0px, -34px);" data-popper-placement="top-start">
                    <li>
                        <a href="cadastroUsuario" class="dropdown-item">Cadastrar Usuário</a>
                    </li>
                    <hr class="mb-1">                    
                    <li>
                        <a href="logout" class="dropdown-item">Sair</a>
                    </li>
                </ul>                    
            </div>  
        </div>
    </div>
</header>
</body>
</html>