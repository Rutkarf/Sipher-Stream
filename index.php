<? error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php
header('Content-Type: text/html; charset=utf-8');
?>


<?php
require __DIR__ . '/vendor/autoload.php';

use App\Router;
use App\Controllers\HomeController;
use App\Controllers\FilmsController;
use App\Controllers\SeriesController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;


$router = new Router();

// Define routes
$router->add('/', HomeController::class, 'index');
$router->add('/films', FilmsController::class, 'index');
$router->add('/series', SeriesController::class, 'index');
$router->add('/login', LoginController::class, 'index');
$router->add('/register', RegisterController::class, 'index');


// Get current URL path
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Dispatch route
try {
    $router->dispatch($url);
} catch (Exception $e) {
    echo "404 Not Found";
}