<?php

class Categorias {
    protected $id;
    protected $categoria;

    public function agregar($categoria)
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO categorias VALUES (NULL, :categoria)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([ "categoria" => $categoria]
        );
    }

    
    public function editar($categoria, $id)
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE `categorias` SET `categoria` = '$categoria' WHERE `categorias`.`id` = '$id'";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
    }

    public function eliminarCategoria() {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM `categorias` WHERE id = ?;";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }

    public function obtener_categorias() : array {
        $categorias = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM categorias";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $categorias = $PDOStatement->fetchAll();
        return $categorias;
    }

    public function categoria_x_id(int $id) : Categorias {
        $categoria = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM categorias WHERE id = $id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $categoria = $PDOStatement->fetch();

        if (!$categoria) {
            return null;
        }
        return $categoria;
    }


    public function categorias_componentes()
    {
        $producto = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM `categorias` WHERE id IN (1,2,3,7,8)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $producto = $PDOStatement->fetchAll();

        if (!$producto) {
            return null;
        }
        return $producto;

    }

    public function categorias_perifericos()
    {
        $producto = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM `categorias` WHERE id IN (4,9)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $producto = $PDOStatement->fetchAll();

        if (!$producto) {
            return null;
        }
        return $producto;

    }
    public function getId() {
        return $this->id;
    }

    public function getCategoria() {
        return $this->categoria;
    }
    
}