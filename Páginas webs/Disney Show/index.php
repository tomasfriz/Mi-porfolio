<?php
$seccion = $_GET['sec'] ?? "home";

$list = [
    "home" => [
        "titulo" => "Bienvenidos"
    ],
    "nuestroCatalogo" => [
        "titulo" => "Nuestro Catalogo"
    ],
    "peliculas" => [
        "titulo" => "Nuestras Peliculas"
    ],
    "series" => [
        "titulo" => "Nuestras Series"
    ],
    "quienSoy" => [
        "titulo" => "¿Quien Soy?"
    ],
    "formulario" => [
        "titulo" => "Contactanos"
    ],
    "detalles" => [
        "titulo" => "Detalles Producto"
    ],
];
$vista = "404";
$titulo = "404";
if( array_key_exists($seccion, $list) ){
    $vista = $seccion;
    $titulo = $list[$seccion]["titulo"];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ucwords(str_replace("_", " ", $titulo))  ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="shortcut icon" href="./images/icono.png" type="image/x-icon">
    <link href="./css/styles.css" rel="stylesheet">
</head>

<body>
    <?php require_once "includes/nav.php" ?>
    <main class="container">
        <?php
            file_exists("views/$vista.php")
                ?  require "views/$vista.php"
                :  require "views/404.php"
        ?>
    </main>
    <?php require_once "includes/footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>