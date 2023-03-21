<?php

// Абстрактный класс фигуры
abstract class Figure {
    abstract public function getArea(): float;
    abstract public function getPerimeter(): float;
}

// Класс прямоугольника, наследуемый от абстрактного класса Figure
class Rectangle extends  Figure {
    private float $width;
    private float $height;
    private static int $count = 0;

    public function __construct(float $width, float $height){
        $this->width = $width;
        $this->height = $height;
        self::$count++; // увеличиваем счетчик объектов при каждом создании экземпляра
    }

    public function getArea(): float {
        // TODO: Implement getArea() method.
        return $this->width * $this->height;
    }

    public function getPerimeter(): float {
        // TODO: Implement getPerimeter() method.
        return 2 * ($this->width + $this->height);
    }

    // статичный метод для получения количества созданных объектов
    public static function getCount(): int {
        return self::$count;
    }
}


// Создадим объекты прямоугольноков
$rectangle1 = new Rectangle(5, 10);
$rectangle2 = new Rectangle(7, 3);

// Выводим площади и периметры прямоугольников
echo "Площадь прямоугольника 1: " . $rectangle1->getArea() . "<br>";
echo "Периметр прямоугольника 1: " . $rectangle1->getPerimeter() . "<br>";
echo "Площадь прямоугольника 2: " . $rectangle2->getArea() . "<br>";
echo "Периметр прямоугольника 2: " . $rectangle1->getPerimeter() . "<br>";

// Выведем количество созданных объектов

echo "Количество созданных объектов: " . Rectangle::getCount() . "<br>";