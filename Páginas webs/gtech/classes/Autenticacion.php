<?php

class Autenticacion
{
    public function login(string $usuario, string $password)
    {

        $datos = (new Usuarios())->usuario_x_username($usuario);

        if ($datos) {
            if (password_verify($password, $datos->getPassword())) {
                $datosLogin['username'] = $datos->getNombre_usuario();
                $datosLogin['id'] = $datos->getId();
                $datosLogin['rol'] = $datos->getRol();
                $_SESSION['loggedIn'] = $datosLogin;
                return $datosLogin['rol'];
            } else {
                (new Alerta())->add_alerta('danger', "Contraseña incorrecta");
                return null;
            }
        } else {
            (new Alerta())->add_alerta('warning', "Usuario inexistente");
            return null;
        }
    }



    public function logout()
    {
        if (isset($_SESSION['loggedIn'])) {
            unset($_SESSION['loggedIn']);
        };
    }



    public function verificar(string $rol)
    {
        if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']["rol"] = "admin") {
            return TRUE;
        } 
    }
}
