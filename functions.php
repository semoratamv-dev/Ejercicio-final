<?
require 'config.php';

function getheader()
{
    include 'inc/header.php';
}

function getfooter()
{
    include 'inc/footer.php';
}

function conn()
{

    $conn = new mysqli(SERV, USER, PASS, DBNM);

    if ($conn->connect_error) {
        die("❌ Error de conexión: " . $conn->connect_error);
    }


    $conn->set_charset("utf8mb4");

    return $conn;
}

function consulta($sql)
{
    $conn = conn();

    $result = $conn->query($sql);

    if (!$result) {
        die("❌ Error en la consulta: " . $conn->error);
    }

    $data = [];

    if ($result !== false && $result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    $conn->close();

    return $data;
}

function rellenarSelect($id, $nombre, $tabla)
{
    $sql = "SELECT * FROM $tabla";
    $consulta = consulta($sql);
    if (count($consulta) > 0) {

        foreach ($consulta as $fila) {
            echo "<option value='" . $fila[$id] . "'>" . $fila[$nombre] . "</option>";
        }
    } else {
        echo "<option value=''>No hay opciones disponibles</option>";
    }
}

function borrarRegistro(mysqli $mysqli, string $tabla, $id): bool
{

    $allowed = ['marca', 'zapato', 'talla', 'color', 'categoria', 'para'];
    if (!in_array($tabla, $allowed, true)) {
        return false;
    }

    $col = 'id_' . $tabla;

    try {

        $sql = "DELETE FROM `$tabla` WHERE `$col` = ? LIMIT 1";
        $stmt = $mysqli->prepare($sql);
        if (!$stmt)
            return false;

        $stmt->bind_param('i', $id);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    } catch (mysqli_sql_exception $e) {

        return false;
    }
}

function insertarRegistro(mysqli $mysqli, string $tabla, array $datos): bool
{
    $allowed = ['marca', 'zapato', 'talla', 'color', 'categoria', 'para', 'zapato_talla', 'zapato_marca', 'zapato_color', 'zapato_para'];


    if (!in_array($tabla, $allowed, true)) {
        return false;
    }

    if (empty($datos)) {
        return false;
    }

    $columnasArr = array_keys($datos);
    $columnas = '`' . implode('`, `', $columnasArr) . '`';

    $placeholders = implode(', ', array_fill(0, count($datos), '?'));

    $tipos = "";
    $valores = [];
    foreach ($datos as $valor) {
        $valores[] = $valor;
        if (is_int($valor)) {
            $tipos .= "i";
        } elseif (is_numeric($valor)) {
            $tipos .= "d";
        } else {
            $tipos .= "s";
        }
    }

    $sql = "INSERT INTO `$tabla` ($columnas) VALUES ($placeholders)";

    try {
        $stmt = $mysqli->prepare($sql);
        if (!$stmt) {
            return false;
        }

        $stmt->bind_param($tipos, ...$valores);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    } catch (mysqli_sql_exception $e) {
        return false;
    }
}


function modificarDatosZapato(mysqli $mysqli, string $tabla, $id, $n, $dc, $p, $imag): bool
{
    $allowed = ['zapato'];
    if (!in_array($tabla, $allowed, true)) {
        return false;
    }

    try {

        $sql = "UPDATE `$tabla` SET 
                `nombre_zapato` = ?, 
                `descripcion_zapato` = ?, 
                `precio` = ?, 
                `imagen` = ? 
                WHERE `id_zapato` = ?";

        $stmt = $mysqli->prepare($sql);
        if (!$stmt) {
            return false;
        }

        $stmt->bind_param('ssdsi', $n, $dc, $p, $imag, $id);

        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    } catch (mysqli_sql_exception $e) {

        return false;
    }
}

function fechaAEuropeoConDia($fechaInput, string $locale = 'es_ES'): string
{
    if ($fechaInput instanceof DateTimeInterface) {
        $dt = new DateTimeImmutable($fechaInput->format('Y-m-d H:i:s'), $fechaInput->getTimezone());
    } else {
        $dt = new DateTimeImmutable($fechaInput);
    }

    if (class_exists('IntlDateFormatter')) {
        $fmt = new IntlDateFormatter(
            $locale,
            IntlDateFormatter::NONE,
            IntlDateFormatter::NONE,
            $dt->getTimezone()->getName(),
            IntlDateFormatter::GREGORIAN,
            "EEEE, dd/MM/yyyy"
        );
        $fmt->setLenient(false);
        $resultado = $fmt->format($dt);
        if ($resultado !== false) {
            return mb_convert_case($resultado, MB_CASE_TITLE, "UTF-8");
        }
    }

    $dias = [
        1 => 'Lunes',
        2 => 'Martes',
        3 => 'Miércoles',
        4 => 'Jueves',
        5 => 'Viernes',
        6 => 'Sábado',
        7 => 'Domingo'
    ];

    $nombreDia = $dias[(int) $dt->format('N')];
    $fechaFormateada = $dt->format('d/m/Y');

    return $nombreDia . ', ' . $fechaFormateada;
}
function resetBbDd()
{

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
        echo "<h3>BBDD resetada y recreada correctamente.</h3>";
    }
}