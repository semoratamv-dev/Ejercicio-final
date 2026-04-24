<?php require_once '../functions.php'; ?>
<?php
getheader();

$sqlFile = '../zapateria.sql';


$mysqli = mysqli_init();
mysqli_options($mysqli, MYSQLI_OPT_CONNECT_TIMEOUT, 5);
if (!mysqli_real_connect($mysqli, SERV, USER, PASS, DBNM)) {
  die('Error de conexión: ' . mysqli_connect_error());
}


if (!is_readable($sqlFile)) {
  die("No se puede leer el archivo: $sqlFile");
}
$sql = file_get_contents($sqlFile);

$sql = str_replace(["\r\n", "\r"], "\n", $sql);


$statements = [];
$buffer = '';
$in_string = false;
$string_char = '';
$len = strlen($sql);

for ($i = 0; $i < $len; $i++) {
  $char = $sql[$i];
  $buffer .= $char;

  if (($char === "'" || $char === '"')) {
    if (!$in_string) {
      $in_string = true;
      $string_char = $char;
    } elseif ($string_char === $char) {

      $escaped = false;
      $j = $i - 1;
      while ($j >= 0 && $sql[$j] === "\\") {
        $escaped = !$escaped;
        $j--;
      }
      if (!$escaped) {
        $in_string = false;
        $string_char = '';
      }
    }
  }


  if ($char === ';' && !$in_string) {
    $stmt = trim($buffer);
    if ($stmt !== '') {
      $statements[] = $stmt;
    }
    $buffer = '';
  }
}

$rest = trim($buffer);
if ($rest !== '')
  $statements[] = $rest;


$errors = [];
$successCount = 0;
$total = count($statements);

foreach ($statements as $idx => $statement) {

  if (preg_match('/^\s*(?:--|#|\/\*)/', $statement))
    continue;

  if (!$mysqli->query($statement)) {
    $errors[] = [
      'index' => $idx + 1,
      'error' => $mysqli->error,
      'errno' => $mysqli->errno,
      'sql' => mb_strimwidth($statement, 0, 500, '...')
    ];
  } else {
    $successCount++;

    while ($mysqli->more_results() && $mysqli->next_result()) {
      $res = $mysqli->store_result();
      if ($res instanceof mysqli_result)
        $res->free();
    }
  }
}


echo "<p>Errores: " . count($errors) . "</p>";

if (count($errors) > 0) {
  echo "<h3>Errores detallados:</h3><ul>";
  foreach ($errors as $e) {
    echo "<li><strong>Consulta #{$e['index']} (errno {$e['errno']}):</strong> " . htmlspecialchars($e['error']) .
      "<br><code>" . htmlspecialchars($e['sql']) . "</code></li>";
  }
  echo "</ul>";
} else {
  echo "<h2 id='bbdd'>BBDD resetada y recreada correctamente.</h2>";
}

$mysqli->close();
