<?php
require_once "function/autoload.php";

$id = isset($_GET['id']) ? $_GET['id'] : false;

$productos = (new Productos())->producto_x_vendedor($id);
$vendedor = (new Vendedor())->vendedor_x_id($id);

?>

<div id="vendedor" class="d-flex flex-column align-items-center m-auto mt-5 mb-5">
    <?PHP if (isset($vendedor)) { ?>
        <figure class="d-flex justify-content-center align-items-center">
            <img class=" rounded-circle col-8" src="recursos/imagenes/<?= $vendedor->getFoto(); ?>" alt="<?= $vendedor->getNombre() ?>">
        </figure>
        <div class="d-flex flex-column align-items-center justify-conten-evenly">
            <h1 class="text-center col-12 mt-5 mb-5"><?= $vendedor->getNombre(); ?></h1>
            <span class="fs-5 mb-5"><?= $vendedor->getValoracion(); ?></span>
        </div>
        <h2 class="mb-5">Productos que vende</h2>
        <div class="d-flex justify-content-around">
            <div id="productos" class="d-flex flex-wrap justify-content-center">
                <?PHP if (count($productos)) { ?>
                    <?php foreach ($productos as $producto) {
                    ?>

                        <div class="d-flex flex-column align-items-center justify-conten-evenly col-lg-3 col-md-5  col-sm-8">
                            <img src="recursos/imagenes/<?= $producto->getimagen_small(); ?>" alt="<?= $producto->getNombre() ?>">
                            <div class="d-flex flex-column align-items-center justify-conten-end w-100">
                                <h2><?= $producto->recortar_texto(4, $producto->getNombre()); ?></h2>
                                <p><?= $producto->getCategoria(); ?></p>
                                <p><?= $producto->recortar_texto(2, $producto->getDescripcion()); ?></p>
                                <p class="text-start fs-5">$<?= $producto->formatear_precio($producto->getPrecio()) ?></p>
                                <a class="text-center mt-2" href="index.php?seccion=producto&id=<?= $producto->getId() ?>">Ver más</a>
                            </div>
                        </div>
                    <?php }; ?>

                <?PHP }; ?>
            <?PHP }; ?>
            </div>