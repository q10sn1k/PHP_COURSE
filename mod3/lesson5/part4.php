<?php
interface Vehicle {
    // Vehicle - транпортное средство

    // Методы интерфейса

    public function start();
    public function stop();
}

// Наследуемся от интерфейса и реализуем его методы
class Car implements Vehicle {
    public function start()
    {
        // TODO: Implement start() method.

        echo "Автомобиль завелся";
    }

    public function stop()
    {
        // TODO: Implement stop() method.

        echo "Автомобиль заглушен";
    }
}

// Создаем объект класса Car и вызываем методы
$car = new Car();
$car->start();
echo "<br>";
$car->stop();