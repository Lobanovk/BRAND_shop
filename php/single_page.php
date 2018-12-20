<?php
include 'config.php';


$sql = 'SELECT catalog.id, id_goods, name, src, src_mini, genders.gender as gender, price FROM catalog RIGHT JOIN goods
 on goods.id = catalog.id_goods RIGHT JOIN genders on genders.id = catalog.gender where catalog.id ='.$id;

$result = mysqli_query($connect, $sql);

$product = mysqli_fetch_assoc($result);
