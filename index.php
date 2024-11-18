<?php
ob_start();


error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: text/html; charset=utf-8');


require __DIR__ . '/vendor/autoload.php';

use App\Router;
use App\Controllers\HomeController;
use App\Controllers\FilmsController;
use App\Controllers\SeriesController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use App\Controllers\DashboardController;
use App\Controllers\UserController;

$router = new Router();

// Define routes
$router->add('/', HomeController::class, 'index');
$router->add('/films', FilmsController::class, 'index');
$router->add('/series', SeriesController::class, 'index');
$router->add('/login', LoginController::class, 'index');
$router->add('/dashboard', DashboardController::class, 'index');

$router->add('/favorites', UserController::class, 'getFavorites');
$router->add('/favorites/remove', UserController::class, 'removeFavorite');
$router->add('/logout', LoginController::class, 'logout');




// Get current URL path
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Dispatch route
try {
    $router->dispatch($url);
} catch (Exception $e) {
    echo "404 Not Found";
}


ob_end_flush();