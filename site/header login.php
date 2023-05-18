<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="main.php">uralskraiment</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" href="main.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="catalog.php">Catalog</a>
          </li>
	      <li class="nav-item">
	        <a class="nav-link" href="shopping cart.php">Shopping cart</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="my_acc.php">My account</a>
	      </li>
        </ul>
	<a class="btn btn-outline-success" type="submit" href="logout.php"><?php echo $_SESSION["name"] ?>, Log out</a>
      </div>
    </div>
  </nav>
</header>