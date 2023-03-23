
<main class="contenedor">
  <h2 class="">Registrar propiedad</h2>
  <div class='btn'>
    <a href="../admin" class="form__btn">Volver</a>
  </div>

  <?php 
  if ($errores){
   foreach ( $errores as $error): ?>

      <div class="alerta error">
        <?php 
        echo $error; ?>
      </div>

      <?php 
      endforeach;
     
      
  }
     
    ?>

  <form method="POST" class="form" enctype="multipart/form-data">
    <?php 
    include __DIR__. '/formulario.php';
    ?>

  <div class="btn">
    <input type="submit" class="form__btn" value="Registrar propiedad"> 
  
  </div>
  </form>

</main>

