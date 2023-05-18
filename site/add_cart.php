<?php
session_start();
$count = $_POST['count'];
$cloth = $_SESSION['id_clothes'];
$size = $_POST['size'];
$id = $_SESSION['id'];
//Connecting to the database
$mysql = new mysqli('localhost', 'root', '', 'uralskraiment');
//Selecting cost of the item from database
$sql = "SELECT * FROM catalog WHERE ID_clothes = '$cloth'";
$result = $mysql->query($sql);
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
        $cost = $row['Cost'];
    }
}
//Calculation of all cost
if ($count <= 0){
    header('Refresh: 0; url= log.php');
    echo '<script language="javascript">';
    echo 'alert("PLEASE ENTER AT LEAST 1 IN THE COUNT FIELD")';
    echo '</script>';
}
elseif($count > 10){
    header('Refresh: 0; url= log.php');
    echo '<script language="javascript">';
    echo 'alert("SORRY YOU CAN ORDER A MAXIMUM OF 10 POSITIONS")';
    echo '</script>';
}
else{
    $cost = (int)$cost * (int)$count;
    //Inserting item's data in to the database
    $sql = "INSERT INTO cart (ID_user, ID_clothes, Size, Count, Cost) VALUES ('$id', '$cloth', '$size', '$count', '$cost')";
    $mysql->query($sql);}
header('Refresh: 0; url= catalog.php');
?>