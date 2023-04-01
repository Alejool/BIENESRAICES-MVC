<?php  namespace Controllers;

use MVC\Router;
use Model\Vendedores;





class vendedoresController {

  public static function index (Router $router){

    $vendedores=Vendedores::all();   
    $mensaje=$_GET['mensaje'] ?? null;
    

    if($_SERVER["REQUEST_METHOD"]=="POST"){
    
      $id=$_POST["id"];
      $id=filter_var($id, FILTER_VALIDATE_INT);
    
      if($id){
        $Vendedores=Vendedores::find($id);
        $Vendedores->eliminar();
      }
    }


    $router->render('/vendedores/admin', [
    'vendedores'=>$vendedores,
    'mensaje'=>$mensaje 
  ]);

  }


  public static function crear (Router $router){
    $vendedor=new Vendedores;
   
    $errores=Vendedores::getErrores();

    if($_SERVER["REQUEST_METHOD"]==="POST"){

      $vendedor=new Vendedores($_POST);
      $errores= $vendedor->validarErrores();

      if (empty($errores)){
    
        $vendedor->guardar();
    
      }
    
    }
    
    
    $router->render('/vendedores/crear',
    [
      'vendedor'=>$vendedor,
      'errores'=>$errores 
    ]);
  }


  public static function actualizar (Router $router){
  
    $id=validarOredireccionar('../propiedades/admin');

    $vendedor= Vendedores::find($id);

    $errores=Vendedores::getErrores();





    if($_SERVER["REQUEST_METHOD"]==="POST"){

      $args=$_POST;

      //sincronizar objeto en memoria
      $vendedor->sincronizar($args);

      $errores=$vendedor->validarErrores();


      if (empty($errores)){

        $vendedor->guardar();
        
      }
    }

    $router->render('/vendedores/actualizar', [
      'vendedor'=>$vendedor,
      'errores'=> $errores
    ]);

  }


}