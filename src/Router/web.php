<?php

use App\Core\Route\Router;
use App\Http\Controller\HomeController;

$route = new Router();

/**
 * Exemple Routes group
 */
$route->group('/admin', function(){
  return [
     ['GET', '/', [HomeController::class, 'admin']],
  ];
});

$route->get( '/', [HomeController::class, 'index']);
$route->get( '/user/{id}', [HomeController::class, 'show']);



$route->run();