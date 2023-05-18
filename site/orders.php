<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>uralskraiment</title>
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
          font-size: 3.5rem;
        }
      }
      p{
      font-size: 20px;}
      img{
      border-color: #9370d8}
      .featurette-divider{
      border-color:#9370d8}
      table {
       border: 3px solid grey;
    }
    th {
       border: 3px solid grey;
    }
    td {
       border: 3px solid grey;
    }
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
  ?><?php
    $id = array();
    $id_user = array();
    $price = array();
    $size = array();
    $mysql = new mysqli('localhost', 'root', '', 'uralskraiment');
    $result = $mysql->query("SELECT ID_clothes, ID_user, Size FROM cart WHERE status=1");
    if ($result->num_rows >= 1) {
    while($row = $result->fetch_assoc()){
        //Adding data in arrays
        $id_user[] = $row['ID_user'];
        $id[] = $row['ID_clothes'];
        $size[] = $row['Size'];}}
    $name = array();
    $user = array();
    for($i = 0; $i < count($id_user); $i++):
    $result = $mysql->query("SELECT Name, Cost FROM catalog WHERE ID_clothes=$id[$i]");
    if ($result->num_rows >= 1) {
    while($row = $result->fetch_assoc()){
        //Adding data in arrays
        $name[] = $row['Name'];
        $price[] = $row['Cost'];
        }}
    endfor;?>
    <?php
    for($i = 0; $i < count($id); $i++):
    $result = $mysql->query("SELECT Name FROM users WHERE ID=$id_user[$i]");
    if ($result->num_rows >= 1) {
    while($row = $result->fetch_assoc()){
        //Adding data in arrays
        $user[] = $row['Name'];}}
    endfor;?>
  <div class="main">
    <section class="signup">
        <div class="container">
            <div class="signup-content">
    <form class="register-form" id="register-form">
    <table width="100%">
    <tr><td colspan="5"><h2 class="form-title">Orders</h2></td></tr>
    <tr><th>Name of item</th><th>Cost</th><th>Size</th><th>Name of user</th><th>Status</th></tr>
    <?php
     //Loop for outputting clothes
     for($i = 0; $i < count($id); $i++):
     ?>
    <tr><td><?php echo $name[$i]?></td><td><?php echo $price[$i]?></td><td><?php echo $size[$i]?></td><td><?php echo $user[1]?></td><td>Confirmed</td></tr>
         <?php endfor; ?>
    </table>
    </div>
    </div>
    </section>
     <div class="container marketing">
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