<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>uralskraiment</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="icon" href="images/uralskraiment.jpg">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      p{
      font-size: 20px;}
      img{
      border-color: #9370d8}
      .featurette-divider{
      border-color:#9370d8}
      </style>
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>
    <?php session_start(); ?>
<?php
    $flag = 0;
    $mysql = new mysqli('localhost', 'root', '', 'uralskraiment');
     $result = $mysql->query("SELECT * FROM users");
     if ($result->num_rows >= 1) {
        while($row = $result->fetch_assoc()){
            if (isset($_SESSION["name"])){
            $row['Name'] == $_SESSION["name"];
                require "header login.php";
                $flag = 1;
                break;
        }}}
     if ($flag == 0)
         require "header.php";
  ?><main>
  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
	<img src="images/wallpaper.jpg" width="1920">
        <div class="container">
          <div class="carousel-caption text-start">
            <h1 style="color:black">uralskraiment</h1>
            <p style="color:black">Clothes that even your mom will like.</p>
            <?php
                if (!isset($_SESSION['name']) and !isset($_SESSION['admin'])){
                echo '<p><a class="btn btn-lg btn-primary" href="sign_up.php">Sign up</a></p>';
                }
                ?>
          </div>
        </div>
      </div>
      <div class="carousel-item">
	<img src="images/wallpaper2.jpg" width="100%">
	 <div class="container">
          <div class="carousel-caption">
            <h1 style="color:black">Customer care</h1>
            <p style="color:black">Fastest delivery and checkout.</p>
            <p><a class="btn btn-lg btn-primary" href="https://www.instagram.com/uralskraiment/">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
	<img src="images/wallpaper3.jpg" width="100%">
        <div class="container">
          <div class="carousel-caption text-end">
            <h1 style="color:black">Unisex clothes for everyone.</h1>
            <p style="color:black">Cheapest and high quality.</p>
            <p><a class="btn btn-lg btn-primary" href="catalog.php">Browse gallery</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
 <div class="container marketing">
    <div class="row">
    <hr class="featurette-divider">
    <div class="row featurette">
      <div class="col-md-7">
        <h2>Be careless in your dress if you must, but keep a tidy soul.<span class="text-muted">~Mark Twain</span></h2>
        <p class="lead">uralskraiment is a best shop.</p>
      </div>
      <div class="col-md-5">
        <img border="3px" src="images/uralskraiment_3.jpg" height="100px">
      </div>
    </div>
    <hr class="featurette-divider">
    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2>I base most of my fashion sense on what does not itch.<span class="text-muted">~Gilda Radner</span></h2>
        <p class="lead">uralskraiment is a best shop.</p>
      </div>
      <div class="col-md-5 order-md-1">
	 <img border="3px" src="images/uralskraiment_2.jpg">
     </div>
    </div>
    <hr class="featurette-divider">
    <div class="row featurette">
      <div class="col-md-7">
        <h2>Distrust any enterprise that requires new clothes.<span class="text-muted">~Henry David Thoreau, Walden</span></h2>
        <p class="lead">uralskraiment is a best shop.</p>
      </div>
      <div class="col-md-5">
	 <img border="3px" src="images/uralskraiment_1.jpg">
    </div>
    </div>
    <hr class="featurette-divider">
 </div>
    <div class="footer-basic">
      <?php require "footer.php" ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</main>
     <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
