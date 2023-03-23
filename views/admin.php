

<main class="contenedor">
  <h2 class="">Administrador de bienes Raices</h2>
  
  <?php 
  if ($mensaje){ ?>
  <?php  if ($mensaje==1):
  
  ?>
  <p class="cambios correcto">
    <?php  echo "Propiedad agregada correctamente"  ?>
  </p>
   <?php elseif ($mensaje==2):?>
    <p class="cambios actualizado">
    <?php  echo "Propiedad Actualizada correctamente"  ?>
  </p>
  <?php elseif ($mensaje==3):?>
    <p class="cambios eliminado">
    <?php  echo "Propiedad Eliminada correctamente"  ?>
  </p>
 
  
  <?php ; endif;  ?>
  <?php }
  ?>



  <div class='btn'>
    <a href="propiedades/crear" class="form__btn m-r-2">Nueva propiedad</a>
  
    <a href="/vendedores/admin" class="form__btn btn__amarillo ">Vendedores</a>
  </div>


  <table class="tabla">
    <thead class="tabla__thead">
      <tr>
        <th class="tabla__titulo">Id</th>
        <th class="tabla__titulo">Titulo</th>
        <th class="tabla__titulo">Imagen</th>
        <th class="tabla__titulo">Precio</th>
        <th class="tabla__titulo">Acciones</th>
      </tr>
    </thead>
    <tbody class="tabla__tbody">
      
      <?php foreach($propiedades as $propiedad):
      ?>

      <tr class="tabla__fila">
        <td class="tabla__valor tabla__valor--id">  <?php echo $propiedad->id; ?></td>
        <td class="tabla__valor"><?php echo $propiedad->titulo; ?> </td>
        <td class="tabla__valor" > <img  class="tabla__img" src="/MVC-BIENESRAICES/public/imagenes/<?php echo $propiedad->imagen;?>" alt="imagen propiedad"></td>
        <td class="tabla__valor">$ <?php echo $propiedad->precio; ?></td>

        <td class="tabla__valor">
          <a href="propiedades/actualizar?id=<?php echo $propiedad->id;  ?>" class="form__btn btn__amarillo">Actualizar</a> 
          
          <form  method="POST"  >
            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
            <input class="btn__rojo" type="submit" value="Eliminar">
          </form>
        </td>
      </tr>

      <?php endforeach; ?>

    </tbody>

  </table>
</main>

