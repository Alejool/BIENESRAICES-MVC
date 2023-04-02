

<?php

define('TEMPLATES_URL', __DIR__ .'/templates');
define('FUNCIONES_URL', __DIR__.'funciones.php');
define('CARPETA_IMG', $_SERVER['DOCUMENT_ROOT']. '/imagenes/');



function incluirTemplate ( string $nombre, bool $inicio=false){
  include TEMPLATES_URL ."/{$nombre}.php";
}



function revisarSesion():bool{
  session_start();

  $aut=$_SESSION['login'];

  if($aut){
    return true;
  }

  return false;
}


function debugear($variable):void
{
  echo '<pre>';
  var_dump($variable);
  echo '</pre>';
  
  exit;
}

function mostrarErrores() {
  /**ver errores */
ini_set('display_errors', 1);
error_reporting(E_ALL);
}


// escapa y sanitiza html insertado
function s($html):string{
  $s=htmlspecialchars($html);
  return $s;
}

function validarOredireccionar( string $url){
  //leemos os datos de get
  $id=$_GET['id'];
  // var_dump($id);
  $id=filter_var($id, FILTER_VALIDATE_INT);

  if(!$id){
    header("location: $url");
  }

  return $id;
}
