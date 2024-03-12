<?php 
$productos = (new Productos())->obtener_productos();
?>

<div class="row m-0">
    <div class="col">

        <h1 id="admin_titule" class="text-center mb-5 fw-bold">Administración de Productos</h1>
        <div class="row m-0 mb-5 d-flex justify-content-center">


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">imagen_small</th>
                        <th scope="col">imagen_big</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Vendedor</th>
                        <th scope="col">Precio</th>
                        <th scope="col" width="15%">Descripcion</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP foreach ($productos as $producto) { ?>
                        <tr>
                            <td><?= $producto->getId() ?></td>
                            <td><img src="../recursos/imagenes/<?= $producto->getimagen_small() ?>" alt=" Imagen Chica de <?= $producto->getNombre() ?>" class="img-fluid rounded shadow-sm"></td>
                            <td><img src="../recursos/imagenes/<?= $producto->getimagen_big() ?>" alt=" Imagen Grande de <?= $producto->getNombre() ?>" class="img-fluid rounded shadow-sm"></td>
                            <td><?= $producto->recortar_texto(10,$producto->getNombre())?></td>
                            <td><?= $producto->getMarca() ?></td>
                            <td><?= $producto->getCategoria() ?></td>
                            <td><?= $producto->getVendedor()  ?></td>
                            <td> <?="$" . $producto->formatear_precio($producto->getPrecio()) ?></td>
                            <td><?= $producto->recortar_texto(10,$producto->getDescripcion()) ?></td>
                            <td>
                                <a href="index.php?seccion=edit_producto&id=<?= $producto->getId() ?>" role="button" class="d-block btn btn-sm  mb-1">Editar</a>
                                <a href="index.php?seccion=delete_producto&id=<?= $producto->getId() ?>" role="button" class="d-block btn btn-sm ">Eliminar</a>
                            </td>
                        </tr>
                    <?PHP } ?>
                </tbody>
            </table>

            <a href="index.php?seccion=add_producto" class="d-block btn btn-lg mt-5"> Sumar nuevo producto</a>
        </div>


    </div>
</div>