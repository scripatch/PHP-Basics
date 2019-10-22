<?php
/* DB config */
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'market');

$db = @mysqli_connect(HOST, USER, PASS, DB) or die("Error: " . mysqli_connect_error());

function uploadDump($db) {
    //Автоматическая загрузка дампа в БД
    $result = mysqli_query($db, "SHOW TABLES FROM " . DB . ";");
    if (mysqli_num_rows($result) === 0) {
        $dump = file_get_contents("test.sql");

        $a = 0;
        while ($b = strpos($dump, ";", $a + 1)) {
            $a = substr($dump, $a + 1, $b - $a);
            mysqli_query($db, $a);
            $a = $b;
        }
        var_dump("Дамп загружен!");
    }
}
