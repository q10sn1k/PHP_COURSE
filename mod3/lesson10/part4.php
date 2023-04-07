<?php

class Person {
    private $name;
    private $age;

    private static $count = 0;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;

        self::$count++;
    }

    public function getInfo() {
        return "Name: {$this->name} <br> Age: {$this->age} <br>";
    }

    public static function getCount() {
        return self::$count;
    }
}


$person1 = new Person("person1", 30);
$person2 = new Person("person2",31);
$person3 = new Person("person3", 32);
//
echo $person1->getInfo();
echo $person2->getInfo();
echo $person3->getInfo();

echo "Count of Person obj " . Person::getCount(). "<br>";