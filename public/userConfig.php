<?php
    require '../src/auth.php';

    if (!Auth::check()) {
        header("Location: /Danglass/public/login.php");
        exit();
    }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuração de usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/styleEstoque.css"> 

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>   
    <script src="https://kit.fontawesome.com/8b665a2e02.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>
<body class="bg-dark" data-bs-theme="dark">  
    <?php
        include './components/menu.php'
    ?>
    <main class= 'container mt-5 fw-light'>
        <h2 class='mb-5 text-center'>Edição de usuário</h2>
        <form onsubmit="sendData(event)" action="">
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
        </form>
        <div id="user" style='display:none;'>
            <section id="sobre" class="row mt-5">
                    <form onsubmit='updateUser(event)'>
                        <div class="col-12 mb-3">
                            <div class="card">
                                <div class="card-body d-flex flex-column justify-content-start">
                                <span id='userName'> </span>
                                    
                                    <div class="mb-4">
                                        <p class="mt-3 mb-1">Mudar  Usuário para:</p>
                                        <select name="tipo" id="tipo" class="form-select  mt-1 mb-3" aria-label="Large select example">
                                            <option selected>Selecione</option>                                          
                                        
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
                                
                                    <button type ="button" onclick='deleteUser(event)'  class="btn btn-outline-secondary lead text-light">
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
        <div id="mensagem" class='text-center'></div>
    </main>
    <script src="./js/userConfig.js"></script>
</body>
</html>
