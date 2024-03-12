<?php

require_once "../../function/autoload.php";

$categorias = $_POST;
$id = $_GET['id'] ?? FALSE;

try {

  (new Categorias())->editar($categorias["categoria"], $id);
  header("Location: ../index.php?seccion=admin_categorias");
} catch (Exception $e) {
  die("No se puedo editar la Categoria");
}
