<?php
//Файл констант
define('TEMPLATES_DIR', dirname(__DIR__) . '/templates/');
define('LAYOUTS_DIR', 'layouts/');

include "db.php";

//Тут же подключим основные функции-модули нашего приложения
require_once dirname(__DIR__) . "/engine/functions.php";
require_once dirname(__DIR__) . "/engine/log.php";
require_once dirname(__DIR__) . "/engine/db.php";
require_once dirname(__DIR__) . "/engine/news.php";
require_once dirname(__DIR__) . "/engine/gallery.php";
require_once dirname(__DIR__) . "/engine/feedback.php";
require_once dirname(__DIR__) . "/engine/calc.php";
require_once dirname(__DIR__) . "/engine/catalog.php";