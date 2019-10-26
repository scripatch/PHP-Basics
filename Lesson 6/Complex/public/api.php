<?php
require_once "../config/db.php";
require_once "../engine/db.php";

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}

switch ($page) {

    case 'apigallery':
        require_once "../engine/gallery.php";
        $params['gallery'] = getGallery();
        break;

    case 'apiimage':
        require_once "../engine/gallery.php";
        $id = $_GET['id'];
        addLike($id);
        $params['image'] = getOneImage($id);
        break;

    case 'apicatalog':
        $params['catalog'] = [
            [
                'name' => 'Пицца',
                'price' => 24
            ],

            [
                'name' => 'Яблоко',
                'price' => 12
            ],
        ];
        break;
}
header('Content-Type: application/json');
echo json_encode($params, JSON_UNESCAPED_UNICODE);
exit;
