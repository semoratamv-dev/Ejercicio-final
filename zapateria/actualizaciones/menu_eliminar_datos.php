<? require '../functions.php' ?>
<? getheader(); ?>
<a href="index.php" class="btn">❮❮ Volver</a>

<h2 style="text-align: center;">Eliminar registros en tablas</h2>
<br>


<form action="<?= URL ?>actualizaciones/gestion_eliminar_registro.php" method="POST">
  <label for="z">Eliminar zapato</label>
  <br>
  <input type="hidden" name="tipo" value="zapato">
  <select name="z" id="z">
    <option value="">Selecciona opción</option>
    <?php rellenarSelect('id_zapato', 'nombre_zapato', 'zapato') ?>
  </select>

  <button type="submit" class="boton">Eliminar zapato</button>
  <button type="reset">Limpiar campos</button>
  <a href="<?= URL ?>actualizaciones/menu_crud.php" class="btn">Cancelar</a>
</form>
<br>
<br>



<form action="<?= URL ?>actualizaciones/gestion_eliminar_registro.php" method="POST">
  <label for="m">Eliminar marca</label>
  <br>
  <input type="hidden" name="tipo" value="marca">
  <select name="m" id="m">
    <option value="">Selecciona opción</option>
    <?php rellenarSelect('id_marca', 'marca', 'marca') ?>
  </select>

  <button type="submit" class="boton">Eliminar marca</button>
  <button type="reset">Limpiar campos</button>
  <a href="<?= URL ?>actualizaciones/menu_crud.php" class="btn">Cancelar</a>
</form>
<br>
<br>


<form action="<?= URL ?>actualizaciones/gestion_eliminar_registro.php" method="POST">
  <label for="t">Eliminar talla</label>
  <br>
  <input type="hidden" name="tipo" value="talla">
  <select name="t" id="t">
    <option value="">Selecciona opción</option>
    <?php rellenarSelect('id_talla', 'talla', 'talla') ?>
  </select>

  <button type="submit" class="boton">Eliminar talla </button>
  <button type="reset">Limpiar campos</button>
  <a href="<?= URL ?>actualizaciones/menu_crud.php" class="btn">Cancelar</a>
</form>
<br>
<br>


<form action="<?= URL ?>actualizaciones/gestion_eliminar_registro.php" method="POST">
  <label for="c">Eliminar color</label>
  <br>
  <input type="hidden" name="tipo" value="color">
  <select name="c" id="c">
    <option value="">Selecciona opción</option>
    <?php rellenarSelect('id_color', 'color', 'color') ?>
  </select>

  <button class="boton" type="submit">Eliminar color </button>
  <button type="reset">Limpiar campos</button>
  <a href="<?= URL ?>actualizaciones/menu_crud.php" class="btn">Cancelar</a>
</form>