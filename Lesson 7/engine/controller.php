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
    /*
    if (is_auth()) {
        $params['allow'] = true;
        $params['user'] = get_user();
    }
*/


    switch ($page) {

        case 'auth':
            if ($action == "login") {
                if (isset($_GET['send'])) {
                    $login = $_GET['login'];
                    $pass = $_GET['pass'];

                    if (!auth($login, $pass)) {
                        Die('Не верный логин пароль');
                    } else {
                        if (isset($_GET['save'])) {
                            $hash = uniqid(rand(), true);
                            $db = get_db();
                            $id = mysqli_real_escape_string($db, strip_tags(stripslashes($_SESSION['id'])));
                            $sql = "UPDATE `users` SET `hash` = '{$hash}' WHERE `users`.`id` = {$id}";
                            $result = mysqli_query($db, $sql);
                            setcookie("hash", $hash, time() + 3600);

                        }
                        $allow = true;
                        $user = get_user();


                    }
                }
                exit;
            }

            break;

        case 'logout':
            session_destroy();
            setcookie("hash");
            header("Location: /");
            break;

        //api/buy/5
        case 'api':
            if ($action == "buy") {
               //addToBasket($id);
                //var_dump($id);
                echo json_encode(["result" => 1, "count" => getBasketCount()]);
                exit;
            }
            if ($action == "delete") {
                //deleteFromBasket($id);

                echo json_encode(["result" => 1, "count" => getBasketCount()]);
                exit;
                }


        case 'news':

            $params["news"] = getNews();

            break;

        case 'newspage':
            //пример асинхронного обработчика лайков к новостям
            if ($action=="addlike") {
                //обращаемся к модели и ставим лайк
                $result = addNewsLike($id);
                echo json_encode(["result" => $result]);
            }

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
            $params['good'] = getBasket();
            break;
    }

    return $params;
}





