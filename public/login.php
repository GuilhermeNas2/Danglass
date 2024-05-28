
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    
 <form class="form "action="/login" method="POST">
    <div class="card">
        <div class="card-top">
            <img class="imglogin" src="logo_nova.png" alt="">
            <h2 class="title">Login - Danglass</h2>
        </div>

        <div class="card-group">
            <label>E-mail:</label>
            <input type="email" name="email" id="email" placeholder="Digite seu E-mail:" required>
        </div>
        
        <div class="card-group">
            <label>Senha:</label>
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha:" required>
        </div>

        <div class="card-group">
            <button type="submit">Acessar</button>
        </div>
    </div>


 </form>


</body>
</html>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        Auth::login($_POST['username'], $_POST['password']);
    }
?>