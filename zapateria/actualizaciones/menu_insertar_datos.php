<? require '../functions.php' ?>
<? getheader(); ?>
<a href="index.php" class="btn">❮❮ Volver</a>

<h2 style="text-align: center;">Insertar registros en tablas</h2>
<br>

<form action="<?= URL ?>actualizaciones/gestion_insertar_registro.php" method="POST">
  <label for="t">Nueva talla:</label>
  <br>
  <input type="hidden" name="tipo" value="talla">
  <br>
  <label for="talla_de">Categoría (N, H, M...):</label><br>
  <select name="talla_de" id="talla_de" required>
    <option value="">-- Selecciona código --</option>
    <?php
    $sqlTde = "SELECT DISTINCT talla_de FROM talla";
    $resTde = consulta($sqlTde);
    foreach ($resTde as $tde) {
      echo "<option value='" . $tde['talla_de'] . "'>" . $tde['talla_de'] . "</option>";
    }
    ?>
  </select>
  <br><br>
  <label for="desc_cat">Descripción (Niño, Hombre...):</label>
  <br>
  <select name="desc_cat" id="desc_cat" required>
    <option value="">-- Selecciona descripción --</option>
    <?php
    $sqlDesc = "SELECT DISTINCT desc_cat FROM talla";
    $resDesc = consulta($sqlDesc);
    foreach ($resDesc as $desc) {
      echo "<option value='" . $desc['desc_cat'] . "'>" . $desc['desc_cat'] . "</option>";
    }
    ?>
  </select>
  <br>
  <label for="nombre_t">Número de talla:</label><br>
  <input type="number" name="nombre_t" id="nombre_t" placeholder="Ej: 38" required>

  <button type="submit" class="boton">Insertar talla </button>
  <button type="reset">Limpiar campos</button>
  <a href="<?= URL ?>actualizaciones/menu_crud.php" class="btn">Cancelar</a>
</form>
<br>
<hr>


<form action="<?= URL ?>actualizaciones/gestion_insertar_registro.php" method="POST">
  <label for="c">Nuevo color</label>
  <br>
  <input type="hidden" name="tipo" value="color">
  <input type="text" name="nombre_c" id="nombre_c" placeholder="Nuevo color" required>

  <button type="submit" class="boton">Insertar color </button>
  <button type="reset">Limpiar campos</button>
  <a href="<?= URL ?>actualizaciones/menu_modificar_datos.php" class="btn">Cancelar</a>
</form>
<br>
<hr>


<form action="<?= URL ?>actualizaciones/gestion_insertar_registro.php" method="POST">
  <label for="m">Nueva marca</label>
  <br>
  <input type="hidden" name="tipo" value="marca">
  <input type="text" name="nombre_m" id="nombre_m" placeholder="Nombre marca" required>

  <button type="submit" class="boton">Insertar marca </button>
  <button type="reset">Limpiar campos</button>
  <a href="<?= URL ?>actualizaciones/menu_crud.php" class="btn">Cancelar</a>
</form>
<br>
<hr>

<form action="<?= URL ?>actualizaciones/gestion_insertar_registro.php" method="POST">
  <label for="z">Nuevo zapato</label>
  <br>
  <input type="hidden" name="tipo" value="zapato">
  <input type="text" name="nombre_z" id="nombre_z" placeholder="Nombre comercial" required>
  <input type="text" name="desc_z" id="desc_z" placeholder="Descripción">
  <input type="number" name="precio_z" id="precio_z" placeholder="Precio" step="any">
  <input type="text" name="img_z" id="img_z" placeholder="Ruta imagen">
  <br><br>
  <label for="talla_de">Tallas para asignar:</label><br>
  <select name="talla_de" id="talla_de" required>
    <option value="">-- Selecciona categoría de tallas--</option>
    <?php
    $sqlTallas = "SELECT DISTINCT talla_de,desc_cat FROM talla";
    $resTallas = consulta($sqlTallas);

    foreach ($resTallas as $t) {
      echo "<option value='" . $t['talla_de'] . "'>" . $t['talla_de'] . " Para:  " . $t['desc_cat'] . "</option>";
    }
    ?>
  </select>
  <br>
  <label for="id_para">Para:</label><br>
  <select name="id_para" id="id_para" required>
    <option value="">-- Selecciona público --</option>
    <?php rellenarSelect('id_para', 'para', 'para'); ?>
  </select>
  <br>

  <label for="id_marca">Marca:</label><br>
  <select name="id_marca" id="id_marca" required>
    <option value="">-- Selecciona marca --</option>
    <?php rellenarSelect('id_marca', 'marca', 'marca'); ?>
  </select>
  <br>



  <label for="id_color">Colores (mantén Ctrl o Shift para seleccionar varios):</label><br>
  <select name="id_color[]" id="id_color" multiple required style="height: 100px;">
    <?php rellenarSelect('id_color', 'color', 'color'); ?>
  </select>




  <button type="submit" class="boton">Insertar zapato</button>
  <button type="reset">Limpiar campos</button>
  <a href="<?= URL ?>actualizaciones/menu_crud.php" class="btn">Cancelar</a>
</form>