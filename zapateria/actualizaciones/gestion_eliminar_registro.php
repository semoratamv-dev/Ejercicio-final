<?php
require_once '../functions.php';

getheader();

$tipo = $_POST['tipo'] ?? '';
$id = $_POST['id'] ?? $_POST['m'] ?? $_POST['t'] ?? $_POST['c'] ?? '';




switch ($tipo) {
  case 'zapato':
    if (borrarRegistro(conn(), 'zapato', $id)) {
      echo "<p>Zapato borrado correctamente</p>";
    } else {
      echo "<p>Error: No se pudo eliminar el zapato. Puede que tenga dependencias registradas.</p>";
    }
    ;
    break;

  case 'marca':
    if (borrarRegistro(conn(), 'marca', $id)) {
      echo "<p>Marca borrada correctamente</p>";
    } else {
      echo "<p>Error: No se pudo eliminar la marca. Asegúrese de que no esté asociada a ningún zapato.</p>";
    }
    ;
    break;

  case 'talla':
    if (borrarRegistro(conn(), 'talla', $id)) {
      echo "<p>Talla borrada correctamente</p>";
    } else {
      echo "<p>Error: No se pudo eliminar la talla.</p>";
    }
    break;

  case 'color':
    if (borrarRegistro(conn(), 'color', $id)) {
      echo "<p>Color borrado correctamente</p>";
    } else {
      echo "<p>Error: No se pudo eliminar el color.</p>";
    }
    break;

  default:
    echo "<p>Error: Operación no válida o tabla no encontrada.</p>";
    break;
}

getfooter();