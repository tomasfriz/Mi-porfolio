<?php

require_once "../../function/autoload.php";

$id = $_GET['id'] ?? FALSE;
$categoria = (new Categorias())->categoria_x_id($id);

try {

  $categoria->eliminarCategoria();
  header("Location: ../index.php?seccion=admin_categorias");
} catch (Exception $e) {
  die("No se puedo eliminar la Categoria, puede que tenga productos relacionados");
}
