<main class="contenedor">
  <h2 class="">Actualizar Vendedor</h2>

  <div class='btn'>
    <a href="admin" class="form__btn">Volver</a>
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
    
  </div>


     <!-- ECTYPE:multipart/form-data  SIRVE PARA PODER SUBIR ARHIVOS, este atributo lo permite -->

  <form  method="POST" class="form" >

      <?php include __DIR__. "/formulario.php" ?>

  <div class="btn">
    <input type="submit" class="form__btn" value="Actualizar info"> 
  </div>
  </form>

</main>