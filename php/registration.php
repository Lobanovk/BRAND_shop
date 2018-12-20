<?php
include 'config.php';


$email =$_POST[email];
$password = $_POST[password];
$username =  $_POST[username];
$credit_card = $_POST[credit_card];
$gender = (int) $_POST[gender];

$sql = "INSERT INTO users (email, password, username, credit_card, gender) VALUES ('$email','".md5($password)."','$username', '$credit_card' , $gender)";

if (mysqli_query($connect, $sql)){
    echo 'Отзыв добавлен';
} else {
    echo 'Произошла ошибка на сервере';
}