<? require 'functions.php' ?>
<? getheader(); ?>


<h1 style="text-align:center;">Bienvenidos a <?= TITLE ?></h1>
<p style="text-align:center;">Zapateria on line</p>
<hr style="border:0; height:5px; background:#0F0504; margin:20px 0;">

<?php
$sql = "SELECT * FROM zapato";
$zapatos = consulta($sql);
?>

<div class="productos">
  <ul class="galeria">
    <? foreach ($zapatos as $unidad): ?>
      <li>
        <a href="ficha_zapato.php?id=<?= $unidad['id_zapato'] ?>">
          <h3><?= $unidad['nombre_zapato'] ?></h3>
          <p><?= $unidad['descripcion_zapato'] ?></p>
          <img src="<?= $unidad['imagen'] ?>" width="200" height="200" />



        </a>
      </li>
    <? endforeach; ?>
  </ul>
</div>

<? getfooter(); ?>