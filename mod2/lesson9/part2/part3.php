<?php
    // Относительные пути
    /*
        Структура директорий

        dir1
            dir2
                text.txt
            dir3
                dir4
                    text2.txt
        part2.php // неодходимо получить данные из этого файла
        part3.php // мы находимся тут
     */

    $res = file_get_contents('dir1/dir3/dir4/text2.txt');

    echo $res;