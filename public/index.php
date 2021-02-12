<?php
/**
 * FILE index.php
 *
 * @author Dark Angel <jonathanyombo@gmail.com>
 * @copyright DATE 2/8/2021 - 12:02 AM
 */

require '../vendor/autoload.php';

use App\Controllers\BlogController;
use Router\Router;


$router = new Router();

$router->get('/', [BlogController::class, 'index']);
$router->get('/posts/:id', [BlogController::class, 'show']);

$router->run();
