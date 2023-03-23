<main class="contenedor">
  <h2 class="">Actualizar</h2>

  <div class='btn'>
    <a href="../admin" class="form__btn">Volver</a>
  </div>

 
    <?php 
      foreach ( $errores as $error): ?>

      <div class="alerta error">
        <?php 
        echo $error; ?>
      </div>

      <?php 
      endforeach;
    ?>
  </div>


     <!-- ECTYPE:multipart/form-data  SIRVE PARA PODER SUBIR ARHIVOS, este atributo lo permite -->

     <form method="POST" class="form" enctype="multipart/form-data">

    <?php include __DIR__. '/formulario.php' ?>


  <div class="btn">
    <input type="submit" class="form__btn" value="Actualizar propiedad"> 
  </div>

  </form>

</main>