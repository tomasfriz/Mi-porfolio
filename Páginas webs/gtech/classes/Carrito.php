<?php

class Carrito{
    public function agregarProducto(int $id, int $cantidad)
    {
        $producto = (new Productos())->producto_x_id($id);
        if ($producto) {
            $_SESSION["carrito"][$id] = [
                'imagen' => $producto->getImagen_small(),
                'nombre' => $producto->getNombre(),
                'precio' => $producto->getPrecio(),
                'cantidad' => $cantidad
            ];
        }
    }
  
    public function vaciarCarrito()
    {
        $_SESSION['carrito'] = [];
    }
    
    public function get_carrito()
    {
        if (!empty($_SESSION['carrito'])) {
            return $_SESSION['carrito'];
        } else {
            return [];
        }
    }
    
    public function total(){
        $total = 0;
        if( $_SESSION["carrito"] ){
            foreach($_SESSION["carrito"] as $item){
                $total += $item["precio"] * $item["cantidad"];
            }
        }
        return $total;
    }
    
    public function update_cantidades($cantidades){
        foreach( $cantidades as $id => $cantidad ){
            if( isset($_SESSION["carrito"][$id]) ){
                $_SESSION["carrito"][$id]["cantidad"] = $cantidad;
            }  
        }
    }
   
    public function borrarProducto(int $id)
    {
        if (isset($_SESSION["carrito"][$id])) {
            unset($_SESSION["carrito"][$id]);
        }
    }
}