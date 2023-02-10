<?php
    // функция умножения 3-х чисел

    function args3($a, $b, $c){
        $res = $a * $b * $c;

        return $res;
    }

    // тестируем функцию
    // echo args3(1,2,3); // 6

    $res = args3(2,2,3); //12
    //echo $res;

    /*
        кастомная функция возведения числа в степень

        назовем функцию custom_pow
        у функции будет 2 аргумента:
        1-й - число которое мы будем возводить в степень ($var)
        2-й - стень в которую мы будем возводить число ($pow)
     */
    function custom_pow($var, $pow){
        $res = $var ** $pow;

        return $res;
    }

    // тестируем функцию
    $res1 = custom_pow(2,2);// 4
    $res2 = custom_pow(2,3);// 8
    echo "res1 = $res1 и res2 = $res2";



