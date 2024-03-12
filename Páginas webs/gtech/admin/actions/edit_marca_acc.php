<?php

require_once "../../function/autoload.php";

$marca = $_POST;
$id = $_GET['id'] ?? FALSE;

try {

  (new Marcas())->editar($marca["marca"], $id);
  header("Location: ../index.php?seccion=admin_marcas");
} catch (Exception $e) {
  die("No se puedo editar la Marca");
}
