<?php

abstract class Animal {
    protected $age;

    public function __conctruct($age){
        $this->age = $age;
    }

    abstract public function sound();
}

class Cat extends Animal {
    public function sound()
    {
        // TODO: Implement sound() method.
        return "Мяу";
    }
}


class Dog extends Animal {
    public function sound() {
        return 'Гав';
    }
}

$cat = new Cat(2);
echo "Кот говорит " . $cat->sound();

$dog = new Dog(3);
echo "Собака говорит " . $dog->sound();
