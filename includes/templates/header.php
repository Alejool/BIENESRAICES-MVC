
<?php 

  if(!isset($_SESSION)){
    session_start();
  }

  $aut=$_SESSION["login"] ?? false;

?>



<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/bienesraicesPOO/build/css/app.css">
  <link rel="icon" href="https://www.inversionsimple.com/wp-content/uploads/2021/09/Portada-bienes-raices.jpg">
 
  <title>Bienes Raices</title>
</head>
<body>

  <header class="header <?php echo $inicio ? 'inicio': ""; ?>">
    <div class="contenedor">

      <div class="header__barra ">
        <div class="header__logo">
        <a href="/bienesraicesPOO/index.php" class="">
          <img class="img-fluid" src="/bienesraicesPOO/build/img/logo.svg" alt="imagen logo">
        </a>  
    </div>

        <div class="header__hamburguesa">
          <img src="/bienesraicesPOO/build/img/barras.svg" alt="imagen menu">
        </div>

        <div class="header__derecha">
          <div class="header__modo">
            <img class="header__dark" src="/bienesraicesPOO/build/img/dark-mode.svg" alt="modo dark">
          </div>

          <div class="header__nav">
          <a href="/bienesraicesPOO/nosotros.php" class="header__link">Nosotros</a>
          <a href="/bienesraicesPOO/anuncios.php" class="header__link">Anuncios</a>
          <a href="/bienesraicesPOO/blog.php" class="header__link">Blog</a>
          <a href="/bienesraicesPOO/contacto.php" class="header__link">Contacto</a> 
          <?php if($aut): ?>
          <a href="/bienesraicesPOO/cerrar-sesion.php" class="header__link">Cerrar Sesión</a>
            <?php endif; ?>

            <?php if(!$aut): ?>
          <a href="/bienesraicesPOO/login.php" class="header__link">Iniciar Sesión</a>
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