<?php
require_once '../src/router.php';
require_once '../src/auth.php';

$router = new Router();
$baseURL = '/Danglass/public';

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
    require 'inicio.php';
});

$router->addRoute($baseURL .'/saidas', function() use ($baseURL) {
    if (!Auth::check()) {
        header("Location: $baseURL/login");
        exit();
    }
    require 'saidas.php';
});

$router->addRoute($baseURL .'/entradas', function() use ($baseURL) {
    if (!Auth::check()) {
        header("Location: $baseURL/login");
        exit();
    }
    require 'entradas.php';
});

$router->addRoute($baseURL . '/estoque', function() use ($baseURL) {
    if (!Auth::check()) {
        header("Location: $baseURL/login");
        exit();
    }
    require 'estoque.php';
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
    require 'requisicoes.php';
});

$router->addRoute($baseURL . '/requisicoesAdm', function() use ($baseURL) {
    if (!Auth::check()) {
        header("Location: $baseURL/login");
        exit();
    }
    require 'requisicoesAdm.php';
});

$router->addRoute('/logout', function() {
    Auth::logout();
});

$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($requestPath);
?>