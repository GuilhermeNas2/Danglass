<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cadastro de Usuários - Danglass</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-dark" data-bs-theme="dark">
    <header class="navbar navbar-expand-lg bg-body-tertiary">
        <div id="navBar" class="container">
            <h1 class="navbar-brand">Danglass</h1>
            
            <style>
                button{
                    cursor:pointer;
                    
                }
            </style>                
        </div>
    </header>

    <main class="w-100 m-auto form-container mt-5 d-flex justify-content-center" >
        <form class = "w-25" id = "formCadastro" method="POST" action = "enviaUsuario.php">
           <h1 class="h3 mb-3 fw-normal text-center mt-2 mb-3">Cadastro de Usuário</h1> 
            <div class="form-floating">
                <input type="text" class="form-control" id="nome" name= "nome" placeholder="nome" maxlength="100"/>
                <label for="nome">Nome:</label>
            </div>
            <div class="form-floating mt-3">
                <input type="password" class="form-control" id="senha" name="senha" placeholder="senha"/>
                <label for="senha">Senha:</label>
            </div>    
                <div class="form-floating mt-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="email"/>
                    <label for="email">E-mail:</label>
                </div>
                <div class="form-floating mt-3">
                    <select class="form-select" id="tipoUsuario" name="tipoUsuario" aria-label="Floating label select example">
                      <option selected>Tipo do Usuário:</option>
                      <option value="0">Normal</option> 
                      <option value="1">Administrador</option>
                      <option value="2">Administrador Master</option>                  
                    </select>
                </div>      
            <button class="btn btn-primary w-100 py-2 mt-3" type ="submit">Cadastrar</button>
        </form>
    </main>

</body>
</html>