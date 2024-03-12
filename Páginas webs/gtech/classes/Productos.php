<?PHP

class Productos
{

    protected $id;
    protected $id_vendedor;
    protected $id_marca;
    protected $id_categoria;
    protected $nombre;
    protected $imagen_small;
    protected $imagen_big;
    protected $precio;
    protected $descripcion;


    public function agregar($id_vendedor, $id_marca, $id_categoria, $nombre, $imagen_small, $imagen_big, $precio, $descripcion)
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO productos VALUES (NULL,:id_vendedor, :id_marca, :id_categoria, :nombre, :imagen_small, :imagen_big, :precio, :descripcion)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'id_vendedor' => $id_vendedor,
                'id_marca' => $id_marca,
                'id_categoria' => $id_categoria,
                'nombre' => $nombre,
                'imagen_small' => $imagen_small,
                'imagen_big' => $imagen_big,
                'precio' => $precio,
                'descripcion' => $descripcion,
            ]
        );
    }


    public function editar($id_vendedor, $id_marca, $id_categoria, $nombre, $imagen_small, $imagen_big, $precio, $descripcion, $id)
    {

        $conexion = Conexion::getConexion();
        $query = "UPDATE `productos` SET `id_vendedor` = '$id_vendedor', `id_marca` = '$id_marca', `id_categoria` = '$id_categoria', `nombre` = '$nombre', `imagen_small` = '$imagen_small', `imagen_big` = '$imagen_big', `precio` = '$precio', `descripcion` = '$descripcion' WHERE `productos`.`id` = '$id'";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
    }

    public function eliminarPoducto()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM `productos` WHERE id = ?;";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }

    public function obtener_productos(): array
    {
        $productos = [];

        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM productos";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $productos =  $PDOStatement->fetchAll();
        return $productos;
    }

    public function producto_x_id(int $id)
    {
        $producto = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM productos WHERE id = $id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $producto = $PDOStatement->fetch();

        if (!$producto) {
            return null;
        }
        return $producto;
    }


    public function producto_x_vendedor(int $vendedor)
    {
        $producto = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM productos WHERE id_vendedor = $vendedor";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $producto = $PDOStatement->fetchAll();

        if (!$producto) {
            return null;
        }
        return $producto;
    }

    public function buscador($buscar)
    {
        $productos = [];
        $query = "SELECT * FROM `productos` WHERE nombre LIKE '%$buscar%'";
        $conexion = Conexion::getConexion();
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $productos = $PDOStatement->fetchAll();
        return $productos;
    }

    public function orden($orden, $ordenar_por, $categoria, $productos)
    {
        if ($productos == "componentes") {

            echo $categoria;
            $catalogo = [];
            $categoria_id = $categoria =! false ? "($categoria)" : "(1,2,3,7,8)";
            $query = "SELECT * FROM `productos` WHERE id_categoria IN $categoria_id ORDER BY $ordenar_por $orden";
            $conexion = (new Conexion())->getConexion();
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute();
            $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
            $catalogo = $PDOStatement->fetchAll();
            return $catalogo;
        } else if ($productos == "perifericos") {
            $catalogo = [];
            $categoria_id = $categoria =! false ? "($categoria)" : "(4,9)";
            $query = "SELECT * FROM `productos` WHERE id_categoria IN $categoria_id ORDER BY $ordenar_por $orden";
            $conexion = (new Conexion())->getConexion();
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute();
            $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
            $catalogo = $PDOStatement->fetchAll();
            return $catalogo;
        } else {
            $catalogo = [];
            if ($categoria) {
                $query = "SELECT * FROM `productos` WHERE id_categoria IN ($categoria) ORDER BY $ordenar_por $orden";
            } else {
                $query = "SELECT * FROM `productos` ORDER BY $ordenar_por $orden ";
            }
            $conexion = (new Conexion())->getConexion();
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute();
            $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
            $catalogo = $PDOStatement->fetchAll();
            return $catalogo;
        }
    }

    public function obtener_componentes()
    {
        $producto = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM `productos` WHERE id_categoria IN (1,2,3,7,8)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $producto = $PDOStatement->fetchAll();

        if (!$producto) {
            return null;
        }
        return $producto;
    }

    public function filtrar_categoria(int $id)
    {
        $producto = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM `productos` WHERE id_categoria = $id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $producto = $PDOStatement->fetchAll();

        if (!$producto) {
            return null;
        }
        return $producto;
    }

    public function filtrar( $marca_id, $categoria_id)
    {
        
        $producto = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM `productos` WHERE id_marca = $marca_id AND id_categoria = $categoria_id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $producto = $PDOStatement->fetchAll();

        if (!$producto) {
            return null;
        }
        return $producto;
    }

    public function obtener_perifericos()
    {
        $producto = [];
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM `productos` WHERE id_categoria IN (4,9)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $producto = $PDOStatement->fetchAll();

        if (!$producto) {
            return null;
        }
        return $producto;
    }

    public function formatear_precio($precio): string
    {
        return number_format($precio, 2, ",", ".");
    }

    public function recortar_texto(int $cantidad = 10, $variable): string
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


    public function getId()
    {
        return $this->id;
    }

    public function getVendedor()
    {
        $vendedor = (new Vendedor())->vendedor_x_id($this->id_vendedor);
        $nombre = $vendedor->getNombre();
        return $nombre;
    }

    public function getVendedorId()
    {
        return $this->id_vendedor;
    }

    public function getMarca()
    {
        if ($this->id_marca == null) {
            return null;
        }
        $marca = (new Marcas())->marca_x_id($this->id_marca);
        $nombre = $marca->getNombre();
        return $nombre;
    }

    public function getMarcaId()
    {
        if ($this->id_marca == null) {
            return null;
        }
        return $this->id_marca;
    }

    public function getCategoria()
    {
        $categoria = (new Categorias())->categoria_x_id($this->id_categoria);
        $nombre = $categoria->getCategoria();
        return $nombre;
    }

    public function getCategoriaId()
    {
        return $this->id_categoria;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getImagen_small()
    {
        return $this->imagen_small;
    }

    public function getImagen_big()
    {
        return $this->imagen_big;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }
}
