<?php
    $a = 5;
    $b = '05';
    var_dump($a == $b);         // Почему true? - при таком сравнени происходит преобразование строк к числам
    var_dump((int)'012345');     // Почему 12345? - потому что строка приводится к типу int, и уже числовое значение сохраняется в переменную
    var_dump((float)123.0 === (int)123.0); // Почему false? - потому что при тождественном сравнении преобразований (приведений к одному типу) не происходит и разные типы считаются разными значен$
    var_dump((int)0 === (int)'hello, world'); // Почему true? - потому что строка явно приводится к числу и т.к. в начале строки нет числа, то такая строка приводится к 0