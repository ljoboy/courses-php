<?php
/**
 * FILE index.php
 *
 * @author Dark Angel <jonathanyombo@gmail.com>
 * @copyright DATE 2/8/2021 - 12:02 AM
 */

require '../vendor/autoload.php';

use Router\Router;


$router = new Router();

$router->get('/', 'BlogController@index');
$router->get('/posts/:id', 'BlogController@show');

$router->run();
