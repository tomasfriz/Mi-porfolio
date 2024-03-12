<?php 

require_once "../../function/autoload.php";


$datos = $_POST["cantidad"];

echo"<pre>";
print_r($datos);
echo"</pre>";

if (!empty($datos) ) {
    (new Carrito())->update_cantidades($datos);
    header('location: ../../index.php?seccion=carrito');
}