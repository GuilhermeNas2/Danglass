<?php 
    require '../vendor/autoload.php';
    use App\Core\Auth;    

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
    <title>Requisições ADM - Danglass</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styleR.css">

</head>
<body class="bg-dark" data-bs-theme="dark">
    
    <?php
        include './components/menu.php'
    ?>
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