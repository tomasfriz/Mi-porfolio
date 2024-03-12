<?php

$productos = (new Carrito())->get_carrito()

?>

<h1 id="carrito" class="text-center fs-2 mt-5"> Carrito de Compras</h1>
<div class="container mt-5">
    <?PHP if (count($productos)) { ?>

        <form action="admin/actions/update_cantidad_acc.php" method="POST">
            <?PHP foreach ($productos as $key => $producto) { ?>
                <div class="producto d-flex justify-content-between align-items-center">
                    <img class="ms-5" src="recursos/imagenes/<?= $producto["imagen"] ?>" alt="<?= $producto["nombre"] ?>">
                    <h2 class="m-0 fs-4"><a href="index.php?seccion=producto&id=<?= $key ?>" class="text-dark"><?= recortar_texto(4, $producto["nombre"]) ?></a></h2>
                    <span>$ <?= number_format($producto["precio"], 2, ",", ".") ?></span>
                    <input type="number" class="form-control" value="<?= $producto["cantidad"] ?>" name="cantidad[<?= $key ?>]" id="cantidad_<?= $key ?>">
                    <a href="admin/actions/delete_producto_carrito_acc.php?id=<?= $key ?>" role="button" class="me-5 btn btn-danger">Eliminar</a>
                </div>

            <?PHP } ?>
            <div class="d-flex justify-content-end total">
                <span class="p-4 fs-3 me-5">Total:$<?= number_format((new Carrito())->total(), 2, ",", ".") ?></span>
            </div>
            <div class="d-flex justify-content-end gap-2">
                <input type="submit" value="Actualizar Cantidades" class="btn">
                <a href="index.php?seccion=todos_productos" role="button" class=" btn ">Seguir comprando</a>
                <a href="admin/actions/delete_carrito_acc.php" role="button" class="btn ">Vaciar Carrito</a>
                <a href="index.php?seccion=comprado" role="button" class="btn">Finalizar Compra</a>
            </div>
        </form>
    <?PHP } else { ?>
        <h2 id="vacio" class="text-center">Su carrito esta vacio</h2>
    <?PHP } ?>
</div>