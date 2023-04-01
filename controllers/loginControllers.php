<?php namespace Controllers;

use Model\login;
use MVC\Router;

class loginControllers {



  public static function login (Router $router){

    $errores =[];
    
    if($_SERVER['REQUEST_METHOD']==="POST") {

     $login= new login($_POST['login']);
     $errores= $login->validarErrores();
 

     if (empty($errores)){
      // verificar si existe el usuario
      $respuesta=$login->existeUsuario();
  
      if(!$respuesta){
        $errores=login::getErrores();
      }
      else {
        // verificar password
        $auth= $login->comprobarPassword($respuesta);

        if($auth){
          // si esta autenticado
          $login-> autenticado();

        }else{
          $errores=login::getErrores();
        }
      }
    
      }
     
    }

    $router->render('/auth/login', [
      'errores'=> $errores
    ]);
  }



  public static function logout(Router $router){
    session_start();

    $_SESSION=[];
    header('LOCATION: /');
  }
  
}