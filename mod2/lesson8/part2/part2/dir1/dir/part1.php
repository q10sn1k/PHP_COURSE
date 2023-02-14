<?php
    /*
        у нас есть следующая структура файлов:
        dir1
            dir
                part1.php
            text.txt

     */


    $data = file_get_contents('../text.txt');

    echo $data;