<?php
//Файл констант
define("TEMPLATES_DIR", '../views/');
define("LAYOUTS_DIR", 'layout/');
define("ENGINE_DIR", '../engine/');


/* DB config */
define('HOST', 'db');
define('USER', 'local');
define('PASS', 'local');
define('DB', 'local');

const ERR_CODE = [
    null => "",
    "OK" => "Отзыв добавлен!",
    "DELETED" => "Отзыв удален!",
    "ERROR_ADD" => "Ошибка добавления отзыва!",
    "ERROR_DEL" => "Ошибка удаления отзыва!",
    "ERROR_UPDATE" => "Ошибка изменения отзыва!",
    "UPDATED" => "Отзыв изменен!"
];

const ORDER_STATUS = [
    1 => "Новый",
    2 => "Оформлен",
    3 => "Отменен"
];

//Тут же подключим основные функции нашего приложения, пока это render
//Можете кстати подключить и в главном index.php если такая вложенность напрягает
include_once "../engine/lib_autoload.php";

