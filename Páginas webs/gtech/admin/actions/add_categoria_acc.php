<?php

require_once "../../function/autoload.php";

$categoria = $_POST;

try {

  (new Categorias())->agregar( $categoria["categoria"] );
  header("Location: ../index.php?seccion=admin_categorias");
} catch (Exception $e) {
  die("No se puede agregar la Categoria");
}
