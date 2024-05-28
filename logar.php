<?php

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){   
    
    require 'auth.php';

    $u = new Auth();

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);      

    $u->login($email, $senha) 
    if(isset($_POST['logged_in']) !== true) 
        header("Location: /login")
    header("Location: /inicio")
}
