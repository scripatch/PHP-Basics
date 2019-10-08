<?php


echo renderTemplate('layout',renderTemplate('index'));


function renderTemplate($page, $content = '')
{
    ob_start();
    include "./templates/{$page}.php";
    return ob_get_clean();
}
