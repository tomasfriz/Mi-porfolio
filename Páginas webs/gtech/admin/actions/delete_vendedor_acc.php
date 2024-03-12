<?php

require_once "../../function/autoload.php";
$id = $_GET['id'] ?? FALSE;
$vendedor = (new Vendedor())->vendedor_x_id($id);


try {
    if (!empty($vendedor)) {
        if (!empty($vendedor->getFoto())) {
            (new Imagen())->borrarImagen(__DIR__ . "/../../recursos/imagenes/". $vendedor->getFoto());
        }
        $vendedor->eliminarVendedor();
    }
    header("Location: ../index.php?seccion=admin_vendedores");
} catch (Exception $e) {
    die("No se pudo eliminar el Vendedor");
}