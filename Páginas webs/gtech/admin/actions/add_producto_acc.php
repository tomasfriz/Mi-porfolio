<?php

require_once "../../function/autoload.php";

$producto = $_POST;
$imagenes = $_FILES;


try {


  $imagen_small = (new Imagen())->agregarImagen($imagenes["imagen_small"], __DIR__ . "/../../recursos/imagenes");
  $imagen_big =(new Imagen())->agregarImagen($imagenes["imagen_big"], __DIR__ . "/../../recursos/imagenes");
  (new Productos())->agregar(
    $producto["id_vendedor"],
    empty($producto["id_marca"]) ? null :  $producto["id_marca"],
    $producto["id_categoria"],
    $producto["nombre"],
    $imagen_small,
    $imagen_big,
    $producto["precio"],
    $producto["descripcion"]
  );
  header("Location: ../index.php?seccion=admin_productos");
} catch (Exception $e) {
  die("No se puede agregar el producto");
}
