<?php

// напишем фабрику для создания фруктов - яблок и бананов


// Определим интерфес для фабрики
interface FruitFactoryInterface
{
    public function createFruit(): FruitInterface;
}

// Определим интерфейс для фруктов
interface FruitInterface
{
    public function getName(): string;
}

// Реализуем класс фабрики яблок
class AppleFactory implements FruitFactoryInterface
{
    public function createFruit(): FruitInterface
    {
        return new Apple();
    }
}

// Реализуем класс фабрики бананов
class BananaFactory implements FruitFactoryInterface
{
    public function createFruit(): FruitInterface
    {
        return new Banana();
    }
}

// Реализуем класс яблок
class Apple implements FruitInterface
{
    public function getName(): string
    {
        return 'яблоко';
    }
}


// Реализуем класс бананов
class Banana implements FruitInterface
{
    public function getName(): string
    {
        return 'банан';
    }
}

$appleFactory = new AppleFactory();
$apple = $appleFactory->createFruit();
echo $apple->getName();

echo "<br>";

$bananaFactory = new BananaFactory();
$banana = $bananaFactory-> createFruit();
echo $banana->getName();