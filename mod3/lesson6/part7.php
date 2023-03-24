<?php

abstract class Animal {
    protected $name;

    public function __construct($name){
        $this->name = $name;
    }

    abstract public function makeSound();
}

interface Flyable {
    public function fly();
}

class Eagle extends Animal implements Flyable {
    public function makeSound() {
        // TODO: Implement makeSound() method.
        echo "$this->name ----------- Звук орла!";
    }

    public function fly() {
        // TODO: Implement fly() method.
        echo ' Птичка полетела.';
    }
}

$eagle = new Eagle("Орёл");

$eagle->makeSound();
$eagle->fly();