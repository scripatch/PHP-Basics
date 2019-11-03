<?php
function createOrder($name, $phone, $address) {

    $session_id = session_id();

    if (getBasketCount() == 0) return "Корзина пуста. Добавьте сначала товары в корзину";

    $sql = "INSERT INTO `orders`(`session_id`, `status`, `name`, `phone`, `address`) VALUES('{$session_id}', 1, '{$name}', '{$phone}', '{$address}')";

    $result = executeQuery($sql);
    if (mysqli_affected_rows(getDb()) != 1) return "Ошибка записи заказа в базу данных. Обратитесь к администратору сайта";

    session_regenerate_id();

    return "Ваш заказ № " . mysqli_insert_id(getDb()) . " оформлен";

}

function getOrders() {
    $sql = "SELECT orders.id as orders_id, orders.status as orders_status, orders.name as orders_name, orders.phone as orders_phone, orders.address as orders_address,
            goods.id as goods_id, goods.name as goods_name, goods.description as goods_description, goods.price as goods_price 
            FROM orders
                LEFT JOIN basket ON orders.session_id = basket.session_id
                    LEFT JOIN goods ON basket.goods_id = goods.id
            ORDER BY orders_id, goods_id";
    $result = getAssocResult($sql);
    return $result;

}

function checkoutOrder($id) {
    $id = (int) $id;
    if (is_admin()) {

        $sql = "UPDATE orders SET status = 2 WHERE id ={$id}";
        $result = executeQuery($sql);
        if (mysqli_affected_rows(getDb()) != 1) return false;
        return true;

    } else return false;
}

function cancelOrder($id) {
    $id = (int) $id;
    if (is_admin()) {

        $sql = "UPDATE orders SET status = 3 WHERE id ={$id}";
        $result = executeQuery($sql);
        if (mysqli_affected_rows(getDb()) != 1) return false;
        return true;

    } else return false;
}


