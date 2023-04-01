<fieldset class="form__fieldset">
    <legend class="form__legend">Información general</legend>

    <div class="form__campo">
      <label for="nombre" class="form__label" > Nombre</label>
      <input  name="nombre"  id="nombre" class="form__input" type="text" placeholder="titulo propiedad" value= "<?php echo s($vendedor->nombre);?>">
    </div> <!--form__campo-->

    <div class="form__campo">
      <label for="apellido" class="form__label">Apellido</label>
      <input  name="apellido" id="apellido" class="form__input" type="text" placeholder="apellido vendedor"  value= "<?php echo s($vendedor->apellido);?>" >
    </div> <!--form__campo-->


  </fieldset> <!--fieldset-->

  <fieldset class="form__fieldset">
    <legend class="form__legend"> Datos Adicionales </legend>
    <div class="form__campo">
      <label for="telefono" class="form__label">Telefono</label>
      <input  name="telefono" id="telefono" class="form__input" type="tel" placeholder="ej: 321348192" value= "<?php echo s($vendedor->telefono);?>" >
    </div> <!--form__campo-->

    <div class="form__campo">
      <label for="correo" class="form__label">Correo</label>
      <input  name="correo" id="correo" class="form__input" type="email" placeholder="ej: correo@correo.com" min="1" value= "<?php echo s($vendedor->correo);?>" >
    </div> <!--form__campo-->
  
  </fieldset>
