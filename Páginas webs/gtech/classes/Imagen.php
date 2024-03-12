<?php

class Imagen
{

    public function agregarImagen($archivo, $direccion): string
    {

        if (!empty($archivo["tmp_name"])) {

            $file = explode(".", $archivo["name"]);
            $extension = end($file);
            $file_name = uniqid(true) . ".$extension";
            $fileUpload = move_uploaded_file($archivo["tmp_name"], "$direccion/$file_name");
            if (!$fileUpload) {
                throw new Exception("no se pudo subir las imagenes");
            } else {
                return $file_name;
            }
        }
    }

    public function borrarImagen($archivo): bool
    {
        if (file_exists(($archivo))) {
            $borrarArchivo = unlink($archivo);

            if (!$borrarArchivo) {
                throw new Exception("No se pudo borrar la imagen");
            } else {
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }
}
