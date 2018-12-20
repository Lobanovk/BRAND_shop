<?php

include 'config.php';


$id = (int)($_POST[id]);
$name = strip_tags($_POST[name]);
$review = strip_tags($_POST[message]);

$sql = "insert into reviews(id_catalog, name, review) values ($id,'$name' ,'$review')";
if (mysqli_query($connect, $sql)){
    echo 'Отзыв добавлен';
} else {
    echo 'Произошла ошибка на сервере';
}


