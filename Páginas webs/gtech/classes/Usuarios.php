<?php

class Usuarios {
    protected $id;
    protected $email;
    protected $nombre_usuario;
    protected $nombre_completo;
    protected $password;
    protected $roles;
    
    public function usuario_x_username(string $nombre_usuario): ?Usuarios 
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM usuario WHERE nombre_usuario = ?";
        $PDOStatement = $conexion->prepare($query); 
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$nombre_usuario]);
        $usuario =  $PDOStatement->fetch();

        if (!$usuario) {
           return null;
        }
        return  $usuario;
    }

    public function getPassword()
    {
        return $this->password;
    }

   
    public function getNombre_usuario()
    {
        return $this->nombre_usuario;
    }

    
    public function getNombre_completo()
    {
        return $this->nombre_completo;
    }

    public function getRol()
    {
        return $this->roles;
    }

   
    public function getEmail()
    {
        return $this->email;
    }

   
    public function getId()
    {
        return $this->id;
    }

}