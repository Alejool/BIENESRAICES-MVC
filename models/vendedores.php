<?php namespace Model;

use InvalidArgumentException;

class Vendedores  extends activeRecord implements metodos{

  protected static $columdb=['id', 'nombre', 'apellido', 'telefono', 'correo'];
  
  protected static $tabla='vendedores';

  public $id;
  public $nombre;
  public $apellido;
  public $telefono;
  public $correo;

  public function __construct( $vendedor=[])
  {

    $this->id=$vendedor['id'] ?? NULL; 
    $this->nombre=$vendedor['nombre'] ?? '';
    $this->apellido=$vendedor['apellido'] ?? '';
    $this->telefono=$vendedor['telefono'] ?? '';
    $this->correo=$vendedor['correo'] ?? '';

  }

  public function getId(){
    return $this->id;
  }

  
  public function validarErrores(): array {
    if(!$this->nombre ){
      self::$errores[]='el nombre es obligatorio';
    }

    if(!preg_match(static::$validarText, $this->nombre) && $this->nombre){
      self::$errores[]='el nombre solo puede tener letras';
    }

    if(!$this->apellido){
      self::$errores[]='el apellido es obligatorio';
    }


    if(!preg_match(static::$validarText, $this->apellido) && $this->apellido){
      self::$errores[]='el apellido solo puede tener letras';
    }
  

    if(!$this->telefono){
      self::$errores[]='el  telefono es obligatorio';
    }
  
    if(!$this->correo){
      self::$errores[]='El correo es obligatorio';
    }

    if (!preg_match(static::$ValidarCorreo, $this->correo) && $this->correo){
      self::$errores[]="El formato del correo es incorrecto";
    }

    if (!preg_match( static::$ValidarTel, $this->telefono) && $this->telefono){
      self::$errores[]="Recuerde: un telefono de 10 digitos";
    }



  

    return self::$errores;
  }

  public static function redireccionar ($resultado, $tipo){
    
    switch ($tipo){

      case "crear":
        $mensaje=1;
      break;

      case "actualizar":
        $mensaje=2;
      break;
      default:
      header ("LOCATION: ./admin)");
    }
   
 

    if($resultado){
      header ("LOCATION: ./admin?mensaje=$mensaje");
    }

  }
}




