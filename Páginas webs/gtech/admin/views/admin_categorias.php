<?php
$categorias = (new Categorias())->obtener_categorias();
?>

<div class="row m-0">
    <div class="col">

        <h1 id="admin_titule" class="text-center mb-5 fw-bold">Administración de Categorias</h1>
        <div class="row m-0 mb-5 d-flex justify-content-center">


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Categoria</th>
                        <th scope="col" width="40%">Editar</th>
                        <th scope="col" width="20%">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP foreach ($categorias as $categoria) { ?>
                        <tr>
                            <td><?= $categoria->getId() ?></td>
                            <td><?= $categoria->getCategoria()  ?></td>
                            <td>
                                <form class="col-6" action="actions/edit_categoria_acc.php?id=<?= $categoria->getId()  ?>" method="post">
                                    <input class="form-control" type="text" name="categoria" id="categoria">
                                    <button class="btn w-100 mt-2" type="submit">Editar categoria</button>
                                </form>
                            </td>
                            <td>
                                <a href="actions/delete_categoria_acc.php?id=<?= $categoria->getId() ?>" role="button" class="d-block btn btn-sm ">Eliminar</a>
                            </td>
                        </tr>
                    <?PHP } ?>
                </tbody>
            </table>
            <form class="col-6" action="actions/add_categoria_acc.php" method="post">
                <label class="form-label" for="categoria">Categoria</label>
                <input class="form-control" type="text" name="categoria" id="categoria">
                <button class="btn d-block m-auto mt-2" type="submit">Agregar categoria</button>
            </form>
        </div>


    </div>
</div>