<? require '../functions.php' ?>
<? getheader(); ?>
<base href="<?= URL ?>">
<a href="index.php" class="btn">❮❮ Volver</a>

<div class="reset">
  <h1 style="text-align: center;">CRUD</h1>
  <p>En este menú se podrán realizar acciones CRUD sobre la base de datos, las tablas o los registros</p>

  <ol class="menucrud">

    <br>
    <li class="sep">-------- Menún actualización datos ---------</li>
    <li><a href="<?= URL ?>actualizaciones/menu_insertar_datos.php">📃 Insertar nuevos registros en tablas</a></li>
    <li><a href="<?= URL ?>actualizaciones/menu_modificar_datos.php">📃 Modificar datos de zapato</a></li>
    <li><a href="<?= URL ?>actualizaciones/menu_eliminar_datos.php">🧨 Eliminar registros en tablas</a></li>
    <br>
    <li class="sep">------------------------- Reset-----------------</li>
    <br>
    <li><a href="<?= URL ?>actualizaciones/reset.php">🧨 Resetear y recrear BBDD</a></li>


  </ol>
</div>


<br>

<? getfooter(); ?>