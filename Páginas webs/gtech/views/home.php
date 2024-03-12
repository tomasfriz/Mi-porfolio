<?php
$productos = (new Productos())->obtener_productos();
?>
<section class="banner d-flex justify-content-end align-items-center">
  <h1 class="col-6 text-center">ENCUENTRA LOS COMPONENTES Y ACCESORIOS PARA TU PC DE LA MEJOR CALIDAD AL MEJOR PRECIO</h1>
</section>
<section class="d-flex flex-column align-items-center">
  <h2 class="text-center col-12 mb-5">Productos más comprados</h2>
  <div id="productos" class="d-flex flex-wrap justify-content-center">
    <?php for ($i = 0; $i < 6; $i++) {; ?>
      <div class="d-flex flex-column align-items-center justify-conten-evenly col-lg-3 col-md-5  col-sm-8">
        <img src="recursos/imagenes/<?= $productos[$i]->getimagen_small(); ?>" alt="<?= $productos[$i]->getNombre() ?>">
        <div class="d-flex flex-column align-items-center justify-conten-end w-100">
          <h2><?= $productos[$i]->recortar_texto(4, $productos[$i]->getNombre()); ?></h2>
          <p><?= $productos[$i]->getCategoria(); ?></p>
          <p><?= $productos[$i]->recortar_texto(8, $productos[$i]->getDescripcion()); ?></p>
          <p class="text-start fs-5">$<?= $productos[$i]->formatear_precio($productos[$i]->getPrecio()) ?></p>
          <a class="text-center mt-2" href="index.php?seccion=producto&id=<?= $productos[$i]->getId() ?>">Ver más</a>
        </div>
      </div>
    <?php }; ?>
  </div>
</section>