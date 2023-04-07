<?php

interface Animal {
    public function makeSound();
}

interface Bird {
    public function fly();
}

interface Dog {
    public function run();
}

class Eagle implements Animal, Bird {
    public function makeSound() {
        // TODO: Implement makeSound() method.
        echo "Eagle sound <br>";
    }

    public function fly() {
        // TODO: Implement fly() method.
        echo "Eagle Fly, can`t run <br>";
    }
}

class Dog1 implements Animal, Dog {
    public function makeSound() {
        // TODO: Implement makeSound() method.
        echo "Dog sound <br>";
    }

    public function run() {
        // TODO: Implement run() method.
        echo "Dod run, can`t fly <br>";
    }
}

$eagle = new Eagle();
$eagle->makeSound();
$eagle->fly();

$dog = new  Dog1();
$dog->makeSound();
$dog->run();