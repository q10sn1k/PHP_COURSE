<?php
abstract class Vehicle {
    protected $model;

    public function __construct($model) {
        $this->model = $model;
    }

    abstract public function drive();
}

class Car extends Vehicle {
    public function drive() {
        // TODO: Implement drive() method.
        echo $this->model . ' едет по дороге.';
    }
}

$car = new Car("BMW");
$car->drive();