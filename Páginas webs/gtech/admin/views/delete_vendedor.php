<?php
require_once "../function/autoload.php";

$id = isset($_GET['id']) ? $_GET['id'] : false;

$vendedor = (new Vendedor())->vendedor_x_id($id);

?>

<div id="perfil" class="d-flex flex-column align-items-center col-6 m-auto mt-5 mb-5">
    <h1 class="text-center col-12 mt-5 mb-5">¿Estas seguro de eliminar este perfil?</h1>
    <?PHP if (isset($vendedor)) { ?>
        <figure class="d-flex justify-content-center align-items-center">
            <img class="col-8" src="../recursos/imagenes/<?= $vendedor->getFoto(); ?>" alt="<?= $vendedor->getNombre() ?>">
        </figure>
        <div class="d-flex flex-column align-items-center justify-conten-evenly">
            <h2 class="text-center col-12 mt-5 mb-5"><?= $vendedor->getNombre(); ?></h2>
            <span class="fs-5 mb-5"><?= $vendedor->getValoracion(); ?></span>
            <a class="text-center mt-2" href="index.php?seccion=admin_vendedores">Cancelar</a>
            <a id="eliminar" class="text-center mt-2" href="actions/delete_vendedor_acc.php?id=<?= $vendedor->getId() ?>">Eliminar</a>
        </div>
</div>
<?PHP } ?>