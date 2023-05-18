<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="main.php">uralskraiment</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <?php
        if (isset($_SESSION['admin'])){
        echo '<li class="nav-item">
            <a class="nav-link" href="main.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="catalog.php">Catalog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="add_catalog.php">Adding</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="del_catalog.php">Deleting</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="orders.php">Orders</a>
          </li>
        </ul>
	    <a class="btn btn-outline-success" type="submit" href="logout.php">'.$_SESSION["admin"].', Log out</a>';
        }
        else{
        echo '<li class="nav-item">
            <a class="nav-link" href="main.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="catalog.php">Catalog</a>
          </li>
        </ul>
            <a class="btn btn-outline-success" type="submit" href="log.php">Sign in</a>';
        }
        ?>
      </div>
    </div>
  </nav>
</header>