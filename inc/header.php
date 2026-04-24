<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= URL ?>assets/css/style.css">


    <title><?= TITLE ?></title>
    <base href="<?= URL ?>">


    <link rel="manifest" href="<?= URL ?>manifest.json">
    <meta name="theme-color" content="#000000">
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('<?= URL ?>sw.js')
                    .then(reg => console.log('Service Worker registrado', reg))
                    .catch(err => console.log('Error al registrar Service Worker', err));
            });
        }
    </script>
</head>

<body>
    <header>

        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>

                <li><a href="<?= URL ?>actualizaciones/menu_crud.php">CRUD</a></li>
            </ul>
        </nav>

    </header>

    <main>