<?php
    $name = "Николай";
    $surname = 'Александрович';
    $number1 = 2022;
    $number2 = 2022.1234;
    // = - оператор присвоения
    // переменные следует обозначать осмысленно, на английском языке
    // переменные в языке PHP обозначаются с помощью символа $
    // В конце каждой инструкции следует писать символ ;

    $name = "Николай";
    echo "Меня зовут ", $name, "<br>"; //<br> - перенос строки

    $book = 5;
    $book = 20;
    $e_book = 10;
    $sum = $book + $e_book;
    echo "Общее количество книг ", $sum, "<br>";
    //

    // константа - неизменяемое значение
    define("pi", 3.14); // объявление константы ("pi" - название константы, значение константы)
    echo "Константа pi равняется ", pi, "<br>";
    // при вызове констант знак $ писать не нужно

    // PHP является языком динамической типизации (тип переменной определяется на основе её значения)
    /*
    Типы данных в языке PHP
    Boolean - логический тип данных, который содержит значения TRUE, либо FALSE
        TRUE - истина Пример echo 2 == 2; //истина
        FALSE - ложь Пример echo 2 == 3; //ложь

    Integer - целочисленное значение
        Пример: 2, 10, 240

    Float - число с плавуюей точкой (вечественное число)
        Пример: 2.47, 10.1, 240.145

    String - стрроковый тип данных

    Array - массив

    NULL - пустое значение
     */

    $bool = TRUE; // булево значение
    $int = 3; //Integer - целочисленное значение
    $float = 45.634; //  Float - число с плавуюей точкой
    $string_11 = "Привет, здесь содержится текст 555"; // String - стрроковый тип данных

    $str1 = "345"; // это строка
    // Преобразуем тип данных string к integer
    $str_to_int = (integer)$str1;
    echo $str_to_int + 5;
    echo "<br>";