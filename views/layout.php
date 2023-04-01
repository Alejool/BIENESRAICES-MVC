
<?php 

  if(!isset($_SESSION)){
    session_start();
  }

  $aut=$_SESSION["login"] ?? false;

  if(!isset($inicio)){
    $inicio=false;
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/build/css/app.css">
  <link rel="icon" href="https://www.inversionsimple.com/wp-content/uploads/2021/09/Portada-bienes-raices.jpg">
 
  <title>Bienes Raices</title>
</head>
<body>

  <header class="header <?php echo $inicio ? 'inicio': ""; ?>">
    <div class="contenedor">

      <div class="header__barra ">
        <div class="header__logo">
        <a href="/" class="">
          <img class="img-fluid" src="/build/img/logo.svg" alt="imagen logo">
        </a>  
    </div>

        <div class="header__hamburguesa">
          <img src="/build/img/barras.svg" alt="imagen menu">
        </div>

        <div class="header__derecha">
          <div class="header__modo">
            <img class="header__dark" src="/build/img/dark-mode.svg" alt="modo dark">
          </div>

          <div class="header__nav">
          <a href="/nosotros" class="header__link">Nosotros</a>
          <a href="/anuncios" class="header__link">Anuncios</a>
          <a href="/blog" class="header__link">Blog</a>
          <a href="/contacto" class="header__link">Contacto</a> 
          <?php if($aut): ?>
          <a href="/logout" class="header__link">Cerrar Sesión</a>
            <?php endif; ?>

            <?php if(!$aut): ?>
          <a href="/login" class="header__link">Iniciar Sesión</a>
            <?php endif; ?>

          </div>

         
        </div>

        <?php if($inicio): ?>
        </div >
        <h1 class="header__h1">Venta de casas y departamentos exclusivo de lujo</h1>
      </div>
        <?php endif;
        ?>

  </header>



  <?php echo $contenido ?>

  

  <footer class="footer">
      <div class="footer__contenido contenedor">
        <div class="footer__nav">
          <a href="/nosotros" class="footer__link">Nosotros</a>
          <a href="/anuncios" class="footer__link">Anuncios</a>
          <a href="/blog" class="footer__link">Blog</a>
          <a href="/contacto" class="footer__link">Contacto</a>
        </div>
    
          <p class="footer__copy">Todos los derechos Reservados 2023 &copy;</p>
        </div>
      </div>

    </footer>

  
  <script src="/build/js/bundle.min.js"></script>
</body>
</html>