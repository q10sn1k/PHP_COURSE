<?php

trait Hello {
    abstract public function sayHello();
}

class MyClass {
    use Hello;

    public function sayHello() {
        // TODO: Implement sayHello() method.
        echo "Greeting!!!";
    }
}

$MyClassObj = new MyClass();
$MyClassObj->sayHello();