<?php
include 'config.php';

$email = $_POST[email];
$password = $_POST[password];

$sql = "select * from users where email = '$email' and password = '".md5($password)."'";

$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result)){
//    setcookie('login', $email);
//    setcookie('password', $password);
    echo 1;
} else {
    echo 0;
}