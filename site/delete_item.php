<?php
session_start();
$id = $_GET['id'];
$mysql = new mysqli('localhost', 'root', '', 'uralskraiment');
$result = $mysql->query("SELECT img_address FROM catalog WHERE ID_clothes = '$id'");
    if ($result->num_rows == 1) {
        while($row = $result->fetch_assoc()) {
         unlink($row['img_address']);
        }}
$mysql->query("DELETE FROM catalog WHERE ID_clothes = '$id'");
echo '<script language="javascript">';
echo 'alert("Clothes deleted from the catalog")';
echo '</script>';
header('Refresh: 0; url= del_catalog.php');
?>