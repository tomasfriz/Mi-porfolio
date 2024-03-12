<?php

require_once "../function/autoload.php";


$view = $_GET["seccion"] ?? "dashboard";

$whiteList = [
  "dashboard" => [
    "titulo" => "Admin",
    "restringido" => TRUE
  ],
  "admin_productos" => [
    "titulo" => "Admin productos",
    "restringido" => TRUE
  ],
  "add_producto" => [
    "titulo" => "Agregar productos",
    "restringido" => TRUE
  ],
  "edit_producto" => [
    "titulo" => "Editar productos",
    "restringido" => TRUE
  ],
  "delete_producto" => [
    "titulo" => "Borrar productos",
    "restringido" => TRUE
  ],
  "admin_categorias" => [
    "titulo" => "Admin categorias",
    "restringido" => TRUE
  ],
  "admin_vendedores" => [
    "titulo" => "Admin vendedores",
    "restringido" => TRUE
  ],
  "add_vendedor" => [
    "titulo" => "Agregar vendedor",
    "restringido" => TRUE
  ],
  "edit_vendedor" => [
    "titulo" => "Editar vendedor",
    "restringido" => TRUE
  ],
  "delete_vendedor" => [
    "titulo" => "Borrar vendedor",
    "restringido" => TRUE
  ],
  "admin_marcas" => [
    "titulo" => "Admin marcas",
    "restringido" => TRUE
  ],
  "login" => [
    "titulo" => "Login",
    "restringido" => FALSE
    ]
  ];
$vista = "404";
$titulo = "404";
// echo "<pre>";
// print_r($_SESSION["loggedIn"]);
// print_r($_SESSION["loggedIn"]["rol"]);
// echo "</pre>";
if (array_key_exists($view, $whiteList)) {
  
  $vista = $view;
  $titulo = $whiteList[$view]["titulo"];
  if ($whiteList[$view]["restringido"]) {
    if ($_SESSION["loggedIn"]["rol"] != "admin") {
      header('Location: index.php?seccion=login');
    }
    if (!isset($_SESSION["loggedIn"])) {
        header('Location: index.php?seccion=login');
    } 
  }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../estilos.css">
    <link rel="shortcut icon" type="../image/x-png" href="../recursos/imagenes/icon-16.png" />
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
    <script src="../bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>