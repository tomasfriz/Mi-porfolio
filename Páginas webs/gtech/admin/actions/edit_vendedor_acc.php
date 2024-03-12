<?php

require_once "../../function/autoload.php";
$id = $_GET['id'] ?? FALSE;

$datos = $_POST;
$imagen = $_FILES["foto_perfil"];

$vendedorImagen = (new Vendedor())->vendedor_x_id($id);

try {
  if ($imagen["error"] == 0 ) {
    (new Imagen())->borrarImagen(__DIR__ . "/../../recursos/imagenes/". $vendedorImagen->getFoto());
    $foto_perfil = (new Imagen())->agregarImagen($imagen, __DIR__ . "/../../recursos/imagenes");
} else {
  $foto_perfil = $vendedorImagen->getFoto();
}
  (new Vendedor())->editar($datos["nombre"], $foto_perfil, $datos["valoracion"], $id  );
  header("Location: ../index.php?seccion=admin_vendedores");
} catch (Exception $e) {
    die("No se pudo editar el Vendedor");
}