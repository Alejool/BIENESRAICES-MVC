<?php namespace Model;

use Model\activeRecord;

 


class login extends activeRecord {


  protected static $columdb=['id','email', 'password'];
  protected static $tabla='usuarios';

  public $id;
  public $email;
  public $password;


  public function __construct( $login=[]){
    $this->id=$login['id'] ?? NULL; 
    $this->email=$login['email'] ?? NULL; 
    $this->password=$login['password'] ?? NULL; 
  }


  public function validarErrores(): array {

    if(!$this->email){
      self::$errores[]='El correo es obligatorio';
    }

    if (!preg_match(self::$ValidarCorreo, $this->email) && $this->email){
      self::$errores[]="El formato del correo es incorrecto";
    }

    if(!$this->password){
      self::$errores[]='la contraseña no puede estar vacía';
    }

    return self::$errores;
  }
  
  public  function existeUsuario(){
 
    $query="SELECT  * FROM ". self::$tabla. " WHERE email= '". $this->email . "'  LIMIT 1;";

    $resultado=self::consultarSQL($query);

    if(!$resultado){
      self::$errores[]= "el usuario no existe";
      return;
    }

    return $resultado[0];
    
  }


  public function comprobarPassword($usuario) {
   

   $auth= password_verify($this->password, $usuario->password);

   if (!$auth){
      self::$errores[]='contraseña incorrecta';
     
   }

   return $auth;

  }


  public function autenticado() {
    session_start();

    // llenar el arreglo de sesion
    $_SESSION['usuario']= $this->email;
    $_SESSION['login']= true;

    header ('location: /propiedades/admin ');
  }

}

