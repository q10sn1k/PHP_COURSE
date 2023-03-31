<?php
/*
trait Greeting {
    const MESSAGE = 'Hello!';

    public function sayHello() {
        echo self::MESSAGE;
    }
}

class MyClass{
    use Greeting;
}

$obj = new MyClass();
$obj->sayHello();

версия PHP 7.4 и более ранние
*/



// версия 8.0 и выше
trait Greeting {
    public function sayHello() {
        echo static::MESSAGE;
    }
}

class MyClass{
    use Greeting;
    const MESSAGE = 'Hello!';
}

$obj = new MyClass();
$obj->sayHello(); // выведет "Hello!"
