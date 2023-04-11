<?php
// Трейт Log содержит статичный метод (принадлежит классу) write
trait Log {
    public static function write($message) {
        echo $message;
    }
}
// Трейт NotStaticLog содержит не статичный ("обычный" принадлежит объекту класса) метод write
trait NotStaticLog {
    public function write($message) {
        echo $message;
    }
}

class MyClass {
    use Log;
}

class MyC {
    use NotStaticLog;
}

// Статичный метод принадлежит классу
MyClass::write('Today is a good day');
echo "<br>";
// Не статичный метод принадлежит ОБЪЕКТУ класса
$obj = new MyC();
$obj->write("Very good day");