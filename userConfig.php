<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuração de usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styleEstoque.css"> 

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>   
    <script src="https://kit.fontawesome.com/8b665a2e02.js" crossorigin="anonymous"></script>
    
</head>
<body class="bg-dark" data-bs-theme="dark">  
    <?php
        include './components/menu.php'
    ?>
    <main class= 'container mt-5 fw-light text-center'>
        <h2 class='mb-5'>Editar usuários</h2>
        <form onsubmit="sendData(event)" action="">
            <label class='container' for="">
                Email
                <input id="uEmail" type="text">
            </label>

            <button type="submit" class="btn-md btn btn-outline-light mt-5">Procurar</button>
        </form>
        <div id="user"></div>
        <div id="mensagem"></div>
    </main>
    <script src="./js/userConfig.js"></script>
</body>
</html>
