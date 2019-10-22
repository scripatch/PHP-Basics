<?php

include_once "../db.php";

uploadDump($db);

$id = (int)$_GET["id"];

$result = @mysqli_query($db, "SELECT * FROM `images` WHERE id = {$id}");

if ($result->num_rows != 0) {
    $row = @mysqli_fetch_assoc($result);
} else echo "Пусто";


echo "<img src='./gallery_img/big/{$row['name']}' alt='big_img'>";

