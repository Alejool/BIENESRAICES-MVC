<?php


use MVC\Router;
use Controllers\loginControllers;
use Controllers\paginasControllers;
use Controllers\PropiedadController;
use Controllers\VendedoresController;

require_once __DIR__.'/../includes/app.php';



$router= new Router();
// PropiedadController::class: en que clase se encuentra el metodo 
$router->get('/propiedades/admin', [PropiedadController::class,'index']);
$router->post('/propiedades/admin', [PropiedadController::class, 'index']);
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

$router->get('/', [paginasControllers::class,'init']);
$router->get('/nosotros',  [paginasControllers::class, 'nosotros']);
$router->get('/anuncios',  [paginasControllers::class, 'anuncios']);
$router->get('/propiedad', [paginasControllers::class, 'anuncio']);
$router->get('/blog', [paginasControllers::class, 'blog']);
$router->get('/anuncio', [paginasControllers::class, 'anuncio']);
$router->get('/contacto', [paginasControllers::class, 'contacto']);
$router->post('/contacto', [paginasControllers::class, 'contacto']);
$router->get('/login', [paginasControllers::class, 'login']);

$router->get('/login', [loginControllers::class, 'login']);
$router->post('/login', [loginControllers::class, 'login']);
$router->get('/logout', [loginControllers::class, 'logout']);

$router->comprobarRutas();

