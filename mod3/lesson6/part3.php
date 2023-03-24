<?php

// класс калькулятор

class Calculator {

    // Статические методы для выполнения математических операций

    public static function add(float $a, float $b):float {
        return $a + $b;
    }

    public static function subtract(float $a, float $b):float {
        return $a - $b;
    }

    public static function myltiply(float $a, float $b): float {
        return $a * $b;
    }

    public static function divide(float $a, float $b): float {
        if ($b == 0) {
            throw new Exception('На ноль нельзя делить');
        }
        return $a / $b;
    }

}


// используем статичные методы без создания объекта класса

//echo Calculator::add(2,3);
//echo Calculator::subtract(10,5);
//echo Calculator::myltiply(2.5, 3);
//echo Calculator::divide(10,2);

echo Calculator::divide(10,0);