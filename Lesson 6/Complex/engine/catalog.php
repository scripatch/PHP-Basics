<?php
function getCatalog() {
    $sql = "SELECT * FROM `goods`";
    return getAssocResult($sql);
}

function getGoodsItem($id) {
    $id = (int) $id;
    $sql = "SELECT * FROM `goods` WHERE $id = '{$id}';";
    $goods = getAssocResult($sql);
    $result = [];
    if(isset($goods[0]))
        $result = $goods[0];
    return $result;
}