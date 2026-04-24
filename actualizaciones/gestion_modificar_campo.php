<?php
require_once '../functions.php';
getheader();

$tipo = $_POST['tipo'] ?? '';
$nombre_z = $_POST['nombre_z'] ?? '';
$desc_z = $_POST['desc_z'] ?? '';
$precio_z = $_POST['precio_z'] ?? '';
$img_z = $_POST['img_z'] ?? '';


$id_zapato = $_POST['id_zapato'] ?? 0;

switch ($tipo) {
  case 'zapato':
    modificarZapato();
    break;

  default:
    echo "Ha habido un error y no se ha encontrado la tabla";
    break;
}

function modificarZapato()
{
  global $id_zapato, $nombre_z, $desc_z, $precio_z, $img_z;

  if (!$id_zapato) {
    echo "No se ha proporcionado un ID de zapato válido.";
    return;
  }

  $mysqli = conn();
  $ok = modificarDatosZapato($mysqli, 'zapato', $id_zapato, $nombre_z, $desc_z, $precio_z, $img_z);

  if ($ok) {
    echo "<h1>✅ Registro actualizado</h1>";
    echo "<p>El zapato '$nombre_z' ha sido modificado con éxito.</p>";
  } else {
    echo "<h1>❌ Error</h1>";
    echo "<p>No se pudo modificar el registro. Comprueba que los datos sean correctos.</p>";
  }
}

getfooter();
