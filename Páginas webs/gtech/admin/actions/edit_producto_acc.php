<?php

require_once "../../function/autoload.php";
$id = $_GET['id'] ?? FALSE;
$producto = $_POST;
$imagenes = $_FILES;

print_r($imagenes["imagen_small"]);

$productoImagen = (new Productos())->producto_x_id($id);

$imagen_small;
$imagen_big;

try {
    if ($imagenes["imagen_small"]["error"] == 0 ) {
        (new Imagen())->borrarImagen(__DIR__ . "/../../recursos/imagenes/" . $productoImagen->getImagen_small());
        (new Imagen())->borrarImagen(__DIR__ . "/../../recursos/imagenes/" . $productoImagen->getImagen_big());
        $imagen_small = (new Imagen())->agregarImagen($imagenes["imagen_small"], __DIR__ . "/../../recursos/imagenes");
        $imagen_big = (new Imagen())->agregarImagen($imagenes["imagen_big"], __DIR__ . "/../../recursos/imagenes");
    } else {

        $imagen_small = $productoImagen->getImagen_small();
        $imagen_big = $productoImagen->getImagen_big();
    }

    (new Productos())->editar(
        $producto["id_vendedor"],
        empty($producto["id_marca"]) ? null :  $producto["id_marca"],
        $producto["id_categoria"],
        $producto["nombre"],
        $imagen_small,
        $imagen_big,
        $producto["precio"],
        $producto["descripcion"],
        $id
    );

    header("Location: ../index.php?seccion=admin_productos");
} catch (Exception $e) {
    die("No se pudo editar el producto");
}
