<nav id="front" class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img height="55px" src="recursos/imagenes/logo.png" alt="Logo Gtech"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse align-items-center justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-center" href="index.php?seccion=home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-center" href="index.php?seccion=todos_productos">Productos</a>
          <ul>
            <li><a href="index.php?seccion=componentes">Componentes</a></li>
            <li><a href="index.php?seccion=perifericos">Perifericos</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link text-center" href="index.php?seccion=about_us">¿Quienes somos?</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-center" href="index.php?seccion=contactanos">Contáctanos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-center" href="index.php?seccion=carrito">Carrito</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-center <?= isset($_SESSION["loggedIn"]) ? "d-none" : "" ?>" href="index.php?seccion=login">Login</a>
        </li>
        <li class="nav-item <?= !isset($_SESSION["loggedIn"]) ? "d-none" : "" ?>" href="index.php?seccion=login">
          <a class="nav-link d-inline-block text-center" href="admin/actions/auth_logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>