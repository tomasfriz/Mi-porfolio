<?php
require_once "class/Clases.php";
$categoriaSeleccionada = isset($_GET['categoria']) ? $_GET['categoria'] : false;
$catalogo = new Clases();
$serie = $catalogo->catalogo_x_categoria($categoriaSeleccionada);
?>

<h1 class="text-center my-5 fw-bold">Catálogo de <?= $categoriaSeleccionada ?></h1>
<div class="row">
    <?php if( count($serie) ) { ?>
        <?php foreach ($serie as $producto) { ?>
            <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card mb-3">
                <img src="images/<?= $producto->portada; ?>" class="card-img-top" alt="Portada de <?= $producto->titulo; ?>">
                <div class="card-body">
                    <p class="card-title fs-6 m-0 fw-bold text-primary"><?= $producto->titulo; ?> (<?= $producto->anio; ?>)</p>
                    <p class="card-text text-dark"><?= $producto->descripcion_reducida(10); ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><span class="fw-bold">Genero:</span> <?= $producto->genero; ?></li>
                    <li class="list-group-item"><span class="fw-bold">Estudio:</span> <?= $producto->estudio; ?></li>
                </ul>
                <div class="card-body">
                    <div class="fs-3 mb-3 fw-bold text-center text-primary">$<?= $producto->precio_formateado() ?></div>
                    <a href="index.php?sec=detalles&id=<?= $producto->id ?>" class="btn btn-info w-100 fw-bold text-light">VER MAS</a>
                </div>
            </div>
        </div>
        <?php } ?>
    <?php }else {?>
        <h1 class="text-center" >No hay series disponibles</h1>
    <?php }?>
</div>