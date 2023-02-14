<?php
    /*
        у нас есть пустой файл file1.txt
        необходимо записать текст в файл file1.txt и вывести текст из файла в браузер
     */

    // записываем данные (текст) в файл file1.txt
    file_put_contents('file1.txt', 'Hello, I`m text');

    // Считываем данные из файла file1.txt и присваем данные переменном $res
    $res = file_get_contents('file1.txt');

    // выводим данные
    echo $res;