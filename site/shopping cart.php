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
  ?>
<div class="main">
    <section class="signup">
        <div class="container">
            <div class="signup-content">
     <?php
     //Creating arrays for database data
     $id = array();
     $size = array();
     $count = array();
     $cost = array();
     $cart = array();
     $id_user = $_SESSION["id"];
     $result = $mysql->query("SELECT ID_clothes, Size, Count, Cost, ID_cart FROM cart WHERE ID_user = $id_user AND status = 0" );
     if ($result->num_rows >= 1) {
        while($row = $result->fetch_assoc()){
            //Adding data in arrays
            $id[] = $row['ID_clothes'];
            $size[] = $row['Size'];
            $count[] = $row['Count'];
            $cost[] = $row['Cost'];
            $cart[] = $row['ID_cart'];
            }}
   ?>
   <form action="order.php" method="POST" class="register-form" id="register-form">
    <table width="100%">
    <tr><td colspan="5"><h2 class="form-title">Shopping cart</h2></td></tr>
    <tr><th>ID clothes</th><th>Size</th><th>Count</th><th>Cost</th><th>Remove</th></tr>
    <?php
     //Loop for outputting clothes
     for($i = 0; $i < count($id); $i++):
     ?>
     <?php
        $result = $mysql->query("SELECT Name FROM catalog WHERE ID_clothes = $id[$i]");
        $row = $result->fetch_array()[0];
    ?>
    <tr><td><?php echo "$row"?></td><td><?php echo "$size[$i]"?></td><td><?php echo "$count[$i]"?></td><td><?php echo "$cost[$i]"?></td><td><a href="delete.php?cloth=<?php echo $cart[$i] ?>">DELETE</a></td></tr>
    <?php endfor; ?>
    <tr><td colspan="2"></td><td>All cost:</td><td><?php echo array_sum($cost) ?></td></tr>
    <tr><td colspan="5"><?php
    echo '<input type="submit" name="signup" id="signup" class="form-submit" value="Order"/>';
    ?></td></tr>
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
         <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
     </div>
  </body>
</html>