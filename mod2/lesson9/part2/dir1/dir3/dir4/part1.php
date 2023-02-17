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
                    part1.php // мы находимся тут
                text.txt // неодходимо получить данные из этого файла
        part2.php
        part3.php
     */

    $res = file_get_contents('../text.txt');

    echo $res;