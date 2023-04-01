<?php  namespace Model;



interface metodos {
  public function getId();
}


class activeRecord {
  // base de datos (la creamos para poder llamarlo una vez y que no consuma recursos)
  protected static $db;
  protected static $columdb=[];
  protected  static $errores=[];
  protected static $tabla='';
  protected static $ValidarCorreo="/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
  protected static $ValidarTel='/^[0-9]{10}$/';
  protected static $validarText='/^[a-zA-Z\s]+[a-zA-Z\s]*$/';



   // metodo para insertar datos a la base de datos
  public static function setDb($database){
    self::$db=$database;
    
  
    // self::$db->set_charset('utf8');  
  }


  public function guardar() {
    if(isset($this->id)){
      // si hay id es actualizando 
   $this->actualizar();


    }else {
      // si no hay id esta creando
     $this->crear();

    }
  }


 
  public function crear() {

    // sanitizar datos
    $sanitizados=$this->sanitizarDatos();
  

    $query="INSERT INTO ". static::$tabla . " ( ";
    $query.= join(', ' ,array_keys($sanitizados));
    $query.= " ) VALUES (' ";
    $query.= join("', '" , array_values($sanitizados));
    $query.= " ') ";

    $resultado= self::$db->query($query);

    static::redireccionar ($resultado, "crear");


  }

  public static function redireccionar($resultado, $tipo){
      
  }

  public function actualizar(){
    // sanitizar datos
    $sanitizados=$this->sanitizarDatos();

    $valores=[];

    foreach ($sanitizados as $key=> $value){
      if ($key=="vendedorId"){
        $key= "vendedores_id";
      }

      $valores[]="{$key}='{$value}'";
    };


    $query= "UPDATE " . static::$tabla. " SET ";
    $query.= join (', ', $valores);
    $query.= " WHERE id='". self::$db->escape_string($this->id). "'";
    $query.=" LIMIT 1";

 

    $resultado= self::$db->query($query);

    static::redireccionar ($resultado, "actualizar");



}

  public function eliminar(){

    $query="DELETE FROM " .static::$tabla. " WHERE id=" .self::$db->escape_string($this->id). " LIMIT 1";

    $resultado=self::$db->query($query);
    

    if ($resultado ){
      $this->eliminarImagen();
      header("LOCATION: admin?mensaje=3");
    }
  }

  // metodo que solo identifica los datos y crea un arreglo con clave valor (asociativo)
  public function datos() {
    $datos= [];

    foreach(static::$columdb as $column ):
      if ($column==='id') continue;
      $datos[$column]=$this->$column;

    endforeach;
    return $datos;
  }

  public function sanitizarDatos(){
       $datos=$this->datos();
       $sanitizados=[];

       // recorrer arreglos asociativos
       foreach ($datos as $key=> $value ){
        if ($key=="vendedorId"){
          $key= "vendedores_id";
        }
        $sanitizados[$key]=self::$db-> escape_string($value);
       }

       return $sanitizados;
  }


  public static function getErrores() :array{

    return static::$errores;

  }

  public function setImagen($imagen){
    // eliminar anterior imagen
    if (isset($this->id)){
      // comprobar si existe 
    $this->eliminarImagen();
    }

    // asignar a la propiedad imagen el nombre de la imagen
    if($imagen){
      $this->imagen=$imagen;
    }
  }
  public function eliminarImagen(){
    $existe=file_exists(CARPETA_IMG.$this->imagen);

    if($existe){
     unlink(CARPETA_IMG.$this->imagen);
    }
  }

  public function validarErrores(): array {
   
    static:: $errores=[];
    return static::$errores;

  }

  // listar propiedades
  public static function all(){
    /**escribir el query */
    $query="SELECT * FROM ". static::$tabla;
    
    $resultado= self::consultarSQL($query);
    return $resultado;

  }

  public static function get($limit){
    /**escribir el query */
    $query="SELECT * FROM ". static::$tabla.  " LIMIT ". $limit;
    
    $resultado= self::consultarSQL($query);
    return $resultado;

  }

  // listar una propiedad por su id
  public static function find($id){

    $query="SELECT  * FROM ".static::$tabla. " WHERE id=$id";

    $resultado=self::consultarSQL($query);

    return array_shift($resultado);


  }
  
  public static function consultarSQL($query){

    // consultar base de datos
    $resultado=self::$db->query($query);

    // traer todos los resultados
    $array=[];

    while($registro=$resultado->fetch_assoc()){
      $array[]=static::crearObject($registro);
    }



    // liberar memoria
    $resultado->free();

    //retornar resultados
    return $array;

  }

  protected static function crearObject($registro){
    $objeto=new static;

    

    foreach($registro as $key => $value){

      if($key=='vendedores_id'){
        $key='vendedorId';
        
      }

      if (property_exists($objeto,$key )){
        
        $objeto->$key=$value;
        
      }
    }

    return($objeto);
   
  }

  // sincronizar los cambios del objeto de la memoria 
  public function sincronizar (array $arg=[]){
   foreach ($arg as $key => $value){

    if(property_exists($this, $key) && !is_null($value)){
      $this->$key=$value;
    }
   }
  }



}

