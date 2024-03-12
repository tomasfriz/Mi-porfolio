<?PHP
require_once "../../function/autoload.php";


(new Autenticacion())->logout();
header('location: ../../index.php?seccion=login');
