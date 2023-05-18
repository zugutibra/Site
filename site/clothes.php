<!doctype html>
<html lang="en">
  <head>
      <title>uralskraiment</title>
    <meta charset="utf-8">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
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
          font-size: 3.5rem;}
      }
      p{
      font-size: 20px;}img{
      border-color: #9370d8}
      .featurette-divider{
      border-color:#9370d8}
      </style>
  </head>
  <body>
  <?php session_start();
  $_SESSION['id_clothes'] = $_GET['id'];
  ?>
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
  ?>
<div class="main">
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Clothes</h2>
                    <form action="add_cart.php" method="POST" class="register-form" id="register-form">
                        <p>Choose the size</p><br>
                        <div class="form-group">
                            <input type="radio" name="size" value="S" checked>
                            <label for="S"><i class="zmdi zmdi-account material-icons-name">S</i></label>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="size" value="M">
                            <label for="M"><i class="zmdi zmdi-account material-icons-name">M</i></label>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="size" value="L">
                            <label for="L"><i class="zmdi zmdi-account material-icons-name">L</i></label>
                        </div>
                        <div class="form-group">
                            <label for="count"><i class="zmdi zmdi-email"></i></label>
                            <input type="text" name="count" id="count" placeholder="Count" value="1"/>
                        </div>
                        <div class="form-group form-button">
                        <?php
                            if (isset($_SESSION['name']))
                                echo '<input type="submit" name="signup" id="signup" class="form-submit" value="Add to cart"/>';
                            else
                                echo '<p>please firstly sign in to add items in your cart</p>'
                            ?>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="<?php echo $_GET['loc'] ?>" alt=""></figure>
                    <p><?php echo $_GET['cost'] ?> tenge</p>
                </div>
            </div>
        </div>
    </section>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <div class="footer-basic">
        <?php require "footer.php" ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</main>
     <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>