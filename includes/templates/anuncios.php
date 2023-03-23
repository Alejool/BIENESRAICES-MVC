
<?php



use App\Propiedad;



  if($_SERVER["SCRIPT_NAME"]==="/bienesraicesPOO/index.php"){
    $limit=3;
    $propiedades= Propiedad::get($limit);
  } else {
    $propiedades=Propiedad::get(12);
  }


?>


<main class="anuncios contenedor">

  <h2 class="anuncios__title">Casas y Depas en venta</h2>

    <div class="anuncios__cards">
    <?php foreach($propiedades as $propiedad): ?>
      <div class="card">
     
        
          <img loading="lazy"  src="<?php echo "imagenes/".$propiedad->imagen;  ?>" alt="anuncio 1">
  

        <div class="card__info">
          <h3 class="card__title"> <?php echo $propiedad->titulo;  ?></h3>
          <p class="card__text"><?php echo $propiedad->descripcion;  ?></p>
          <p class="card__precio">$<?php echo $propiedad->precio;  ?></p>

          <ul class="card__iconos">

            <li class="card__icono"> 
              <img class="" src="build/img/icono_wc.svg" alt="icono baños">
              <p class="card__cantidad"><?php echo $propiedad->wc;  ?></p>
            </li>
            <li class="card__icono"> 
              <img src="/bienesraicesPOO/build/img/icono_dormitorio.svg" alt="icono dormitorios">
              <p class="card__cantidad"><?php echo $propiedad->habitaciones;  ?></p>
            </li>
            <li class="card__icono"> 
                <img src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                <p class="card__cantidad"><?php echo $propiedad->estacionamiento;  ?></p>
            </li>
            </ul>
            <a href="anuncio.php?id=<?php echo $propiedad->id;  ?>" class="card__btn">Ver propiedad</a>
        </div> 


      </div><!--anuncio card-->
      <?php endforeach; ?>
    </div>
   


      