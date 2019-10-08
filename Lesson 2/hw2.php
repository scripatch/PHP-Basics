<?php

$a = mt_rand(-100,100);
$b = mt_rand(-100,100);


if ($a>=0 && $b>=0) {
  echo "Разность чисел ${a} и ${b} составляет " . mathOperation($a, $b, "-");
}
else if ($a>=0) {
  echo "Сумма чисел ${a} и ${b} составляет " . mathOperation($a, $b, "+");
}
else {
  echo "Произведение чисел ${a} и ${b} составляет " . mathOperation($a, $b, "*"); 
}

echo "<br>";

$a = mt_rand(0,15);
echo "Вывод чисел от ${a} до 15:<br>";
switch ($a) {
  case 0: echo "0<br>";
  case 1: echo "1<br>";
  case 2: echo "2<br>";
  case 3: echo "3<br>";
  case 4: echo "4<br>";
  case 5: echo "5<br>";
  case 6: echo "6<br>";
  case 7: echo "7<br>";
  case 8: echo "8<br>";
  case 9: echo "9<br>";
  case 10: echo "10<br>";
  case 11: echo "11<br>";
  case 12: echo "12<br>";
  case 13: echo "13<br>";
  case 14: echo "14<br>";
  case 15: echo "15<br>";
  default: null;
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
    echo "Ошибка деления на ноль";
    return null;
  }
  return $a / $b;
}

function multiplication($a, $b)
{
  return $a * $b;
}

function mathOperation($a, $b, $operation)
{
  switch($operation) {

    case '+': return addition($a, $b);
    case '-': return subtraction($a, $b);
    case '*': return multiplication($a, $b);
    case '/': return division($a, $b);
    default: return null;

  }

}


function power($val, $pow) {

  if ($pow>0) return $val * power($val, $pow-1);
  else if ($pow < 0) return power($val, $pow+1) / $val;
  else return 1;

}

$pow = mt_rand(-5,5);

echo "Возведение числа ${a} в степень ${pow}: " . power($a, $pow);
