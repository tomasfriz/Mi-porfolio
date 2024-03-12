<?php

require_once "../../function/autoload.php";

$datos = $_POST;

print_r($datos);
echo password_hash($datos['password'],PASSWORD_DEFAULT);

$login = (new Autenticacion())->login($datos['username'], $datos['password']);

if ($login) {
    if ($login != "usuario") {
        
        header('Location: ../index.php?seccion=dashboard');
    } else {
        header('Location: ../../index.php');
    }
} else {
    header('Location: ../../index.php?seccion=login');
}
