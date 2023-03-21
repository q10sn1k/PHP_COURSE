<?php

class Person {
    protected $name;
    protected $age;

    public function getInfo() {
        return "Имя: " . $this->name . ", Восзраст: " . $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function setName($name) {
        $this->name = $name;
    }
}

class Student extends Person {
    private $course;

    public function getCourse() {
        return "Курс :" . $this->course;
    }

    public function setCourse($course) {
        $this->course=$course;
    }
}

// Создадим объекты классов Person и Student

$person = new Person();
$person->setName("Иван");
$person->setAge(30);

$student = new Student();
$student->setName("Анна");
$student->setAge(20);
$student->setCourse(2);


// Выведем информацию на экран

echo $person->getInfo() . "<br>";
echo $student->getInfo() . ' ' . $student->getCourse() . "<br>";

// echo $student->name; // Не выведется т. к. свойство protected (защещенное в классе Person)
// echo $student->course; // Не выведется, т. к. свойство private (защещенное в классе Student)