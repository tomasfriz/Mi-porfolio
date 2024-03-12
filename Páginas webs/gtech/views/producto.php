<?php
require_once "function/autoload.php";

$id = isset($_GET['id']) ? $_GET['id'] : false;

$producto = (new Productos())->producto_x_id($id);

?>

<div id="producto" class="d-flex flex-column align-items-center col-6 m-auto mt-5 mb-5">
    <?PHP if (isset($producto)) { ?>
        <figure class="d-flex justify-content-center align-items-center">
            <img  class="col-8" src="recursos/imagenes/<?= $producto->getImagen_big();?>" alt="<?= $producto->getNombre() ?>">
        </figure>
        <div class="d-flex flex-column align-items-center justify-conten-evenly">
            <h1 class="text-center col-12 mt-5 mb-5"><?= $producto->getNombre(); ?></h1>
            <span class="fs-5 mb-5"><?= $producto->getCategoria(); ?></span>
            <span class="fs-5 mb-5"><a href="index.php?seccion=vendedor&id=<?= $producto->getVendedorId();?>"><?= $producto->getVendedor();?></a></span>
            <p class="fs-5"><?= $producto->getDescripcion(); ?></p>
            <p class="fs-1">$<?= $producto->formatear_precio($producto->getPrecio()) ?></p>
            <form action="admin/actions/add_carrito_acc.php" method="get" class="d-flex flex-column align-items-center col-6">
                <input type="number" class="form-control mb-2" value="1" name="cantidad" id="cantidad">
                <button type="submit" value="Comprar" class="btn" >Agregar al carrito</button>
                <input type="hidden" value="<?= $id ?>" name="id" id="id">
            </form>
        </div>
</div>

<?PHP } else { ?>
    <div class="col">
        <h2 class="text-center m-5 text-danger">No se encontró el producto deseado.</h2>
    </div>
<?PHP } ?>
</div>