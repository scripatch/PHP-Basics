<?php

echo renderTemplate('layout', renderTemplate('catalog'));

function renderTemplate($page, $content = '')
{
    ob_start();
    include "./templates/{$page}.php";
    return ob_get_clean();
}
