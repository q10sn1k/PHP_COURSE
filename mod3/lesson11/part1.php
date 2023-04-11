<?php

trait Hello {
    public function sayHello() {
        echo "Hello";
    }
}


trait Name {
    public function showName() {
        echo " Ivan";
    }
}

class MyClass {
    use Hello, Name;
}

$myClassObj = new MyClass();
$myClassObj->sayHello();
$myClassObj->showName();