<?php
    setlocale(LC_ALL, 'ru_RU');
    // переименуем файл text1.txt в newText1.txt

    //rename('text1.txt', 'newText1.txt');


    // переименуем файл newText1.txt в text1.txt и переместим его в директорию dir1

    //rename('newText1.txt', 'dir/text1.txt');

    //__________________________
    // _________________________
    // копирование файлов

    // copy('text.txt', 'copyText.txt');

    //__________________________
    // _________________________
    // удаление файлов

    //unlink('copyText.txt');
    //______________________________________________
    //______________________________________________
    // найдем вес файла в байтах.

    $res_b = filesize('text.txt');
    $res_kb = filesize('text.txt') / 1024;
    $res_mb = filesize('text.txt') / (1024 * 1024);
    $res_gb = filesize('text.txt') / (1024 * 1024 * 1024);

    // echo "Размер файла text.txt - $res_b байт; $res_kb килобайт; $res_mb мегабайт; $res_gb гигабайт";

    //___________________________
    // проверим существование файла text.txt
    //echo file_exists('text.txt'); // 1 (true)
    //echo file_exists('text12345.txt'); // 0 (false)

    //____________________________

    // проверка наличия файла
    /*
        проверим существует ли файл text.txt
        если до то выведем размер файла,
        если нет то выведем - "файла не сществует"
    */




    /*
    if (file_exists('text.txt')){
        echo filesize('text.txt');
    } else {
        echo 'файла не существует';
    }
    */



    /*
        реализуем функцию которая вернет размер файла, если он существует.
        иначе вернем строку - "файла не существует."
     */

    function check_file($file_name){
        if (file_exists($file_name)){
            $res = filesize($file_name);
            return $res;
        } else {
            $res = 'Файл не существует';
            return $res;
        }
    }

    // test - check_file
    $file_name1 = 'text.txt';
    $test1 = check_file($file_name1);
//    echo $test1; //8
    $file_name2 = 'texttewfwef.txt';
    $test2 = check_file($file_name2);
    echo $test2; // Файл не существует