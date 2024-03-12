<?php
require_once "../function/autoload.php";

$id = isset($_GET['id']) ? $_GET['id'] : false;

$producto = (new Productos())->producto_x_id($id);

?>

<div id="producto" class="d-flex flex-column align-items-center col-6 m-auto mt-5 mb-5">
    <h1 class="text-center col-12 mt-5 mb-5">¿Estas seguro de eliminar este producto?</h1>
    <?PHP if (isset($producto)) { ?>
        <figure class="d-flex justify-content-center align-items-center">
            <img class="col-8" src="../recursos/imagenes/<?= $producto->getImagen_big(); ?>" alt="<?= $producto->getNombre() ?>">
        </figure>
        <div class="d-flex flex-column align-items-center justify-conten-evenly">
            <h2 class="text-center col-12 mt-5 mb-5"><?= $producto->getNombre(); ?></h2>
            <span class="fs-5 mb-5"><?= $producto->getCategoria(); ?></span>
            <p class="fs-5"><?= $producto->getDescripcion(); ?></p>
            <p class="fs-1">$<?= $producto->formatear_precio($producto->getPrecio()) ?></p>
            <a class="text-center mt-2" href="index.php?seccion=admin_productos">Cancelar</a>
            <a id="eliminar" class="text-center mt-2" href="actions/delete_producto_acc.php?seccion=producto&id=<?= $producto->getId() ?>">Eliminar</a>
        </div>
</div>
<?PHP } ?>