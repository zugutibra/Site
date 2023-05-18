<?php
session_start();
$cloth = $_GET['cloth'];
$mysql = new mysqli('localhost', 'root', '', 'uralskraiment');
$mysql->query("DELETE FROM cart WHERE ID_cart = '$cloth'");
header('Refresh: 0; url= shopping cart.php');
?>