<?php
    // напишем функцию поиска количесва символов в строке

    function counter_of_elems($subject) {
        $pattern = '#[\w\sа-яА-ЯёЁ`~%&=,0:@\'"\*\?\+\^\$\\\\\/\{\}\[\]\(\)\|\.-]{1}#u';
        $res = preg_match_all($pattern, $subject, $matches);

        // введем сетчик
        $counter = 0;

        foreach ($matches[0] as $item){
            $counter++;
        }

        return $counter;

    }

    $str_test = 'adsfaarsgawgrawg2364235agdnsedth';
    $test1 = counter_of_elems($str_test);
    echo $test1;

