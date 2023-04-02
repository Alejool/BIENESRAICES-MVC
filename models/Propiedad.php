<?php namespace Model;


class Propiedad extends activeRecord implements metodos {
  
  protected static $tabla='propiedades';
  
  protected static $columdb=['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];


  public $id;
  public $titulo;
  public $precio;
  public $imagen;
  public $descripcion;
  public $habitaciones;
  public $wc;
  public $estacionamiento;
  public $creado;
  public $vendedorId;

  public function __construct( $propiedad=[])
  {
    $this->id=$propiedad['id'] ?? NULL; 
    $this->titulo=$propiedad['titulo'] ?? '';
    $this->precio=$propiedad['precio'] ?? '';
    $this->imagen=$propiedad['imagen'] ?? NULL;
    $this->descripcion=$propiedad['descripcion'] ?? '';
    $this->habitaciones=$propiedad['habitaciones'] ?? '';
    $this->wc=$propiedad['wc'] ?? '';
    $this->estacionamiento=$propiedad['estacionamiento'] ?? '';
    $this->creado=date('y/m/d');
    $this->vendedorId=$propiedad['vendedorId'] ?? '';
  }

 
  public function getId(){
    return $this->id;
  }
  

  public function validarErrores(): array {
    if(!$this->titulo){
      self::$errores[]='el titulo es obligatorio';
    }

    if(!preg_match(static::$validarText, $this->titulo) && $this->titulo){
      self::$errores[]='El titulo no admite números';
    }
  
    if(!$this->precio){
      self::$errores[]='el precio es obligatorio';
    }

    if(strlen($this->descripcion)<50){
      self::$errores[]='La descripción es obligatorio y mayor a 50 caracteres';
    }
  
    if(!$this->habitaciones){
      self::$errores[]='el número de habitaciones es obligatorio';
    }
  
    if(!$this->wc){
      self::$errores[]='los número de baños es obligatorio';
    }
  
    if(!$this->estacionamiento){
      self::$errores[]='el número de estacionamientos es obligatorio';
    }
    if(!$this->vendedorId){
      self::$errores[]='selecciona el vendedor';
    }
    if(!$this->imagen){
      self::$errores[]="Inserta una imagen.";
    }
  

    return self::$errores;
  }


  // redirecciona dependiendo de la accion, ya sea actualizar o crear
  public static function redireccionar ($resultado, $tipo){

    switch ($tipo){

      case "crear":
        $mensaje=1;
      break;

      case "actualizar":
        $mensaje=2;
      break;
      
      default:
      header ("LOCATION: ./admin");
    }
   
 

  if($resultado){
    header ("LOCATION: ./admin?mensaje=$mensaje");
  }

  
  }
  
}
