<?php

require_once "../../function/autoload.php";

$id = $_GET["id"] ?? FALSE;
$cantidad =  $_GET["cantidad"] ?? 1;

if ($id) {
  (new Carrito())->agregarProducto($id, $cantidad);
}

header("Location: ../../index.php?seccion=carrito");

