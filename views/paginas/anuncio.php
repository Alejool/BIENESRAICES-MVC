
<main class="anuncio contenedor">

  <h2 class="anuncio__title"> <?php echo $propiedad->titulo; ?> </h2>
  <img class="anuncio__img" src="imagenes/<?php echo $propiedad->imagen; ?> " alt="imagen propiedad">
  <p class="card__precio">  $<?php echo $propiedad->precio;  ?></p>

<ul class="card__iconos card__iconos--position">
  <li class="card__icono"> 
    <img class="" src="build/img/icono_wc.svg" alt="icono baños">
    <p class="card__cantidad"><?php echo $propiedad->wc;  ?></p>
  </li>
  <li class="card__icono"> 
    <img src="/build/img/icono_dormitorio.svg" alt="icono dormitorios">
    <p class="card__cantidad"><?php echo $propiedad->habitaciones; ?>
  </li>
  <li class="card__icono"> 
      <img src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
      <p class="card__cantidad"><?php echo $propiedad->estacionamiento  ?></p>
  </li>
  </ul>

  <p class="anuncio__p"><?php echo $propiedad->descripcion ?></p>
</main>

