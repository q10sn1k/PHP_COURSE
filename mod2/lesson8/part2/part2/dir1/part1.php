<?php

/*
    у нас есть следующая структура файлов:
    dir1
        dir
            part1.php
            part2.php
            text.txt // как прочитать данные из этого файла?
        text.txt
        part1.php // мы находимся тут
    text.txt

 */


$data = file_get_contents('dir/text.txt');

echo $data; // я текст