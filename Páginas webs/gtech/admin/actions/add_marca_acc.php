<?php

require_once "../../function/autoload.php";

$marca = $_POST;

try {

  (new Marcas())->agregar( $marca["marca"] );
  header("Location: ../index.php?seccion=admin_marcas");
} catch (Exception $e) {
  die("No se puede agregar la Marca");
}
