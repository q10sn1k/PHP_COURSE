<?php

interface Animal {
    public function makeSound();
}

interface Bird {
    public function fly();
}

class Eagle implements Animal, Bird {
    public function makeSound() {
        // TODO: Implement makeSound() method.
        echo "Звук орла!";
    }

    public function fly() {
        // TODO: Implement fly() method.

        echo " Орёл летат.";
    }

}

$eagle = new Eagle();
$eagle->makeSound();
$eagle->fly();