<?php
/*
    у нас есть следующая структура файлов:
    dir1
        dir
            part1.php
            part2.php // мы находимся тут
        text.txt
    text.txt // как прочитать данные из этого файла?

 */


$data = file_get_contents('../../text.txt');

echo $data; // я текст из файла text.txt из директории part2
