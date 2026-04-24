<?php require '../functions.php'; ?>
<?php getheader(); ?>
<a href="index.php" class="btn">❮❮ Volver</a>

<h2 style="text-align: center;">Modificar campos de zapato</h2>
<br>

<?php
$id_seleccionado = $_POST['z'] ?? null;
$zapato_a_modificar = null;

if ($id_seleccionado) {

  $sql = "SELECT * FROM zapato WHERE id_zapato = " . (int) $id_seleccionado;
  $resultado = consulta($sql);

  if (!empty($resultado)) {
    $zapato_a_modificar = $resultado[0];
  }
}
?>


<form action="" method="POST">
  <label for="z">Selecciona el zapato a modificar:</label>
  <br>
  <select name="z" id="z" onchange="this.form.submit()">
    <option value="">-- Selecciona un zapato --</option>
    <?php

    rellenarSelect('id_zapato', 'nombre_zapato', 'zapato');
    ?>
  </select>
  <noscript><button type="submit" class="boton">Cargar datos</button></noscript>
  <a href="<?= URL ?>actualizaciones/menu_crud.php" class="btn">Cancelar</a>
</form>

<?php if ($zapato_a_modificar): ?>

  <form action="<?= URL ?>actualizaciones/gestion_modificar_campo.php" method="POST">
    <input type="hidden" name="tipo" value="zapato">
    <input type="hidden" name="id_zapato" value="<?= $zapato_a_modificar['id_zapato'] ?>">

    <label for="nombre_z">Nombre comercial:</label><br>
    <input type="text" name="nombre_z" id="nombre_z" value="<?= $zapato_a_modificar['nombre_zapato'] ?>" required>
    <br>

    <label for="desc_z">Descripción:</label><br>
    <input type="text" name="desc_z" id="desc_z" value="<?= $zapato_a_modificar['descripcion_zapato'] ?>">
    <br>

    <label for="precio_z">Precio (€):</label><br>
    <input type="number" name="precio_z" id="precio_z" value="<?= $zapato_a_modificar['precio'] ?>" step="any">
    <br>

    <label for="img_z">Ruta imagen:</label><br>
    <input type="text" name="img_z" id="img_z" value="<?= $zapato_a_modificar['imagen'] ?>">
    <br>

    <button type="submit" class="boton">Guardar cambios</button>
    <a href="<?= URL ?>actualizaciones/menu_crud.php" class="btn">Cancelar</a>
  </form>
<?php else: ?>

<?php endif; ?>

<?php getfooter(); ?>