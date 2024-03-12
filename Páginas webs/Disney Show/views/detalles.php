<?php
require_once "class/Clases.php";
$idSeleccionada = isset($_GET['id']) ? $_GET['id'] : false;
$catalogo = new Clases();
$detalles = $catalogo->producto_x_id($idSeleccionada);
?>

<h1 class="text-center my-5 fw-bold">Detalles del Producto</h1>
<div class="row">
<?php if (isset($detalles)) { ?>
    <h1 class="text-center my-5"> <?= $detalles->titulo; ?> (<?= $detalles->anio; ?>)</h1>
    <div class="col">
            <div class="card mb-5">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img src="images/<?= $detalles->portada; ?>" class="img-fluid rounded-start border-end" alt="Portada de <?= $detalles->titulo; ?>">
                    </div>
                    <div class="col-md-7 d-flex flex-column p-3">
                        <div class="card-body flex-grow-0">
                            <h2 class="card-title fs-4 m-0 fw-bold text-primary"><?= $detalles->titulo; ?> (<?= $detalles->anio; ?>)</h2>
                            <p class="card-text text-dark"><?= $detalles->descripcion ?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span class="fw-bold">Genero:</span> <?= $detalles->genero; ?></li>
                            <li class="list-group-item"><span class="fw-bold">Estudio:</span> <?= $detalles->estudio; ?></li>
                        </ul>
                        <div class="card-body flex-grow-0 mt-auto">
                            <div class="fs-3 mb-3 fw-bold text-center text-primary">$<?= $detalles->precio_formateado(); ?></div>
                            <a href="./compra.php" class="btn btn-info w-100 fw-bold text-light">COMPRAR</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php }else{ ?>
    <div class="col">
    <h2 class="text-center m-5">No se encontró el producto deseado.</h2>
</div>
<?php } ?>
</div>