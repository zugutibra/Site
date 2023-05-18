<?php
session_start();
$flag = 0;
$name = $_POST['your_name'];
$pass = $_POST['your_pass'];
$pass = md5($pass. "asdfghjkkl");
//Connecting to the database
$mysql = new mysqli('localhost', 'root', '', 'uralskraiment');
if ($mysql->connect_error) {
  die("Connection failed: " . $conn->connect_error . "<br>");
}
else{
    //Selecting data from table
    $result = $mysql->query("SELECT * FROM users WHERE Password='$pass' AND Name='$name'");
    if ($result->num_rows == 1) {
        while($row = $result->fetch_assoc()) {
            if ($row['admin'] == '1'){
                $_SESSION["admin"] = $row["Name"];
            }
            else{
            $_SESSION["id"] = $row['ID'];
            $_SESSION["name"] = $row['Name'];
            $flag = 1;
            }
            header('Location: http://localhost/CS%20projects/SITE/carousel/main.php');}
    } elseif ($name == '' or $pass == '') {
           //Output if input data is empty
            header('Refresh: 0; url= log.php');
            echo '<script language="javascript">';
            echo 'alert("PLEASE ENTER LOGIN OR/AND PASSWORD")';
            echo '</script>';

    } else {
           //Output if input data is incorrect
            header('Refresh: 0; url= log.php');
            echo '<script language="javascript">';
            echo 'alert("LOGIN OR/AND PASSWORD ARE INCORRECT")';
            echo '</script>';
            }
        }
    $mysql->close();
?>