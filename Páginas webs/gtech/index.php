<?php

require_once "function/autoload.php";

$view = $_GET["seccion"] ?? "home";


$whiteList = [
    "home" => [
        "titulo" => "Gtech"
    ],
    "componentes" => [
        "titulo" => "Componentes"
    ],
    "perifericos" => [
        "titulo" => "Perifericos",
    ],
    "todos_productos" => [
        "titulo" => "Productos",
    ],
    "producto" => [
        "titulo" => "Producto",
    ],
    "about_us" => [
        "titulo" => "¿Quienes somos?"
    ],
    "vendedor" => [
        "titulo" => "Vendedor"
    ],
    "contactanos" => [
        "titulo" => "Contáctanos"
    ],
    "datos_formulario" => [
        "titulo" => "Datos usuario"
    ],
    "carrito" => [
        "titulo" => "carrito"
    ],
    "login" => [
        "titulo" => "Login"
    ],
    "comprado" => [
        "titulo" => "Comprado"
    ]
];
$vista = "404";
$titulo = "404";
if (array_key_exists($view, $whiteList)) {

    $vista = $view;
    $titulo = $whiteList[$view]["titulo"];
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
    <link rel="shortcut icon" type="image/x-png" href="recursos/imagenes/icon-16.png" />
    <title><?= ucwords(str_replace("_", " ", $titulo)) ?></title>
</head>

<body>
    <header>
        <?php require_once "views/nav.php" ?>
    </header>
    <main>
        <?php
        file_exists("views/$view.php")
            ? require_once "views/$view.php"
            : require_once "views/404.php" ?>
    </main>
    <footer class="d-flex align-items-center justify-content-center">
        <p class="text-center text-light">copyright&copy;2023-GTECH / hecho por Sebatian Loria y Tomas Friz</p>
    </footer>
    <script src="bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>