<?php  namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;




class paginasControllers {

  public static function init (Router $router){

     $propiedades=Propiedad::get(6);
     $inicio=true;

      $router->render("paginas/index",[
        'propiedades'=> $propiedades,
        'inicio'=> $inicio

      ]);
  }


  public static function nosotros (Router $router){
    $router->render("paginas/nosotros");
  }

  public static function blog (Router $router){
    $router->render("paginas/blog");
  }

  public static function anuncios(Router $router){

    $propiedades= Propiedad::all();

    $router->render("paginas/anuncios", [
        "propiedades"=> $propiedades
    ]);
  }

  public static function blogs (Router $router){
    $router->render("paginas/blog");
  }

  public static function contacto (Router $router){
  
    $mensaje=false;
    $envio=false;
   if($_SERVER['REQUEST_METHOD']==="POST") {
     
      $respuesta=$_POST['contacto'];

      //instanciar PHPMailer
      $mail = new PHPMailer();

      // configurar SMTP
      $mail->isSMTP();
      $mail->Host = 'sandbox.smtp.mailtrap.io';
      $mail->SMTPAuth = true;
      $mail->Port = 2525;
      $mail->Username = '04d0f7150fb73a';
      $mail->Password = 'ab702161701311';
      $mail->SMTPSecure='tls';

      // contenido del mail
      /**quien lo envia? */
      $mail->setFrom('admin@bienesraices.com');

      /** a que gmail va a llegar? */
      $mail->addAddress('admin@bienesraices.com', 'BIENESRAICES');

      /**mensaje  */
      $mail->Subject= 'Tienes un nuevo mensaje';


      /** habilitar HTML */
      $mail->isHTML(true);
      /** habilitar acentos del español */
      $mail->CharSet='UTF-8';

    

      // contenido
      $contenido= '<html>';
      $contenido .='<h3>Tienes un nuevo mensaje </h3>';
      $contenido .= '<p>Nombre: <span style="font-weight:bold;"> ' . $respuesta['nombre']. ' </span></p>';

      if($respuesta['contacto']==='telefono'){
        $contenido.='<p> Deseo ser contactado via telefono: </p>';
        $contenido .= '<p>Teléfono: <span style="font-weight:bold;"> ' . $respuesta['telefono']. ' </span></p>';
        $contenido .= '<p>Fecha de contacto: <span style="font-weight:bold;">  ' . $respuesta['fecha']. ' </span></p>';
        $contenido .= '<p>Hora de contacto: <span style="font-weight:bold;"> ' . $respuesta['hora']. ' </span></p>';
      }
      else {
        $contenido.='<p> Deseo ser contactado via correo: </p>';
        $contenido .= '<p>Email: <span style="font-weight:bold;"> ' . $respuesta['email']. ' </span></p>';
      }


      $contenido .= '<p>Mensaje:  ' . $respuesta['mensaje']. '</p>';

      $contenido .= '<p>Vende o Compra: <span style="font-weight:bold;"> ' . $respuesta['tipo']. ' </span></p>';

      if($respuesta['tipo']==='venta'){
        $contenido .= '<p>Precio : <span style="font-weight:bold;">  $' . $respuesta['precio']. ' </span></p>';
      }else {
        $contenido .= '<p>Presupuesto : <span style="font-weight:bold;">  $' . $respuesta['precio']. ' </span></p>';
      }
     
      $contenido .='</html>';

      // agregarlo al mensaje  el contenido
      $mail->Body= $contenido;
      $mail->AltBody= 'Recibiste un mensaje, pero no es soportado';

      // enviar mensaje 
      if($mail->send()){
        header('LOCATION: /contacto');
        $envio=true;
      }
      else {
        $mensaje= 'no se pudo enviar el formulario...';
      }
    }

    $router->render("paginas/contacto", [
      'mensaje'=> $mensaje, 
      'envio'=> $envio

     
    ]);
}

  public static function anuncio (Router $router){

    $id= $_GET["id"] ?? null;
    $id=filter_var($id, FILTER_VALIDATE_INT);

    if($id){
        $propiedad=Propiedad::find($id);
 
    }

    $router->render("paginas/anuncio", [
        "propiedad"=> $propiedad
    ]);
  }

  public static function login (Router $router){

    $router->render('paginas/login');
  }

}
