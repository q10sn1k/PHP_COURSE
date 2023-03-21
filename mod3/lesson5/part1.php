<?php

class Rectangle {
    protected $width;
    protected $height;

    public function getArea() {
        return $this->width * $this->height;
    }

    public function getPerimeter() {
        return 2 * ($this->width + $this->height);
    }
}

class Square extends Rectangle {
    public function setSide($side1, $side2){
        $this->width = $side1;
        $this->height = $side2;
    }
}

// Создаем объект классов Square

$square = new Square();
$square->setSide(6,6);
echo "Площадь квадрата " . $square->getArea() . "<br>";
echo "Периметр квадрата " . $square->getPerimeter();

