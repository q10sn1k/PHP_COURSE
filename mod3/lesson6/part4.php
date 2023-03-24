<?php

interface Vehicle {
    public function start();
    public function stop();
}

class Car implements Vehicle{
    public function start() {
        // TODO: Implement start() method.
        echo "ok";
    }

    public function stop() {
        // TODO: Implement stop() method.
        echo 'not ok';
    }
}

$car = new Car();
$car->start();
$car->stop();