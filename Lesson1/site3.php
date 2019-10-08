<?php 
$title = "Главная страница - страница обо мне";
$curYear = 2019;
$header = "Информация обо мне";

$html = file_get_contents("site3.tpl");

$html = str_replace("{{ title }}", $title, $html);
$html = str_replace("{{ header }}", $header, $html);
$html = str_replace("{{ curYear }}", $curYear, $html);

echo $html;
