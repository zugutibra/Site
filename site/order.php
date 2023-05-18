<?php
session_start();
$id = $_SESSION['id'];
//Connecting to the database
$mysql = new mysqli('localhost', 'root', '', 'uralskraiment');
if ($mysql->connect_error) {
    //Outputting error
    die("Connection failed: " . $conn->connect_error . "<br>");
}
else{
    //Updating status of the cart
    $sql = "UPDATE cart SET status = '1' WHERE ID_user = $id";
    $mysql->query($sql);
    echo '<script language="javascript">';
    echo 'alert("WE HAVE CONFIRMED YOUR ORDER")';
    echo '</script>';
    header('Refresh: 0; url= main.php');
}
$mysql->close();
?>