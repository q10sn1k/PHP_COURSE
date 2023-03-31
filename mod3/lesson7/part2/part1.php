<?php

trait Greeting {
    public function sayHello() {
        echo "Hello";
    }
}

class MyClass {
    use Greeting;
}

$obj = new MyClass();
$obj->sayHello();

// Hello