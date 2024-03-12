<?php

require_once "../../function/autoload.php";

$id = $_GET['id'] ?? FALSE;
$marca = (new Marcas())->marca_x_id($id);

try {

  $marca->eliminarMarca();
  header("Location: ../index.php?seccion=admin_marcas");
} catch (Exception $e) {
  die("No se puedo editar la Marca, puede que tenga productos relacionados");
}
