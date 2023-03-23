<?php

use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedoresController;

require_once __DIR__.'/../includes/app.php';
mostrarErrores();


$router= new Router();
// PropiedadController::class: en que clase se encuentra el metodo 
$router->get('/admin', [PropiedadController::class,'index']);
$router->post('/admin', [PropiedadController::class, 'index']);
$router->get('/propiedades/crear',  [PropiedadController::class, 'crear']);
$router->post('/propiedades/crear',  [PropiedadController::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);


$router->get('/vendedores/admin', [VendedoresController::class,'index']);
$router->post('/vendedores/admin', [VendedoresController::class, 'index']);
$router->get('/vendedores/crear',  [VendedoresController::class, 'crear']);
$router->post('/vendedores/crear',  [VendedoresController::class, 'crear']);
$router->get('/vendedores/actualizar', [VendedoresController::class, 'actualizar']);
$router->post('/vendedores/actualizar', [VendedoresController::class, 'actualizar']);


$router->comprobarRutas();

