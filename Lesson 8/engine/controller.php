<?php

//Файл с функциями нашего движка

/*
 * Функция подготовки переменных для передачи их в шаблон
 */
function prepareVariables($page, $action, $id)
{
//Для каждой страницы готовим массив со своим набором переменных
//для подстановки их в соотвествующий шаблон
    $params = ["count" => getBasketCount()];

    if (is_auth()) {
        $params['allow'] = true;
        $params['user'] = get_user();
    } else {
        $params['allow'] = false;
        $params['user'] = false;
    }


    switch ($page) {

        case 'auth':
            if ($action == "login") {
                if (isset($_POST['send'])) {
                    $login = $_POST['login'];
                    $pass = $_POST['pass'];

                    if (!auth($login, $pass)) {
                        Die('Не верный логин пароль');
                    } else {
                        if (isset($_POST['save'])) {
                            saveCredentials();
                        }

                        header("Location: " . $_POST['redirect']);
                    }
                }
                exit;
            }

            if ($action == 'logout') {
                session_destroy();
                setcookie("hash");
                header("Location: " . $_GET['redirect']);
                exit;
            }

            exit;
            break;


        //api/buy/5
        case 'api':
            if ($action == "buy") {
                if (addToBasket($id)) {
                    echo json_encode(["result" => 1, "count" => getBasketCount()]);
                } else {
                    echo json_encode(["result" => -1]);
                }
                exit;
            }
            if ($action == "delete") {
                if (deleteFromBasket($id)) {
                    echo json_encode([
                        "result" => 1,
                        "count" => getBasketCount(),
                        "sum" => getBasketAmount()]);
                } else {
                    echo json_encode(["result" => -1]);
                }
                exit;
            }
            if ($action == "checkout") {

                if (checkoutOrder($id)) {
                    echo json_encode(["result" => 1]);
                } else
                    echo json_encode(["result" => -11]);
                exit;
            }
            if ($action == "cancel") {
                if (cancelOrder($id)) {
                    echo json_encode(["result" => 1]);
                } else
                    echo json_encode(["result" => -11]);
                exit;
            }
            exit;
            break;

        case 'admin':
            $params['items'] = getOrders();
            break;

        case 'order':
            if (isset($_POST['checkout'])) {
                $params["message"] = createOrder($_POST['name'], $_POST['phone'], $_POST['address']);
            } else {
                $params["message"] = "Ошибка при оформлении заказа. Попробуйте заново.";
            }

            break;

        case 'news':

            $params["news"] = getNews();

            break;

        case 'newspage':

            $content = getNewsContent($id);
            $params['prev'] = $content['prev'];
            $params['text'] = $content['text'];
            break;

        case 'feedback':

            doFeedbackAction($params, $action, $id);

            $params['feedback'] = getAllFeedback();

            break;

        case 'catalog':

            $params['goods'] = getAllGoods();
            break;

        case 'item':
            $params['good'] = getOneGood($id);
            break;

        case 'basket':
            $params['goods'] = getBasket();
            $params['sum'] = getBasketAmount();
            break;
    }

    return $params;
}





