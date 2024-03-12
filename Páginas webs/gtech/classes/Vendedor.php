<?php 

class Vendedor {
    protected $id;
    protected $nombre;
    protected $foto_perfil;
    protected $valoracion;

    public function agregar($nombre, $foto_perfil, $valoracion)
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO vendedor VALUES (NULL,:nombre, :foto_perfil, :valoracion)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'nombre' => $nombre,
                'foto_perfil' => $foto_perfil,
                'valoracion' => $valoracion,
            ]
        );
    }

    
    public function editar($nombre, $foto_perfil, $valoracion, $id)
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE `vendedor` SET `nombre` = '$nombre', `foto_perfil` = '$foto_perfil', `valoracion` = '$valoracion' WHERE `vendedor`.`id` = '$id'";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
    }

    public function eliminarVendedor() {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM `vendedor` WHERE id = ?;";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }


    public function datosVendedor() : array{
        $vendedores = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * from vendedor";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $vendedores = $PDOStatement->fetchAll();
        return $vendedores;
    }

    public function vendedor_x_id(int $id) : Vendedor {
        $vendedor = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM vendedor WHERE id = $id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $vendedor = $PDOStatement->fetch();

        if (!$vendedor) {
            return null;
        }
        return $vendedor;
    }

public function getId() {
    return $this->id;
}

public function getNombre() {
    return $this->nombre;
}

public function getFoto() {
    return $this->foto_perfil;
}

public function getValoracion() {
    return $this->valoracion;
}

}