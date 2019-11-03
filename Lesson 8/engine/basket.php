<?php
function getBasket() {
    $session_id = session_id();
    $sql ="SELECT basket.id as basket_id, goods.id as id, goods.name, goods.image, goods.price FROM basket 
            LEFT JOIN goods ON basket.goods_id = goods.id WHERE session_id = '{$session_id}'";
    $result = getAssocResult($sql);

    return $result;
}

function getBasketCount() {
    //Запрос на количество товаров в корзине
    $session_id = session_id();
    $sql ="SELECT COUNT(*) as count FROM basket WHERE `session_id` = '{$session_id}'";
    $result = getAssocResult($sql)[0];

    if (mysqli_affected_rows(getDb()) != 1) return false;
    return $result['count'];
}

function addToBasket($id) {
    $id = (int) $id;
    $session_id = session_id();
    $sql = "INSERT INTO `basket`(`session_id`,`goods_id`) VALUES ('{$session_id}', '{$id}')";
    $result = executeQuery($sql);
    if (mysqli_affected_rows(getDb()) != 1) return false;
    return $result;
}

function deleteFromBasket($id) {
    $id = (int) $id;
    $session_id = session_id();
    $sql = "DELETE FROM `basket` WHERE session_id = '{$session_id}' AND id = '{$id}'";
    $result = executeQuery($sql);
    if (mysqli_affected_rows(getDb()) != 1) return false;
    return $result;

}

function getBasketAmount() {
    //Запрос на количество товаров в корзине
    $session_id = session_id();
    $sql ="SELECT SUM(goods.price) as 'sum' FROM basket LEFT JOIN goods ON basket.goods_id = goods.id WHERE `session_id` = '{$session_id}'";
    $result = getAssocResult($sql)[0];

    if (mysqli_affected_rows(getDb()) != 1) return false;
    return $result['sum'];
}