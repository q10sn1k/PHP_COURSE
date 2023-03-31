<?php

trait Greeting {
    public function sayHello() {
        echo "Hello! ";
    }
}

trait Name {
    protected $name;

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

class MyClass {
    use Greeting, Name;
}

$obj = new MyClass();
$obj->setName("Ivan");

$obj->sayHello();
echo $obj->getName();