<!doctype html>
<html lang="en">
  <head>
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
            <div class="container">
                        <h2 class="form-title" align="center">Adding clothes</h2>
                        <form action="adding.php" method="POST" class="register-form" id="login-form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Name of clothes"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="price" name="price" id="price" pattern="[0-9]{1-20}" placeholder="Price  of clothes"/>
                            </div>
                            <div class="form-button">
                                <input type="file" name="file" id="file">
                            </div>
                            <div class="form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Add clothes"/>
                            </div>
                            <br>
                            <a href="main.php" class="signup-image-link">Main page</a>
                        </form>
                </div>
            </div>
    </div>
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