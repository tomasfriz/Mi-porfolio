<?php 
function autoload($class){
$classes = __DIR__ . "/../classes/$class.php";
if (file_exists($classes)) {
    require_once $classes;
}
}
spl_autoload_register("autoload");
session_start();

function recortar_texto(int $cantidad = 10, $variable): string
    {
        $texto = $variable;
        $array = explode(" ", $texto);
        $resultado = "";
        if (count($array) <= $cantidad) {
            $resultado = $texto;
        } else {
            array_splice($array, $cantidad);
            $resultado = implode(" ", $array) . "...";
        }
        return $resultado;
    }