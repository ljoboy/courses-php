<?php
/**
 * FILE index.php
 *
 * @author Dark Angel <jonathanyombo@gmail.com>
 * @copyright DATE 2/8/2021 - 12:02 AM
 */

require '../vendor/autoload.php';

use App\Controllers\BlogController;
use Helper\DotEnv;
use Router\Router;

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('ASSETS', $_SERVER['SCRIPT_NAME'] . DIRECTORY_SEPARATOR);

(new DotEnv(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '.env'))->load();

$router = new Router();

$router->get('/', [BlogController::class, 'home']);
$router->get('/posts', [BlogController::class, 'index']);
$router->get('/post/:id', [BlogController::class, 'show']);

$router->run();
