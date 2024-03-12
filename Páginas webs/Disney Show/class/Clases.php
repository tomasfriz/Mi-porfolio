<?php
class Clases{
    /**
     * Atributos de peliculas y nombres
     */
    public $id;
    private $categoria;
    public $titulo;
    public $anio;
    public $genero;
    public $estudio;
    public $descripcion;
    public $portada;
    public $precio;

    /**
     * Hace un get de categoria
     */
    public function get_categoria(){
        echo $this->categoria;
    }

    /**
     * hace un set de categoria
     */
    public function set_categoria($categoria) : bool {
        if( strlen($categoria) > 3 ){
            $this->categoria = $categoria;
            return true;
        }else{
            return false;
        }
    }
    /**
     * Devuelve el nombre completo
     */
    // public function traer_nombre_completo() : string {
    //     return  $this->nombre." Vol: ". $this->volumen." # ".$this->numero;
    // }

    /**
     *  @return Clases[]
     */
    public function traer_catalogo_completo() : array{
        $catalogo = [];
        $JSON = file_get_contents("json/catalogo.json");
        $JSONData = json_decode($JSON);
        foreach( $JSONData as $value ){
            $Clases = new self();
            $Clases->id = $value->id;
            $Clases->categoria = $value->categoria;
            $Clases->titulo = $value->titulo;
            $Clases->anio = $value->anio;
            $Clases->genero = $value->genero;
            $Clases->estudio = $value->estudio;
            $Clases->descripcion = $value->descripcion;
            $Clases->portada = $value->portada;
            $Clases->precio = $value->precio;
            $catalogo[] = $Clases;
        }
        return $catalogo;
    }

    /**
     * Devuelve el catalogo de un categoria en particular
     * @param string $categoria Un string con el nombre del categoria a buscar
     * @return Clases[]
     */
    public function catalogo_x_categoria(string $categoria) : array{
        $resultado = [];
        $catalogo = $this->traer_catalogo_completo();
        foreach( $catalogo as $c ){
            if ( $c->categoria == $categoria ){
                $resultado[] = $c;
            }
        }
        return $resultado;
    }

    /**
     * Devuelve los datos de un producto en particular
     * @param int $idProducto El ID único del producto a mostrar
     */
    public function producto_x_id(int $idProducto){
        $catalogo = $this->traer_catalogo_completo();
        foreach( $catalogo as $p ){
            if ( $p->id == $idProducto ){
                return $p;
            }
        }
        return null;
    }

    /**
     * Devuelve el precio de la unidad, formateado correctamente
     */
    public function precio_formateado(): string
    {
        return number_format($this->precio, 2, ",", ".");
    }

    /**
     * Esta función devuelve las primeras x palabras de un párrafo
     * @param int $cantidad Esta es la cantidad de palabras a extraer (Opcional)
     */
    public function descripcion_reducida(int $cantidad = 10): string
    {
        $texto = $this->descripcion;
        $array = explode(" ", $texto);
        $resultado = "";
        if(count($array) <= $cantidad){
            $resultado = $texto;
        }else{
            array_splice($array, $cantidad);
            $resultado = implode(" ", $array)."...";
        }
        return $resultado;
    }
};