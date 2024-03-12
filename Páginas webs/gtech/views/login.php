<div class="login_front d-flex justify-content-center">
    <div class="col col-md-5">

        <h1 class="text-center mb-5 fw-bold">Inciar Sesión</h1>
        <div>
			<?= (new Alerta())->get_alertas() ?>
		</div>
        <form class="d-flex flex-column align-items-center" action="admin/actions/auth_login.php" method="POST">
            <div class="col-12 mb-3">
                <label for="username" class="form-label">Nombre de Usuario</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="col-12 mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>
</div>