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
          font-size: 3.5rem;}
      }
      p{
      font-size: 20px;}
      img{
      border-color: #9370d8}
      .featurette-divider{
      border-color:#9370d8}
    </style>
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
<div class="container bootstrap snipets">
  <h2 class="form-title">Catalog</h2>
   <div class="row flow-offset-1">
   <?php
     //Creating arrays for database data
     $id = array();
     $loc = array();
     $name = array();
     $cost = array();
     $mysql = new mysqli('localhost', 'root', '', 'uralskraiment');
     $result = $mysql->query("SELECT * FROM catalog");
     if ($result->num_rows >= 1) {
        while($row = $result->fetch_assoc()){
            //Adding data in arrays
            $id[] = $row['ID_clothes'];
            $loc[] = $row['img_address'];
            $name[] = $row['Name'];
            $cost[] = $row['Cost'];
            }}
   ?>
     <?php
     //Loop for outputting clothes
     for($i = 0; $i < count($loc); $i++):
     ?>
     <div class="col-xs-6 col-md-4">
       <?php
       $_SESSION["clothes"] = $loc[$i];
       ?>
       <div class="product tumbnail thumbnail-3"><a href="clothes.php?loc=<?php echo $loc[$i] ?>&cost=<?php echo $cost[$i] ?>&id=<?php echo $id[$i] ?>"><img src="<?php echo $loc[$i] ?>" width="350" height="350" alt=""></a>
         <div class="caption">
           <h6><a href="clothes.php?loc=<?php echo $loc[$i] ?>&cost=<?php echo $cost[$i] ?>&id=<?php echo $id[$i] ?>"><?php echo $name[$i] ?></a></h6><span class="price">
             </span><span class="price sale"><?php echo $cost[$i]?> tenge</span>
         </div>
       </div>
     </div>
     <?php endfor; ?>
 </div>
</div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript">
</script>
 <div class="container marketing">
<hr class="featurette-divider">
</div>
<div class="footer-basic">
      <?php require "footer.php" ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</div>
    </body>
</html>