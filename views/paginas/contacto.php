

  <main class="contacto contenedor">
    <picture>
      <source srcset="build/img/destacada3.webp" type="image/webp">
      <img loading="lazy"   src="build/img/destacada3.jpg" alt="">
    </picture>

    <form method="POST" class="form" >
      <h2 class="form__title">Completa el formulario </h2>

      <?php  if($mensaje && $envio){?>
        <p class="alerta exito">  <?php echo $mensaje ?></p>

        <?php } elseif ($mensaje !== false){?>
        <p class="alerta error">  <?php echo $mensaje ?></p>
      <?php }?>


      <fieldset class="form__fieldset">
        <legend class="form__legend">Infomación Personal</legend>

        <div class="form__campo">
          <label for="nombre" class="form__label">Nombre</label>
          <input id="nombre" type="text" class="form__input" placeholder="Tu Nombre" name=contacto[nombre] required>
        </div> <!--campo-->

        <div class="form__campo">
          <label for="mensaje" class="form__label">Mensaje</label>
          <textarea id="mensaje" class="form__input" rows="10" name="contacto[mensaje]" required> </textarea>
        </div> <!--campo-->
      
      </fieldset>

      <fieldset class="form__fieldset text-center">
        <legend class="form__legend">Sobre la propiedad</legend>

        <div class="form__flex">
         <div class="form__campo ">
         
            <label for="compra" class="form__label">Vende o compra</label>
            <select class="form__select" id="compra" name="contacto[tipo]" required>
              <option value="" class="form__option" selected disabled>-- seleccciona --</option>
              <option  value="compra" class="form__option">Compra</option>
              <option value="venta" class="form__option">Venta </option>
            </select>
          </div>

          <div class="form__campo ">
            <label for="presupuesto" class="form__label">Precio o Presupesto<label>
              <input class="form__input" type="number" min="0" id="presupuesto" placeholder="Tu Presupuesto" name="contacto[precio]" required>
          </div>
           
        </div> <!--campo-->

      </fieldset>

      <fieldset class="form__fieldset">
        <legend class="form__legend text-center">Más información</legend>

        <div class="form__flex">
          <p class="form__p">¿Cómo desea ser contactado?</p>

          <div class="form__flex--direction">  
            <div class="form__radio">
              <label for="telefono" class="form__label">Teléfono</label>
              <input value="telefono" name="contacto[contacto]" id="telefono" type="radio" class="form__radio"  required>
            </div>
          
            <div class="form__radio">
              <label for="correo" class="form__label">e-mail</label>
              <input value="correo" name="contacto[contacto]" id="correo" type="radio" class="form__radio"  required>
            </div>
          </div>
        </div>
        <div id= "contacto" ></div>

      </fieldset>

      <div class='btn'>
        <input type="submit" value="Enviar" class= "form__btn">
      </div>

    </form>
  </main>


