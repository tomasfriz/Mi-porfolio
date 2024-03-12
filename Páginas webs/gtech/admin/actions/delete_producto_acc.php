<?php

require_once "../../function/autoload.php";
$id = $_GET['id'] ?? FALSE;
$producto = (new Productos())->producto_x_id($id);


try {
    if (!empty($producto)) {
        if (!empty($producto->getImagen_big()) && !empty($producto->getImagen_small())) {
            (new Imagen())->borrarImagen(__DIR__ . "/../../recursos/imagenes/". $producto->getImagen_small());
            (new Imagen())->borrarImagen(__DIR__ . "/../../recursos/imagenes/". $producto->getImagen_big());
        }
        $producto->eliminarPoducto();
        header("Location: ../index.php?seccion=admin_productos");
    }
} catch (Exception $e) {
    die("No se pudo eliminar el producto");
}