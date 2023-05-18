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
  <?php
    $name = array();
    $id = array();
    $mysql = new mysqli('localhost', 'root', '', 'uralskraiment');
    $result = $mysql->query("SELECT ID_clothes, Name FROM catalog");
    if ($result->num_rows >= 1) {
    while($row = $result->fetch_assoc()){
        //Adding data in arrays
        $name[] = $row['Name'];
        $id[] = $row['ID_clothes'];}}
    ?>
    <div class="main">
    <section class="signup">
        <div class="container">
            <div class="signup-content">
    <form class="register-form" id="register-form">
    <table width="100%">
    <tr><td colspan="2"><h2 class="form-title">Deleting from catalog</h2></td></tr>
    <tr><th>Name of clothes</th><th>Remove</th></tr>
        <?php
     //Loop for outputting clothes
     for($i = 0; $i < count($name); $i++):
     ?>
    <tr><td><?php echo $name[$i]?></td><td><a href="delete_item.php?id=<?php echo $id[$i] ?>">DELETE</a></td></tr>
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
         <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
     </div>
  </body>
</html>