<?php
    use App\Core\Auth;  

    if (!Auth::check()) {
        header("Location: /Danglass/public/login.php");
        exit();
    }     
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Controle de estoque - Danglass </title>   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
</head>

<body class="bg-dark" data-bs-theme="dark">
<?php
        include "./components/menu.php"
?>   

   <div class="container mt-5 fw-light text-center">
    <h1>Controle de Estoque</h1>
   </div>

   <div id="navbar-entradas" class="container mt-5 fw-light text-center d-grid gap-4 col-5 mx-auto" >
         <?php
            foreach($data as $key => $value){                
                ?>    <a href=<?php echo $data[$key]['nome'] ?> class="btn-lg btn btn-outline-light"> <?php echo $data[$key]['display'] ?> </a> <?php
            }
         ?>  
   </div>

</body>
</html>
