<?php
$i = 0;
echo "<h4>1. Числа от 0 до 100 делящиеся на 3 без остатка:</h4>";
while ($i <= 100) {
    if ($i % 3 == 0) echo $i . "<br>";
    $i++;
}

$i = 0;
echo "<h4>2.Определение четности для чисел от 0 до 10:</h4>";
do {
    if ($i == 0) echo "0 - ноль.<br>";
    elseif ($i & 1) echo $i." - нечетное число.<br>";
    else echo $i." - четное число.<br>";
    $i++;
} while ($i<=10);

$regions = ['Московская область' => ['Балашиха', 'Химки', 'Подольск', 'Королев'],
    'Ленинградская область' => ['Всеволожск','Гатчина','Выборг','Тихвин', 'Кириши'],
    'Рязанская область' => ['Рязань', 'Касимов','Скопин','Сасово']];
var_dump($regions);
echo "<h4>3. Самые крупные города по областям:</h4>";
foreach($regions as $region => $cities) {
    echo $region.':<br>';
//    echo implode(",", $cities)."<br>";
    $lastElement = end($cities);
    foreach ($cities as $city) {
        echo $city . ($city != $lastElement ? ', ' : '<br>');
    }
}

$alfabet = [
    'а' => 'a',   'б' => 'b',   'в' => 'v',
    'г' => 'g',   'д' => 'd',   'е' => 'e',
    'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
    'и' => 'i',   'й' => 'y',   'к' => 'k',
    'л' => 'l',   'м' => 'm',   'н' => 'n',
    'о' => 'o',   'п' => 'p',   'р' => 'r',
    'с' => 's',   'т' => 't',   'у' => 'u',
    'ф' => 'f',   'х' => 'h',   'ц' => 'c',
    'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
    'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
    'э' => 'e',   'ю' => 'yu',  'я' => 'ya'
];

echo "<h4>4. Результат транслитерации строки \"Всем привет, кого знаю! Hello all!\":</h4>";
function transliterate($str, $alfabet) {
    $result = '';
    for ($i = 0; $i < mb_strlen($str); $i++) {
        $letter = mb_substr($str, $i, 1);
        if (array_key_exists(mb_strtolower($letter), $alfabet)) {
            $result .= $alfabet[mb_strtolower($letter)];
        }
        else $result .= $letter;
    }
    return $result;
}
echo transliterate("Всем привет, кого знаю! Hello all!", $alfabet);

echo "<h4>5. Пребразование пробелов в строка в знак подчеркивания</h4>";
function spaceToUnderline($str) {
    return str_replace(" ", "_", $str);
}
echo spaceToUnderline("Строка с пробелами");


echo "<h4>6. Динамическое меню</h4>";

$menu = ["https://www.google.com/" => "Google site",
    "https://yandex.ru/" => "Yandex site",
    "Geekbrains sites" => ["https://geekbrains.ru/courses" => "Geekbrains courses", "https://geekbrains.ru/events" => "Geekbrains webinars"]];

function generateMenuList($arr) {
    $result = "<ul>";
    foreach ($arr as $key => $value) {
        $result .= "<li>";
        if (is_array($value)) {
            $result .= $key. generateMenuList($value);
        }
        else {
            $result .= '<a href="'.$key.'">'.$value.'</a>';
        }
        $result .= "</li>";
    }
    $result .= "</ul>";

    return $result;
}

echo generateMenuList($menu);