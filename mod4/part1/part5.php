<?php

// Класс калькулятора, реализующий шаблон Singleton
class Calculator
{
    private static ?Calculator $instance = null;
    private float $result = 0;

    private function __construct() {}

    public static function getInstance(): Calculator
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /*
        методы калькулятора (сложение, вычитание, умножение и деление)
    */
    public function add (float $a, float $b): void
    {
        $this->result = $a + $b;
    }

    public function substract (float $a, float $b): void
    {
        $this->result = $a - $b;
    }

    public function multiply (float $a, float $b): void
    {
        $this->result = $a * $b;
    }

    public function devidedd (float $a, float $b): void
    {
        if ($b === 0) {
            throw new InvalidArgumentException("На ноль не делят");
        }
        $this->result = $a / $b;
    }

    // метод получения результата
    public function getResult(): float
    {
        return $this->result;
    }

    // метод сброса результата
    public function reset():void
    {
        $this->result = 0;
    }
}

$calculator = Calculator::getInstance();
$calculator->add(2,3);
echo $calculator->getResult();
