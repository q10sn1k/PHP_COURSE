<?php

class Car
{
    // реализация чертеже автомобиля
    public $color; // свойство цвета
    public $fuel; // свойство количество топлива
}

$my_car = new Car(); // создание объекта класса Car (на основе чертежа создаем автомобиль)

// устанавливаем войста объекта $my_car
$my_car->color = 'green';
$my_car->fuel = 50;

// echo "Цвет - $my_car->color, Объем топливного бака - $my_car->fuel";
// Цвет - green, Объем топливного бака - 50


$my_car_2 = new Car(); // создали объект класса car

$my_car_2->color = 'red';
$my_car_2->fuel = 40;

// echo "Цвет - $my_car_2->color, объем топливного бака - $my_car_2->fuel";
// Цвет - red, объем топливного бака - 40


//_______________________________________________________________________
class User
{
    // создаем свойства
    public $name;
    public $age;

    // cоздаем методы (метод по сути, тоже самое что и функция, только реализовывается в классе)

    public function show($subject){
        return $subject;
    }
}

$user1 = new User();
$user1->name = 'Ivan';
$user1->age = 28;

echo $user1->show("Hello i`m user1 and my name is $user1->name");