<?php

/*
    Напишем класс `Counter`, который будет подсчитывать количество созданных объектов.
    Гарантировать, что в приложении будет существовать только 1 экземпляр класса `Counter`
*/

class Counter
{
    private static ?Counter $instance = null;
    private int $count = 0;

    private function __construct() {}

    public static function getInstance(): Counter
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function increment(): void
    {
        $this->count++;
    }

    public function getCount(): int
    {
        return $this->count;
    }

}


class User
{
    public function __construct()
    {
        $counter = Counter::getInstance();
        $counter->increment();
    }
}

$user1 = new User();
$user2 = new User();
$user1 = new User();
$user2 = new User();

$counter = Counter::getInstance();
echo $counter->getCount();



/*
    Если попытаться создать 2, 3 ... 5 экземпляр класса `Counter`, то это не удастся, т. к.
    класс гарантирует, что в приложении существует только 1 экземляр.

    При попытке создать  2, 3 ... 5 мы получим уже существующий объект - (

         if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;

    )





    попробуем создать еще несколько объектов
*/
$counter1 = Counter::getInstance();
$counter2 = Counter::getInstance();

// Все "объекты" класса Counter ссылаются на 1 и тот же объект
// Объект класса Counter  только 1

var_dump($counter1 === $counter2); // bool(true)