

<?php



function conectarDB() :mysqli{
  $db=new mysqli('localhost', 'id20795116_root', 'Basededatos_1','id20795116_bienesraices');

  if(!$db){
    echo 'Error, no se pudo conectar';
   exit;
  }

  return $db;
}
