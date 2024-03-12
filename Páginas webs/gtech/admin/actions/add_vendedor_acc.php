<?php

require_once "../../function/autoload.php";

$datos = $_POST;
$imagen = $_FILES["foto_perfil"];


try {


  $foto_perfil = (new Imagen())->agregarImagen($imagen, __DIR__ . "/../../recursos/imagenes");
  (new Vendedor())->agregar($datos["nombre"], $foto_perfil, $datos["valoracion"]  );
  header("Location: ../index.php?seccion=admin_vendedores");
} catch (Exception $e) {
  die("No se puede agregar el Vendedor");
}
