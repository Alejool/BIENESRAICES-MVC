<?php namespace MVC;



class Router {
  

  public  $rutasGET=[];
  public  $rutasPOST=[];

  public function get ($url, $function){
    $this->rutasGET[$url]=$function;
  }

  public function post ($url, $function){
    $this->rutasPOST[$url]=$function;
  }


  public function comprobarRutas(){
    $urlActual=$_SERVER['PATH_INFO'] ?? '/';
    $metodo=$_SERVER["REQUEST_METHOD"];

    if($metodo === "GET"){
     $function=$this->rutasGET[$urlActual] ?? null;  

    }else{
      
      $function=$this->rutasPOST[$urlActual] ?? null; 
    }

    if($function){
      // la url existe si hay una funcion asociada
      /**call_user_function: se usa para llamar funciones dinamicamente  */
      call_user_func($function, $this);
    }
    else {
      echo 'Página no encontrada';
    }
  }


  // muestra una vista
  public function render(string $view, array $datos=[]){

    foreach ($datos as $key=> $value) {
      // $$key: significa que crea una variable con el mismo nombre del key sin perder el valor
      $$key=$value;
    }

    ob_start(); // guarda en memoria
    include __DIR__ ."/views/$view.php";

    $contenido=ob_get_clean(); // limpia la memoria

    include __DIR__ ."/views/layout.php";
  }
  
}