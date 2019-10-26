<?php

function calculateAsync($data) {
    if (isset($data->operand1) && isset($data->operand2) && isset($data->action_type)) {
        return json_encode(mathOperation((int) $data->operand1, (int) $data->operand2, $data->action_type),JSON_UNESCAPED_UNICODE);
    }
    return json_encode('error',JSON_UNESCAPED_UNICODE);
}

function calculateSync($action_type, $op1, $op2)
{
    $calcResult = ['operand1' => '', 'operand2' => '', 'action_type' => '', 'result' => ''];
    if (isset($op1) && isset($op2) && isset($action_type)) {
        $calcResult['operand1'] = $op1;
        $calcResult['operand2'] = $op2;
        $calcResult['action_type'] = $action_type;
        $calcResult['result'] = mathOperation((int) $op1, (int) $op2, $action_type);
    }

    return $calcResult;
}


function subtraction($a, $b)
{
    return $a - $b;
}

function addition($a, $b)
{
    return $a + $b;
}

function division($a, $b)
{
    if ($b == 0) {
        return "Ошибка деления на ноль";
    }
    return $a / $b;
}

function multiplication($a, $b)
{
    return $a * $b;
}

function mathOperation($a, $b, $operation)
{
    switch ($operation) {

        case 'add':
            return addition($a, $b);
        case 'subtract':
            return subtraction($a, $b);
        case 'multiply':
            return multiplication($a, $b);
        case 'divide':
            return division($a, $b);
        default:
            return "wrong operation";

    }

}
