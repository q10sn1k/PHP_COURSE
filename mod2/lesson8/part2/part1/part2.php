<?php
    /*
        добавим новый текст в файл file1.txt
     */
    // считаем данные из файла file1.txt
    $text_file1 = file_get_contents('file1.txt');

    // Добавим данные (текст) в файл file1.txt
    file_put_contents('file1.txt', $text_file1 . ' New text');

    // Считываем данные из файла file1.txt и присваем данные переменном $res
    $res = file_get_contents('file1.txt');

    // выводим данные
    echo $res;