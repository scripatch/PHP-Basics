<?php
function getBasket() {
    $session_id = session_id();
    $sql ="";
    return $result;
}

function getBasketCount() {
    //Запрос на количество товаров в корзине
    return 5;
}

function addToBasket($id) {
    $session_id = session_id();
    //Помещаем товар id в корзину, по сесси
}