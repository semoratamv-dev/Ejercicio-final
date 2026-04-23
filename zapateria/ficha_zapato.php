<? require 'functions.php' ?>
<? getheader(); ?>

<a href="index.php" class="btn">❮❮ Volver</a>

<?php
$id = (int) $_GET["id"];

$sqlZ = "SELECT DISTINCT
  z.id_zapato,
  z.nombre_zapato,
  z.descripcion_zapato,
  z.imagen,
  z.precio,
  zp.id_zp_para,
  zm.id_zp_marca,
	t.id_talla,
  p.para,
  m.marca,
	t.talla

FROM zapato z

-- zapato_para
JOIN zapato_para zp 
  ON z.id_zapato = zp.fk_zapato
JOIN para p
  ON zp.fk_para = p.id_para
	
-- zapato_marca
JOIN zapato_marca zm
  ON z.id_zapato = zm.fk_zapato
JOIN marca m
  ON zm.fk_marca = m.id_marca
-- zapato_talla

JOIN zapato_talla zt ON z.id_zapato = zt.fk_zapato
JOIN talla t ON zt.fk_talla=t.id_talla
WHERE z.id_zapato=$id";

$zapatos = consulta($sqlZ);

$sqlC = "SELECT DISTINCT
  z.id_zapato,
  z.nombre_zapato,
  z.descripcion_zapato,
  z.imagen,
  z.precio,
  c.color
FROM zapato z
JOIN zapato_color zc ON z.id_zapato = zc.fk_zapato
JOIN color c ON zc.fk_color=c.id_color
WHERE z.id_zapato=$id";
$color = consulta($sqlC);

if (empty($zapatos)) {
  echo "<h2 style='text-align:center; padding:50px;'>El producto solicitado no existe o es ilegible en la base de datos.</h2>";
  getfooter();
  exit;
}

$zapato = $zapatos[0];
?>

<!-- <?php print ($id); ?> -->
<div class="ficha">
  <img src="<?= $zapato['imagen'] ?? 'assets/img/default.jpg'; ?>" width="200px" height="250px"
    alt="Imagen del zapato" />
  <div class="contenedor">
    <h1><?= $zapato['nombre_zapato'] ?? 'No existe o ilegible' ?></h1>
    <h2>Para: <?= $zapato['para'] ?? 'No existe o ilegible' ?>
    </h2>
    <h3>Marca: <?= $zapato['marca'] ?? 'No existe o ilegible' ?></h3>
    <br>
    <p>Descripción: <?= $zapato['descripcion_zapato'] ?? 'No existe o ilegible' ?></p>
    <br>
    <p>Precio: <?= isset($zapato['precio']) ? $zapato['precio'] . " €" : 'No existe o ilegible' ?></p>
    <br>
    <ul class="tallas"><strong>Tallas disponibles:</strong>
      <? foreach ($zapatos as $unidad): ?>
        <li>
          <?= $unidad['talla'] ?? '?' ?>
        </li>
      <? endforeach ?>
    </ul>
    <br>
    <ul class="tallas"><strong>Colores disponibles:</strong>
      <? foreach ($color as $unidad): ?>
        <li>
          <?= $unidad['color'] ?? '?' ?>
        </li>
      <? endforeach ?>
    </ul>
  </div>
</div>


<? getfooter(); ?>