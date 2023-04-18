<?php

// С помощью паттерна (шалона) проектирования Singleton реализуем класс,
// который будет гарантировать, что в приложении существует только 1 экземпляр класса

class Singleton
{
    // Статическое свойство, в котором будет храниться единственный экземпляр класса
    private static ?Singleton $instance = null;
    /*
        ?Singleton ...  - указывает, что свойство может содержать экземпляр класса 
        `Singletone` , либо значение `null`
    */

    // закроем конструктор от внешнего доступа
    private function __construct() {}

    // Получение экземляра класса
    public static function getInstance(): Singleton
    {
        // проверим, был ли создан экземляр класса ранее
        if (self::$instance === null) {
            // Если нет, то создаем новый экземляр
            self::$instance = new self();
        } 

        // Возвращаем единственный экземляр класса
        return self::$instance;
    }
}


$singletinInstance = Singleton::getInstance();