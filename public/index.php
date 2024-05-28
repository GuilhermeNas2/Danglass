<!-- <?php
	// if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
	// 	$uri = 'https://';
	// } else {
	// 	$uri = 'http://';
	// }
	// $uri .= $_SERVER['HTTP_HOST'];
	// header('Location: '.$uri.'/Danglass/login.php');
	// exit;
?>
Something is wrong with the XAMPP installation :-( -->

<?php
require_once '../src/router.php';
require_once '../src/auth.php';

$router = new Router();

$router->addRoute('/login', function() {
    if (Auth::check()) {
        header("Location: /inicio");
        exit();
    }
    require 'login.php';
});

$router->addRoute('/home', function() {
    if (!Auth::check()) {
        header("Location: /login");
        exit();
    }
    require 'inicio.php';
});

$router->addRoute('/logout', function() {
    Auth::logout();
});

$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($requestPath);
?>