<?php

require_once "../function/autoload.php";

$id = $_GET['id'] ?? FALSE;
$producto = (new Productos())->producto_x_id($id);

$categorias = (new Categorias())->obtener_categorias();
$vendedores = (new Vendedor())->datosVendedor();
$marcas = (new Marcas())->obtener_marcas();

?>

<div id="conenedor_formulario" class="row my-5 m-auto">
    <div class="col p-0 flex-column align-items-center">
        <h1 id="admin_titule" class="text-center mb-5 fw-bold">Editar producto <?= $id ?></h1>
        <div class="row m-0 mb-5 d-flex align-items-center">

            <form id="formulario" action="actions/edit_producto_acc.php?id=<?= $producto->getId() ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del producto</label>
                    <input type="text" value="<?= $producto->getNombre() ?>" class="form-control" name="nombre" id="nombre" required>
                </div>
                <div class="d-flex flex-column align-items-center mb-3">
                    <label for="imagen_small" class="w-100 text-start form-label">Imagen chica</label>
                    <input class="form-control" type="file" name="imagen_small" id="imagen_small" accept="image/*">
                    <img class="mw-100" src="../recursos/imagenes/<?= $producto->getimagen_small()?>" alt="<?= $producto->getNombre() ?>">
                </div>
                <div class="d-flex flex-column align-items-center mb-3">
                    <label for="imagen_big" class="w-100 text-start form-label">Imagen grande</label>
                    <input class="form-control" type="file"  name="imagen_big" id="imagen_big" accept="image/*">
                    <img class="mw-100" src="../recursos/imagenes/<?= $producto->getimagen_big()?>" alt="<?= $producto->getNombre() ?>">
                </div>
                <div class="row g-3 mb-3">

                    <div class="col-md-4">
                        <label for="id_categoria" class=" form-label">Categoria</label>
                        <select class="form-select" name="id_categoria" id="id_categoria" required>
                            <option value="" selected disabled>Elija una opción</option>
                            <?PHP foreach ($categorias as $categoria) { ?>
                                <option value="<?= $categoria->getId() ?>" <?= $categoria->getId() == $producto->getCategoriaId() ? "selected" : "" ?>><?= $categoria->getCategoria() ?></option>
                            <?PHP } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="id_vendedor" class="form-label">Vendedor</label>
                        <select class="form-select" name="id_vendedor" id="id_vendedor" required>
                            <option value="" selected disabled>Elija una opción</option>
                            <?PHP foreach ($vendedores as $vendedor) { ?>
                                <option value="<?= $vendedor->getId() ?>" <?= $vendedor->getId() == $producto->getVendedorId() ? "selected" : "" ?>><?= $vendedor->getNombre() ?></option>
                            <?PHP } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="id_marca" class="form-label">Marca</label>
                        <select class="form-select" name="id_marca" id="id_marca" required>
                            <option value="" selected disabled>Elija una opción</option>
                            <?PHP foreach ($marcas as $marca) { ?>
                                <option value="<?= $marca->getId() ?>" <?= $marca->getId() == $producto->getMarcaId() ? "selected" : "" ?>><?= $marca->getNombre() ?></option>
                            <?PHP } ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" name="precio" id="precio" value="<?= $producto->getPrecio() ?>" required>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control"  name="descripcion" id="descripcion" cols="30" rows="10"><?= $producto->getDescripcion() ?></textarea required>
                </div>
                <button type="submit" class="d-block btn mt-5 m-auto"> Editar poducto </button>
            </form>
        </div>
    </div>
        
</div>