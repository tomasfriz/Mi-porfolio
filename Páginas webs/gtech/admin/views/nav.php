<nav id="back" class="navbar navbar-expand-xl bg-body-tertiary mb-5">
  <div class="container-fluid">
    <a class="navbar-brand text-light ms-2" href="index.php?seccion=dashboard">Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item <?= !isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"]["rol"] != "admin" ? "d-none" : "" ?>">
          <a class="nav-link text-center" href="index.php?seccion=admin_productos">Admin productos</a>
        </li>
        <li class="nav-item <?= !isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"]["rol"] != "admin" ? "d-none" : "" ?>">
          <a class="nav-link text-center" href="index.php?seccion=admin_categorias">Admin categorias</a>
        </li>
        <li class="nav-item <?= !isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"]["rol"] != "admin" ? "d-none" : "" ?>">
          <a class="nav-link text-center" href="index.php?seccion=admin_vendedores">Admin vendedores</a>
        </li>
        <li class="nav-item <?= !isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"]["rol"] != "admin" ? "d-none" : "" ?>">
          <a class="nav-link text-center" href="index.php?seccion=admin_marcas">Admin marcas</a>
        </li>
        <li class="nav-item <?= !isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"]["rol"] == "admin" ? "d-none" : "" ?>">
          <a class="nav-link text-center" href="index.php?seccion=login">login</a>
        </li>
        <li class="nav-item <?= !isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"]["rol"] != "admin" ? "d-none" : "" ?>">
          <a class="nav-link text-center" href="actions/auth_logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>