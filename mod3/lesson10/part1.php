<?php

abstract class Animal {
    public $name;

    abstract public function makeSound();

    public function run() {
        echo "$this->name Run <br>";
    }
}

class Dog extends Animal {

    public function makeSound() {
        // TODO: Implement makeSound() method.
        echo "$this->name ... dog sound <br>";
    }

}

$dog = new Dog();
$dog->name = 'DOG1';
$dog->run();
$dog->makeSound();