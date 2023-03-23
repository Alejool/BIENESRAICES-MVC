<?php


require 'funciones.php';
require 'config/database.php';
require __DIR__.'/../vendor/autoload.php';

use Model\activeRecord;


//conectar a la base de datos

$db=conectarDB();
$db->set_charset('utf8');  //AQUÍ
activeRecord::setDb($db);

