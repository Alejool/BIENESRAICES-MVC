

<main class=" login contenido-centrado">
  <h2 class="">Iniciar Sesión</h2>

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

  <form  class="form " method="POST">
  <fieldset class="form__fieldset">
        <legend class="form__legend">Email-Password</legend>

       
          <div class="form__campo ">
            <label for="email" class="form__label">Email</label>
            <input id="email"   name="login[email]" type="email" class="form__input" placeholder="Tu email" required>
          </div> <!--campo-->

           <div class="form__campo form__campo--position">
             <label for="contraseña"  class="form__label">password</label>
             <input id="contraseña" name="login[password]" type="password" class="form__input" placeholder="Tu password" minlength="5" >

            <a class="ver-contraseña"><i class="bi bi-eye-slash-fill"></i></a>
            
          </div> <!--campo-->


    </fieldset>
        <div class='btn'>
          <input type="submit" value="Inicia Sesión" class= "form__btn">
        </div>

        
  </form>
</main>




  
