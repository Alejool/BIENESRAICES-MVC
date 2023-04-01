
<main class="contenedor">
  <h2 class="">Vendedores</h2>

  <?php  if ($mensaje==1):
  ?>
  <p class="cambios correcto">
    <?php  echo "vendedor agregado correctamente"  ?>
  </p>
   <?php elseif ($mensaje==2):?>
    <p class="cambios actualizado">
    <?php  echo "vendedor Actualizado correctamente"  ?>
  </p>
  <?php elseif ($mensaje==3):?>
    <p class="cambios eliminado">
    <?php  echo " Eliminado correctamente"  ?>
  </p>
 
  
  <?php ; endif;  ?>

 <div class="btn__flex">
   <div class='btn'>
     <a href="../propiedades/admin" class="form__btn m-r-2">volver</a>
   </div>
  
   <div class='btn'>
     <a href="crear" class="form__btn">Nuevo Vendedor</a>
 </div>
 </div>


  <table class="tabla">
    <thead class="tabla__thead">
      <tr>
        <th class="tabla__titulo">Id</th>
        <th class="tabla__titulo">Nombre</th>
        <th class="tabla__titulo">Telefono</th>
        <th class="tabla__titulo">Correo</th>
        <th class="tabla__titulo">Acciones</th>
      </tr>
    </thead>
    <tbody class="tabla__tbody">
      
      <?php foreach($vendedores as $vendedor):
      ?>

      <tr class="tabla__fila">
        <td class="tabla__valor tabla__valor--id">  <?php echo $vendedor->id; ?></td>
        <td class="tabla__valor"><?php echo $vendedor->nombre . " ". $vendedor->apellido ?> </td>
        <td class="tabla__valor" ><?php echo $vendedor->telefono;?></td>
        <td class="tabla__valor"><?php echo $vendedor->correo; ?></td>

        <td class="tabla__valor ">
          <a href="actualizar?id=<?php echo $vendedor->id;  ?>" class="form__btn btn__amarillo">Actualizar</a> 
          <form  method="POST" >
            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
            <input class="btn__rojo" type="submit" value="Eliminar">
          </form>
        </td>
      </tr>

      <?php endforeach; ?>

    </tbody>

  </table>
</main>
