<?php
require_once '../functions.php';
getheader();

$tipo = $_POST['tipo'] ?? '';
$nombre_z = $_POST['nombre_z'] ?? '';
$desc_z = $_POST['desc_z'] ?? '';
$precio_z = $_POST['precio_z'] ?? '';
$img_z = $_POST['img_z'] ?? '';
$nombre_m = $_POST['nombre_m'] ?? '';
$nombre_t = $_POST['nombre_t'] ?? '';
$nombre_c = $_POST['nombre_c'] ?? '';
$talla_de = $_POST['talla_de'] ?? '';
$id_marca = $_POST['id_marca'] ?? 0;
$id_color = $_POST['id_color'] ?? [];
$id_para = $_POST['id_para'] ?? 0;
$desc_cat = $_POST['desc_cat'] ?? '';



switch ($tipo) {
  case 'zapato':
    insertarZapatos();
    break;

  case 'marca':
    insertarMarca();
    break;

  case 'talla':
    insertarTalla();
    break;

  case 'color':
    insertarColor();
    break;

  default:
    echo "Ha habido un error y no se ha encontrado la tabla";
    break;
}

function insertarZapatos()
{
  global $nombre_z, $desc_z, $precio_z, $img_z, $talla_de, $id_marca, $id_color, $id_para;

  $mysqli = conn();

  $datos = [
    'nombre_zapato' => $nombre_z,
    'descripcion_zapato' => $desc_z,
    'precio' => $precio_z,
    'imagen' => $img_z
  ];

  if (insertarRegistro($mysqli, 'zapato', $datos)) {

    $id_nuevo_zapato = $mysqli->insert_id;
    echo "<h1>✅ Zapato insertado</h1><p>El zapato '$nombre_z' se ha guardado correctamente.</p>";


    if ($talla_de) {
      $sqlTallas = "SELECT id_talla FROM talla WHERE talla_de = '$talla_de'";
      $tallas = consulta($sqlTallas);



      if (!empty($tallas)) {
        $count = 0;
        foreach ($tallas as $t) {
          $datosRelacion = [
            'fk_zapato' => $id_nuevo_zapato,
            'fk_talla' => $t['id_talla']
          ];
          if (insertarRegistro($mysqli, 'zapato_talla', $datosRelacion)) {
            $count++;
          }
        }
        echo "<p>📦 Se han asignado $count tallas de la categoría '$talla_de' automáticamente.</p>";
      }
    }


    if ($id_marca) {
      $datosMarca = ['fk_zapato' => $id_nuevo_zapato, 'fk_marca' => $id_marca];
      if (insertarRegistro($mysqli, 'zapato_marca', $datosMarca)) {
        echo "<p>🏷️ Marca asignada correctamente.</p>";
      }
    }


    if (!empty($id_color)) {
      $colorCount = 0;
      foreach ($id_color as $id_c) {
        $datosColor = ['fk_zapato' => $id_nuevo_zapato, 'fk_color' => $id_c];
        if (insertarRegistro($mysqli, 'zapato_color', $datosColor)) {
          $colorCount++;
        }
      }
      echo "<p>🎨 Se han asignado $colorCount colores correctamente.</p>";
    }


    if ($id_para) {
      $datosPara = ['fk_zapato' => $id_nuevo_zapato, 'fk_para' => $id_para];
      if (insertarRegistro($mysqli, 'zapato_para', $datosPara)) {
        echo "<p>👪 Categoría de público ('Para') asignada correctamente.</p>";
      }
    }
  } else {



    echo "<h1>❌ Error</h1><p>No se pudo insertar el zapato.</p>";
  }
}


function insertarMarca()
{
  global $nombre_m;
  $mysqli = conn();
  $datos = ['marca' => $nombre_m];

  if (insertarRegistro($mysqli, 'marca', $datos)) {
    echo "<h1>✅ Marca insertada</h1><p>La marca '$nombre_m' se ha guardado correctamente.</p>";
  } else {
    echo "<h1>❌ Error</h1><p>No se pudo insertar la marca.</p>";
  }
}

function insertarTalla()
{
  global $nombre_t, $talla_de, $desc_cat;
  $mysqli = conn();

  $datos = [
    'talla' => $nombre_t,
    'talla_de' => $talla_de,
    'desc_cat' => $desc_cat
  ];

  if (insertarRegistro($mysqli, 'talla', $datos)) {
    echo "<h1>✅ Talla insertada</h1><p>La talla '$nombre_t ($talla_de - $desc_cat)' se ha guardado correctamente.</p>";
  } else {
    echo "<h1>❌ Error</h1><p>No se pudo insertar la talla. Verifica que todos los campos sean correctos.</p>";
  }
}

function insertarColor()
{
  global $nombre_c;
  $mysqli = conn();
  $datos = ['color' => $nombre_c];

  if (insertarRegistro($mysqli, 'color', $datos)) {
    echo "<h1>✅ Color insertado</h1><p>El color '$nombre_c' se ha guardado correctamente.</p>";
  } else {
    echo "<h1>❌ Error</h1><p>No se pudo insertar el color.</p>";
  }
}


getfooter();
