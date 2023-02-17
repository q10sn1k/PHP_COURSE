<?php
    // Относительные пути
    /*
        Структура директорий

        dir1
            dir2
                text.txt // неодходимо получить данные из этого файла
        part2.php // мы находися тут
     */

    $res = file_get_contents('dir1/dir2/text.txt');


    echo $res;