
<?php 
require_once "../../function/autoload.php";

(new Carrito())->vaciarCarrito();
header("Location: ../../index.php?seccion=carrito");