<fieldset class="form__fieldset">
    <legend class="form__legend">Información general</legend>

    <div class="form__campo">
      <label for="titulo" class="form__label" > titulo</label>
      <input  name="titulo"  id="titulo" class="form__input" type="text" placeholder="titulo propiedad" value= "<?php echo s($propiedad->titulo);?>">
    </div> <!--form__campo-->

    <div class="form__campo">
      <label for="precio" class="form__label">precio</label>
      <input  name="precio" id="precio" class="form__input" type="number" placeholder="precio propiedad " min="1" value= "<?php echo s($propiedad->precio);?>" >
    </div> <!--form__campo-->

    <div class="form__campo">
      <label for="imagen" class="form__label">imagen</label>
      <input  name="imagen" id="imagen" class="form__input" type="file" accept="image/jpeg, image/png" >

      <?php if($propiedad->imagen) {?>

      <img class="img__small" src="/imagenes/<?php echo $propiedad->imagen?>" alt="imagen propiedad">

      <?php } ?>
    </div> <!--form__campo-->

    <div class="form__campo">
      <label for="descripcion" class="form__label">Descripción</label>
     <textarea  name="descripcion"  id="descripcion" class="form__input " rows="10" ><?php echo s($propiedad->descripcion); ?>
     </textarea><!--form__campo-->

  </fieldset> <!--fieldset-->


  <fieldset class="form__fieldset">
   <legend class="form__legend">Información Propiedad</legend>

  <div class="form__flex">
     <div class="form__campo">
        <label for="habitaciones" class="form__label">habitaciones</label>
        <input  name="habitaciones" id="habitaciones" class="form__input" type="number" placeholder="ejemplo:3" min="1" value= "<?php echo s($propiedad->habitaciones);?>">
      </div> <!--campo-->
  
      <div class="campo">
        <label for="wc" class="form__label">Baños</label>
        <input name="wc"  id="wc" class="form__input" type="number" placeholder="ejemplo:3" min="1" value= "<?php echo s($propiedad->wc);?>" >
      </div> <!--campo-->
  
      <div class="campo">
        <label for="estacionamiento" class="form__label">estacionamiento</label>
        <input  name="estacionamiento" id="estacionamiento" class="form__input" type="number" placeholder="ejemplo:3" min="1" value="<?php echo s($propiedad->estacionamiento);?>">
      </div> <!--campo-->
  </div>
  </fieldset>

 

  <fieldset class="form__fieldset">
  <legend class="form__legend">Vendedor</legend>

    <div class="form__campo">
      <select name="vendedorId" id="vendedor" class="form__select" >
        <option selected value="">-- seleccione --</option>
        
        <?php  foreach($vendedores as $vendedor):?>
        <option 
          <?php echo $propiedad->vendedorId == $vendedor->id ? 'selected': ''?>
          value=" <?php echo s($vendedor->id) ?>"> <?php echo s($vendedor->nombre) ." " . s($vendedor->apellido); ?> </option>

          <?php endforeach;?>

      </select>
    </div>

    </select>
  </div>

  </fieldset>


 