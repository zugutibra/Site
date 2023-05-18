<?php
session_start();
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['pass'];
$re_password = $_POST['re_pass'];
$flag = 0;
$enter = 1;
$password = md5($password. "asdfghjkkl");
$re_password = md5($re_password. "asdfghjkkl");
//Connecting to the database
$mysql = new mysqli('localhost', 'root', '', 'uralskraiment');
//Selecting data from table
$result = $mysql->query("SELECT * FROM users");
//Variables of inserting users data
$sql = "INSERT INTO users (Name, Email, Password) VALUES ('$name', '$email', '$password')";
//Checking that database not empty
if ($result->num_rows > 0) {
    //Loop for comparing database data and user's data
    while($row = $result->fetch_assoc()) {
        if ($row['Name'] == $name or $row['Email'] == $email) {
            $message = 'LOGIN/EMAIL IS BUSY';
            $enter = 0;
            $flag = 1;
            break;
            }
                }
    }
if ($enter == 1){
        if ($password == '' or $name == '' or $email == ''){
            $message = "PLEASE FILL ALL THE FIELDS";
            $flag = 1;
            }
        elseif (strlen($name) < 4){
            $message = "NAME IS TOO SHORT";
            $flag = 1;
        }
        elseif (strlen($password) < 8) {
            //Output if the length of the password is less than 8
            $message = "PASSWORD IS TOO SHORT";
            $flag = 1;
                }
        elseif (!preg_match("#[0-9]+#", $password)) {
            //Output if no number in password
            $message = "PASSWORD MUST INCLUDE AT LEAST ONE NUMBER";
            $flag = 1;
        }

        elseif (!preg_match("#[a-zA-Z]+#", $password)) {
            //Output if no letter in password
            $message = "PASSWORD MUST INCLUDE AT LEAST ONE LETTER";
            $flag = 1;
        }
        elseif ($password != $re_password) {
            //Output if passwords are different
            $message = "PASSWORDS ARE DIFFERENT";
            $flag = 1;
        }
        if ($flag == 0){
            $mysql->query($sql);
            $message = "YOU HAVE JUST SIGNED UP";
            }
            }
echo '<script language="javascript">';
echo 'alert("'.$message.'")';
echo '</script>';
if ($flag == 0){
    header('Refresh: 0; url= log.php');
    }
else{
    header('Refresh: 0; url= sign_up.php');
}
?>