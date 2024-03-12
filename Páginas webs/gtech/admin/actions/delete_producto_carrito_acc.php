<?php 

require_once "../../function/autoload.php";

$id = $_GET['id'] ?? FALSE;

(new Carrito())->borrarProducto($id);
header("Location: ../../index.php?seccion=carrito");