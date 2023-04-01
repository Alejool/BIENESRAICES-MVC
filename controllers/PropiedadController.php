<?php  namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedores;
use Intervention\Image\ImageManagerStatic as Image;




class PropiedadController {

  public static function index (Router $router){

    $propiedades=Propiedad::all();   
    $mensaje=$_GET['mensaje'] ?? null;
    

    if($_SERVER["REQUEST_METHOD"]=="POST"){
    
      $id=$_POST["id"];
      $id=filter_var($id, FILTER_VALIDATE_INT);
    
      if($id){
        $propiedad=Propiedad::find($id);
        $propiedad->eliminar();
      }
    }


    $router->render('/propiedades/admin', [
    'propiedades'=>$propiedades,
    'mensaje'=>$mensaje 
  ]);

  }


  public static function crear (Router $router){
    $propiedad=new Propiedad;
    $vendedores=Vendedores::all();
   
    $errores=Propiedad::getErrores();



    if($_SERVER["REQUEST_METHOD"]==="POST"){
      $args=[];
      $args['titulo']=$_POST['titulo'] ?? null;
      $args['precio']=$_POST['precio'] ?? null;
      $args['descripcion']=$_POST['descripcion'] ?? null;
      $args['habitaciones']=$_POST['habitaciones'] ?? null;
      $args['wc']=$_POST['wc'] ?? null;
      $args['estacionamiento']=$_POST['estacionamiento'] ?? null;
      $args['vendedorId']=$_POST['vendedorId'] ?? null;
    
    
      // sincroniza el obejto con el que esta en memoria "hace la actualización"
      $propiedad->sincronizar($args);
    
       // generar nombre unico para cada imagen
       $nombreImg=md5(uniqid()).".jpg";
       if($_FILES['imagen']['tmp_name']){
        $image=Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
   
        // enviamos el nombre parra guardar en la base de datos
         $propiedad->setImagen($nombreImg);
       }
    
          // validar errores
          $errores=$propiedad->validarErrores();

          if (empty($errores)){

            if(is_dir(CARPETA_IMG))
            $image->save(CARPETA_IMG.$nombreImg);
            $propiedad->guardar();
    
           
          }
    
    }
    

    $router->render('/propiedades/crear',
    [
      "propiedad"=>$propiedad,
      'vendedores'=>$vendedores,
      'errores'=>$errores 
    ]);

  }
  public static function actualizar (Router $router){

      
    $id=validarOredireccionar('../admin');

    $propiedad=Propiedad::find($id);
    $vendedores=Vendedores::all();
    $vendedores=Vendedores::all();

    $errores=Propiedad::getErrores();


    if($_SERVER["REQUEST_METHOD"]==="POST"){
     
   
      $args=[];
      $args['titulo']=$_POST['titulo'] ?? null;
      $args['precio']=$_POST['precio'] ?? null;
      $args['descripcion']=$_POST['descripcion'] ?? null;
      $args['habitaciones']=$_POST['habitaciones'] ?? null;
      $args['wc']=$_POST['wc'] ?? null;
      $args['estacionamiento']=$_POST['estacionamiento'] ?? null;
      $args['vendedorId']=$_POST['vendedorId'] ?? null;
    
    
      // sincroniza el obejto con el que esta en memoria "hace la actualización"
      $propiedad->sincronizar($args);
    
       
    
        $nombreImg=md5(uniqid()).".jpg";
          if($_FILES['imagen']['tmp_name']){
              $image=Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
        
          // enviamos el nombre parra guardar en la base de datos
            $propiedad->setImagen($nombreImg);
        }

          // validar errores
        $errores=$propiedad->validarErrores();


          if (empty($errores)){
            // generar nombre unico para cada imagen
            if($_FILES['imagen']['tmp_name']){
              $image->save(CARPETA_IMG. $image);
            }
            

            $propiedad->guardar();
         
    
           
          }
    
    }

    $router->render('/propiedades/actualizar', [
      'propiedad'=>$propiedad,
      'vendedores'=>$vendedores,
      'errores'=> $errores
    ]);

  }


}