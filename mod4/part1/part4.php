<?php

/*
    Реализуем класс для хранения и обработки информации о количестве пользователей
    приложения, использую фабричный паттерн и одиночку(singleton)
*/

//  Определяем интерфес для фабрики
interface UserCounterFactoryInterface
{
    public function createUserCounter(): UserCounterInterface;
}

interface UserCounterInterface
{
    public function addUser(): void;
    public function removeUser(): void;
    public function getUserCount(): int;
}

// Реализуем класс фабрики для счетчика пользователей
class UserCouterFactory implements UserCounterFactoryInterface
{
    public function createUserCounter(): UserCounterInterface
    {
        return UserCounter::getInstance();
    }
}

// Реализуем класс для счетчика пользователей с использованием singletone(одиночки)
class UserCounter implements UserCounterInterface
{
    private static ?UserCounter $instance = null;
    private int $count = 0;

    private function __construct() {}

    public static function getInstance(): UserCounter
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function addUser(): void
    {
        $this->count++;
    }

    public function removeUser(): void
    {
        if ($this->count > 0) {
            $this->count--;
        }
    }

    public function getUserCount(): int
    {
        return $this->count;
    }
}

$userCounterFactory = new UserCouterFactory();
$userCounter = $userCounterFactory->createUserCounter();

$userCounter->addUser(); // добавляем 1 пользователя
$userCounter->addUser(); // добавляем 2 пользователя
$userCounter->addUser(); // добавляем 3 пользователя
$userCounter->addUser(); // добавляем 4 пользователя
$userCounter->removeUser(); // удаляем одного пользователя

echo $userCounter->getUserCount();