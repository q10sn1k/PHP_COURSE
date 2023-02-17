<?php
    // Абсолютные пути

    /*
        Если в начале названия файла поставить / то путь будет абсолютный.

        !!!! В абсолютеных путях поиск происходит от корневой директории
     */
    // file_get_contents('/text.txt'); // данный файл не прочитается поскольку указан абсолютный путь

    // echo $_SERVER['DOCUMENT_ROOT']; // C:/OSPanel/domains/localhost
    // путь от корня операционной системы до директории web сервера

    $root = $_SERVER['DOCUMENT_ROOT'];

    $res = file_get_contents($root . '/2_MOD/lesson9/part3/text.txt');

    // echo $res;


    //______________________________________________________________________

    // Получим путь к папке (директории) в которой расположен наш скрипт (для этого используется константа __DIR__)
    // echo __DIR__; // C:\OSPanel\domains\localhost\2_MOD\lesson9\part3


    // Получим путь к файлу скрипта (для этого используется константа __FILE__)
    // echo __FILE__; // C:\OSPanel\domains\localhost\2_MOD\lesson9\part3\part1.php