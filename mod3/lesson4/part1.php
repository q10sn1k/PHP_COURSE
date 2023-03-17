<?php

class Person {
    public $name;
    public $age;

    public function say_hello() {
        echo "Hello, my name is " . $this->name;
    }
}

$person = new Person();
$person->name = 'Ivan';
$person->age = 30;
// $person->say_hello(); // Hello, my name is Ivan

//___________________________________________________________

class Animal {
    public $name;
    public $color;

    public function eat() {
        echo "The animal is eating";
    }
}

class Cat extends Animal {
    public function say() {
        echo "Cat say Meoew";
    }
}

$cat = new Cat();
$cat->name = 'Garfild';
$cat->color = 'orange';
// $cat->say();
// $cat->eat();

