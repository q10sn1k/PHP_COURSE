<?php

interface Figure {
    public function getArea();
}

// прямоугольника
class Rectangle implements Figure {
    public $width;
    public $height;

    public function getArea()
    {
        // TODO: Implement getArea() method.
        return $this->width * $this->height;
    }
}

// круг
class Circle implements Figure {
    public $radius;

    public function getArea()
    {
        // TODO: Implement getArea() method.
        return pi() * pow($this->radius, 2);
    }
}

function getArea(Figure $shape) {
    return $shape->getArea();
}

$rectangle = new Rectangle();
$rectangle->width = 10;
$rectangle->height = 5;
echo getArea($rectangle); // 50

$circle = new Circle();
$circle->radius = 5;
echo getArea($circle);