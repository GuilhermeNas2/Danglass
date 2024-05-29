<?php

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){   
    
    require '../src/auth.php';

    $u = new Auth();

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);      

    $u->login($email, $senha); 
  
}
