<?php
trait Greeting {
    abstract public function sayHello();
}

class MyClass {
    use Greeting;

    public function sayHello() {
        // TODO: Implement sayHello() method.
        echo "Hello =-)!";
    }

}

$obj = new MyClass();
$obj->sayHello(); // Hello =-)!