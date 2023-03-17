<?php

abstract class Transport {
    protected $speed;

    public function __construct($speed) {
        $this->speed = $speed;
    }

    abstract public function move();
}

class Car extends Transport {
    private $model;

    public function __construct($model, $speed)
    {
        parent::__construct($speed);
        $this->model = $model;
    }

    public function move()
    {
        // TODO: Implement move() method.
        echo "The car is moving at $this->speed kmh";
    }

}
