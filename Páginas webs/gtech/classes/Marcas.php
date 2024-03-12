<?php 

class Marcas {
    protected $id;
    protected $marca;


    public function agregar($marca)
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO marca VALUES (NULL, :marca)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([ "marca" => $marca]
        );
    }

    
    public function editar($marca, $id)
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE `marca` SET `marca` = '$marca' WHERE `marca`.`id` = '$id'";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
    }

    public function eliminarMarca() {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM `marca` WHERE id = ?;";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }


    public function obtener_marcas() : array{
        $marcas = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM marca";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $marcas = $PDOStatement->fetchAll();
        return $marcas;
    }

    public function obtener_marcas_procesadores() : array{
        $marcas = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM `marca` WHERE marca = 'AMD' OR marca = 'Intel'";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $marcas = $PDOStatement->fetchAll();
        return $marcas;
    }

    public function obtener_marcas_placas_de_video() : array{
        $marcas = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM `marca` WHERE marca = 'AMD' OR marca = 'Nvidia'";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $marcas = $PDOStatement->fetchAll();
        return $marcas;
    }

    public function marca_x_id(int $id) : ?Marcas {
        $marca = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM marca WHERE id = $id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $marca = $PDOStatement->fetch();

        if (!$marca) {
            return null;
        }
        return $marca;
    }

    public function marca_x_categorias(int $id) {
        $marca = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT productos.id_marca,  productos.id_categoria, marca.id , marca.marca AS nombre FROM productos INNER JOIN marca ON productos.id_categoria = $id  AND marca.id = id_marca GROUP BY marca.marca";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $marca = $PDOStatement->fetchAll();

        if (!$marca) {
            return null;
        }
        return $marca;
    }

public function getId() {
    return $this->id;
}

public function getNombre() {
    return $this->marca;
}


}