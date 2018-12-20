<?php
include 'config.php';

$sql = "SELECT catalog.id, id_goods, name, src, src_mini, genders.gender as gender, price FROM catalog RIGHT JOIN goods
 on goods.id = catalog.id_goods RIGHT JOIN genders on genders.id = catalog.gender where catalog.gender = 1";

$result = mysqli_query($connect, $sql);

while ($info = mysqli_fetch_assoc($result)) {
    echo "<div class=\"parent-product\">
<a href=\"single_page.php?id=$info[id]\" class=\"product\"><img class=\"img\" src=\"$info[src]\"></a>
<div class=\"product-info special-color-p-product\"><p>Mango People T-shirt</p><span>$$info[price].00</span></div>
<div class=\"parent-add-cart\"><div class=\"active-link\" data-id=\"$info[id]\" data-name=\"$info[name]\" data-price=\"$info[price]\" data-srcmini=\"$info[src_mini]\">
<img src=\"img/cart-white.svg\"><span>Add to Cart</span></div>
<div class=\"flex-svg-item\">
<div class=\"active-link special-style\">
<img src=\"img/change.svg\"></div>
<div class=\"active-link special-style\">
<img src=\"img/Like.svg\"></div></div></div></div>";
}