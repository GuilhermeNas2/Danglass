<?php
require 'conexao.php';

if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){
    require_once 'Usuario.class.php';
    $u = new Usuario();
    $usulogado = $u->logged($_SESSION['idUser']);
    $nomeuser=  $usulogado['nome'];
}else{
    header("Location: login.php");
}