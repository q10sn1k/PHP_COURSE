<?php
    /*
        структура директорий

        part1.php
        text1.txt
     */
    $text = 'text1';

    // запишем данные в файл text1.txt
    file_put_contents('text1.txt', $text);

    // прочитаем данные из файла text1.txt и выведем в браузер

    $res = file_get_contents('text1.txt');

    // выведем результат
    echo $res;