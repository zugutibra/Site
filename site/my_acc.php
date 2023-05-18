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
                $id_user = $_SESSION["id"];
                $cloth = array();
                $list = array();
                $result = $mysql->query("SELECT u.Name, u.Email, c.ID_clothes, c.Size FROM users u, cart c WHERE ID = $id_user AND c.status = 1");
                if ($result->num_rows >= 1) {
                     while($row = $result->fetch_assoc()){
                     $email = $row['Email'];
                     $name = $row['Name'];
                     $cloth[] = $row['ID_clothes'];
                     $list[] = $row['Size'];
                     }}
                for($i = 0; $i < count($cloth); $i++){
                    $result = $mysql->query("SELECT Name FROM catalog WHERE ID_clothes = $cloth[$i]");
                    if ($result->num_rows >= 1) {
                    while($row = $result->fetch_assoc()){
                    $list[$i] = $row['Name']." (".$list[$i].")";
                    }}}
            ?>
            <table width="100%">
            <tr><td colspan="2"><h2 class="form-title">User info</h2></td></tr>
            <tr><th>Your name:</th><th><?php echo $name ?></th></tr>
            <tr><th>Your e-mail:</th><th><?php echo $email ?></th></tr>
            <tr><th>Your ID:</th><th><?php echo $id_user ?></th></tr>
            <tr><th>Number of your ordered clothes:</th><th><?php echo count($cloth) ?></th></tr>
            <tr align="top"><th>List of clothes:</th><th><?php echo implode("<br>\r\n", $list) ?></th></tr>
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