<?php
namespace App\Controllers;

require '../../../vendor/autoload.php';
use App\Core\Auth;

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){
    $u = new Auth();

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);      

    $u->login($email, $senha); 
  
}
