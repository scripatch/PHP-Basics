<?php
function getAllFeedback() {
    $sql = "SELECT * FROM `feedback` ORDER BY id DESC";
    return getAssocResult($sql);
}

function doFeedbackAction($action, $id) {
    $feedback = ['messages'=>'', 'result'=>[], 'action_type'=>'add', 'id'=>'', 'buttonName'=>'Добавить', 'name'=>'', 'message'=>''];

    if ($action == "delete") {
        $id = (int) $id;
        $sql = "DELETE FROM `feedback` WHERE id = '{$id}'";
        $result = executeQuery($sql);
        if ($result)
            header('Location: /feedback/?message=2');
        else
            header('Location: /feedback/?message=-1');

        die();
    }
    if ($action == "add") {
        $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(),$_POST['name'])));
        $message = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(),$_POST['message'])));
        $sql = "INSERT INTO `feedback` (`name`, `message`) VALUES ('{$name}', '{$message}');";

        $result = executeQuery($sql);
        if ($result) {
            header('Location: /feedback/?message=1');
        } else {
            header('Location: /feedback/?message=-1');
        }
        die();
    }
    if ($action == "update") {
        $id = (int) $id;
        $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(),$_POST['name'])));
        $message = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(),$_POST['message'])));
        $sql = "UPDATE `feedback` SET `name` = '{$name}', `message` = '{$message}' WHERE `feedback`.`id` = {$id};";
        $result = executeQuery($sql);
        if ($result) {
            header('Location: /feedback/?message=3');
        } else
            header('Location: /feedback/?message=-1');

        die();
    }


    if ($action == "edit") {
        $id = (int) $id;
        $feedback['id'] = $id;
        $sql = "SELECT * FROM `feedback` WHERE id = '{$id}';";
        $result = getAssocResult($sql);
        if(isset($result[0])) {
            $feedback['name'] = $result[0]['name'];
            $feedback['message'] = $result[0]['message'];
            $feedback['buttonName'] = 'Изменить';
            $feedback['action_type'] = 'update';
        }
    }

    if ($_GET['message'] == -1) {$feedback['messages'] = "Ошибка обработки запроса!";}
    if ($_GET['message'] == 1) {$feedback['messages'] = "Отзыв добавлен!";}
    if ($_GET['message'] == 2) {$feedback['messages'] = "Отзыв удален!";}
    if ($_GET['message'] == 3) {$feedback['messages'] = "Отзыв изменен!";}

    $feedback['result'] = getAllFeedback();

    return $feedback;

}