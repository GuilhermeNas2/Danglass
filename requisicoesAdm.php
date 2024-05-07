<?php 
$conn = new Conexao(); 
$conexao = $conn->getConn(); 
$sql = "SELECT * FROM requisicoes";
$result = mysqli_query($conexao, $sql);

$data = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $data[] = $row;
    };
};


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requisições ADM - Danglass</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styleR.css">

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

                <ul class="nav nav-pills flex-column mb-auto ms-4" >

                    <li class="">
                        
                        <a class="nav-link text-light" href="inicio.php" class="nav-link active" aria-current="page">
                            
                            Página Inicial
                        </a>
                    </li>

                    <li class="">
                        
                        <a class="nav-link text-white" href="entradas.php" class="nav-link active" aria-current="page">
                            
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
                    
                    <ul class="dropdown-menu text-small " style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(0px, -34px);" data-popper-placement="top-start">
                        <li>
                            <a href="cadastroUsuario.php" class="dropdown-item">Cadastrar Usuário</a>
                        </li>

                        <hr class="mb-1">
                        
                        <li>
                            <button class="btn"> Sair da Conta</button>
                        </li>
                    </ul>
                        
                </div>
                    
            
            </div>

        </div>

    </header>
    <div class="container mt-5 mb-5 fw-light text-center">
        <h2>Requisições - ADM</h2>
        

    </div>
        

    <main class="w-100 m-auto form-container">
        <form>
           
            <div class="container vstack mt-5 gap-2 text-center d-flex justify-content-center">
                    <?php
                        foreach ($data as $row) {
                            ?>
                            <div class="form-check text-start my-3 d-flex justify-content-center mt-0">
                            <div class="d-flex justify-content-start me-5 "><p><?php echo $row['data'];?></p></div>                           
                            <label class="fw-medium" form-check-label
                            for="flexCheckDefault"><?php echo $row['tipo']."     "; echo $row['chapa']."     "; echo $row['espessura']."     ("; echo $row['quantidade'].")"; ?></label>                           
                            <input data-id="<?php echo $row['id'];?>" type="checkbox" class="  form-check-input ms-5 me-3" id="check">
                        </div>
        
                        <hr> 
                            <?php
                        }
                    ?>
            </div>
        </form>


        <style>
        

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f5f5f5; 
            padding: 10px; 
        }
    </style>
    </main>
    
     <footer class="d-flex justify-content-center bg-body-tertiary">
        
        <div class="container mt-2 mb-2  d-flex justify-content-end">
            <button id="btnFinalizar" type="button" class="btn btn-secondary ">Finalizar</button>
        </div>
        
     </footer>

     <script src="./js/requisicoes.js"></script>
</body>
</html>