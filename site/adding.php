<?php
session_start();
$uploadOk = 1;
$name = $_POST['name'];
$price = $_POST['price'];
$admin = $_SESSION['id_admin'];
//Connecting to the database
$mysql = new mysqli('localhost', 'root', '', 'uralskraiment');
$target_dir = "images/cat/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if ($name == '' or $price == ''){
   //Output if fields are empty
  $m = "Please fill all the fields";
$uploadOk = 0;
}
elseif (file_exists($target_file)) {
   //Output if file already exists
  $m = "Sorry, file already exists.";
  $uploadOk = 0;
}
elseif ($_FILES["file"]["size"] > 5000000) {
   //Output if file is too large
  $m = "Sorry, your file is too large.";
  $uploadOk = 0;
}
elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    //Output if file type is incorrect
 $m = "Sorry, only JPG, JPEG, PNG files are allowed.";
  $uploadOk = 0;
}
elseif ($uploadOk == 0) {
   //Output if error occurs
  $m = "Sorry, your file was not uploaded.";
} else {
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
     //Output if file has been uploaded
    $m = "The clothes has been uploaded.";
    $mysql->query("INSERT INTO catalog (Name, Cost, img_address, ID_admin) VALUES ('$name', '$price', '$target_file', '$admin')");
  } else {
       //Output if error occurs
$m = "Sorry, there was an error uploading your file.";
  }}
echo '<script language="javascript">';
echo 'alert("'.$m.'")';
echo '</script>';
header('Refresh: 0; url= main.php');
?>