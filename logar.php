<?php

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){
   
    require 'conexao.php';
    require 'Usuario.class.php';

    $u = new Usuario();

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);   
    

    if($u->login($email, $senha) == true){      
        if(isset($_SESSION['idUser'])){
            
            if($_SESSION['tipoUser'] === 0){                
                header("Location: requisicoes.php");
            }

           if($_SESSION['tipoUser'] !== 0){            
                header("Location: inicio.php"); 

            }
        }    
    }

}
