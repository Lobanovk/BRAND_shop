<?php

include 'config.php';

$id = (int)($_POST[id]);

$sql = "SELECT * FROM `reviews` WHERE id_catalog = $id";

$result = mysqli_query($connect, $sql);

while ($review = mysqli_fetch_assoc($result)) {
    echo "<div>
<h5>$review[name]</h5>
<p>$review[review]</p>
</div>";
}