<?php
require '../vendor/autoload.php';

use App\Core\Router;
use App\Core\Auth;
use App\Controllers\EstoqueController;
use App\Controllers\ReqController;
use App\Controllers\UserController;
use App\Controllers\ProductController;
use App\Controllers\ScreenController;

$router = new Router();
$baseURL = '/Danglass/public';


// Rotas para as telas do frontEnd

$router->addRoute($baseURL . '/login', function() use ($baseURL){
    if (Auth::check()) {
        header("Location:  $baseURL/home");
        exit();
    }
    require 'login.php';
});

$router->addRoute($baseURL . '/home', function() use ($baseURL) {
    if (!Auth::check()) {
        header("Location: $baseURL/login");
        exit();
    }
    $data = new ScreenController();
    $data = $data->getScreens();
    require 'inicio.php';
});

$router->addRoute($baseURL . '/cadastroUsuario', function() use ($baseURL) {
    if (!Auth::check()) {
        header("Location: $baseURL/login");
        exit();
    }  
    $arrayType = new UserController();
    $arrayType = $arrayType->getTypeUser();
    require 'cadastroUsuario.php';
});


$router->addRoute($baseURL .'/saidas', function() use ($baseURL) {
    if (!Auth::check()) {
        header("Location: $baseURL/login");
        exit();
    }
    $req = new ProductController();
    $req->getAllAtt('saidas.php');
});

$router->addRoute($baseURL .'/entradas', function() use ($baseURL) {
    if (!Auth::check()) {
        header("Location: $baseURL/login");
        exit();
    } 
    $req = new ProductController();
    $req->getAllAtt('entradas.php');
});

$router->addRoute($baseURL . '/estoque', function() use ($baseURL) {
    if (!Auth::check()) {
        header("Location: $baseURL/login");
        exit();
    }
    $req = new ProductController();
    $req->getAllAtt('estoque.php');
});

$router->addRoute($baseURL . '/userConfig', function() use ($baseURL) {
    if (!Auth::check()) {
        header("Location: $baseURL/login");
        exit();
    }
    require 'userConfig.php';
});

$router->addRoute($baseURL . '/requisicoes', function() use ($baseURL) {
    if (!Auth::check()) {
        header("Location: $baseURL/login");
        exit();
    }
    $req = new ProductController();
    $req->getAllAtt('requisicoes.php');
});

$router->addRoute($baseURL . '/requisicoesAdm', function() use ($baseURL) {
    if (!Auth::check()) {
        header("Location: $baseURL/login");
        exit();
    }
    $req = new ReqController();
    $data = $req->getReq();
    require 'requisicoesAdm.php';
});

// Rotas de requisições AJAX para o backEnd

$router->addRoute($baseURL . '/recebeEstoque', function() use ($baseURL) {    
     EstoqueController::getEstoque();
});

$router->addRoute($baseURL . '/enviaUsuario', function() use ($baseURL) {    
    UserController::createUser();
});

$router->addRoute($baseURL . '/updateEstoque', function() use ($baseURL) {    
    EstoqueController::updateEstoque();
});


$router->addRoute($baseURL . '/updateReq', function() use ($baseURL) {        
    ReqController::updateReq();
});

$router->addRoute($baseURL . '/deleteReq', function() use ($baseURL) {    
    ReqController::deleteReq();
});


$router->addRoute($baseURL . '/getUser', function() use ($baseURL) {    
    UserController::getUser();
});

$router->addRoute($baseURL . '/updateUser', function() use ($baseURL) {    
    UserController::updateUser();
});

$router->addRoute($baseURL . '/deleteUser', function() use ($baseURL) {    
    UserController::deleteUser();
});

$router->addRoute($baseURL .'/logout', function() use ($baseURL) {
    Auth::logout();
});

$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($requestPath);
?>