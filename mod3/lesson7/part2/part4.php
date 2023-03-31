<?php

trait Age {
    protected $age;

    public function setAge($age) {
        $this->age = $age;
    }

    public function getAge() {
        return $this->age;
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
    use Age, Name;
}

$obj = new MyClass();
$obj->setName("Ivan");
$obj->setAge(30);

echo "Hello " . $obj->getName() . ' , Ваш возраст ' . $obj->getAge();