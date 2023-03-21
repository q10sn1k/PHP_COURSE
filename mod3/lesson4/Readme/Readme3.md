# Модификаторы доступа в PHP (public, private, protected)

Инкапсуляция – это механизм, который позволяет скрыть внутреннюю реализацию объекта от внешнего мира и предоставить доступ к свойствам и методам только через определенный интерфейс.

В PHP инкапсуляция реализуется с помощью ключевых слов public, protected и private.

Модификаторы доступа - это ключевые слова в PHP, которые определяют область видимости свойств и методов класса.


* Public означает, что свойство или метод доступны из любой точки программы.
* Protected означает, что свойство или метод доступны только внутри класса и его дочерних классов.
* Private означает, что свойство или метод доступны только внутри класса.


```php
// Определение базового класса Animal
class Animal {
  // Публичное свойство
  public $name;

  // Защищенное свойство
  protected $sound;

  // Приватное свойство
  private $age;

  // Публичный метод
  public function makeSound() {
    echo $this->sound;
  }

  // Защищенный метод
  protected function sleep() {
    echo "Животное спит";
  }

  // Приватный метод
  private function eat() {
    echo "Животное ест";
  }
}

// Определение класса Cat, который наследует свойства и методы от базового класса Animal
class Cat extends Animal {
  // Публичный метод, который использует защищенное свойство и защищенный метод базового класса
  public function play() {
    echo $this->name . " играет и издает звук: ";
    $this->makeSound();
    echo "<br>";
    $this->sleep();
  }
}

// Создание объекта класса Cat и использование публичного свойства и метода
$cat = new Cat();
$cat->name = "Кошка";
$cat->sound = "Мяу!";
$cat->play();

// Ошибка доступа к приватному свойству и методу
//$cat->age = 3;
//$cat->eat();

```

Для демонстрации ошибки доступа к приватному свойству и методу, мы пытаемся установить значение приватного свойства age и вызвать приватный метод eat(), что приводит к ошибке доступа.

Использование модификаторов доступа позволяет организовать доступ к свойствам и методам класса и предотвратить ошибки взаимодействия объектов между собой.

__________________________
__________________________

Напишем класс Rectangle с защищенными свойствами width (ширина) и height (высота), а также публичными методами getArea() и getPerimeter() для расчета площади и периметра прямоугольника соответственно. \

Создадим класс Square, который будет наследоваться от класса Rectangle и иметь дополнительный публичный метод setSide(), устанавливающий значение стороны квадрата.

```php
class Rectangle {
  protected $width;
  protected $height;

  public function getArea() {
    return $this->width * $this->height;
  }

  public function getPerimeter() {
    return 2 * ($this->width + $this->height);
  }
}

class Square extends Rectangle {
  public function setSide($side) {
    $this->width = $side;
    $this->height = $side;
  }
}

// Создаем объекты классов Rectangle и Square
$rectangle = new Rectangle();
$rectangle->width = 10;
$rectangle->height = 5;

$square = new Square();
$square->setSide(6);

// Выводим на экран результаты расчета площади и периметра
echo "Площадь прямоугольника: " . $rectangle->getArea() . "<br>";
echo "Периметр прямоугольника: " . $rectangle->getPerimeter() . "<br>";

echo "Площадь квадрата: " . $square->getArea() . "<br>";
echo "Периметр квадрата: " . $square->getPerimeter();


```

__________________________
__________________________

Напишем класс Person с защищенными свойствами name и age, а также публичными методами getInfo() для получения информации о человеке и setAge() для установки возраста человека.\
Создадим класс Student, который будет наследоваться от класса Person и иметь дополнительное защищенное свойство course (курс) и публичный метод getCourse() для получения информации о курсе студент.


```php
class Person {
  protected $name;
  protected $age;

  public function getInfo() {
    return "Имя: " . $this->name . ", Возраст: " . $this->age;
  }

  public function setAge($age) {
    $this->age = $age;
  }
}

class Student extends Person {
  protected $course;

  public function getCourse() {
    return "Курс: " . $this->course;
  }
}

// Создаем объекты классов Person и Student
$person = new Person();
$person->name = "Иван";
$person->setAge(30);

$student = new Student();
$student->name = "Анна";
$student->setAge(20);
$student->course = 2;

// Выводим на экран информацию о человеке и студенте
echo $person->getInfo() . "<br>";
echo $student->getInfo() . "<br>";
echo $student->name; // Не выведется, т.к. свойство protected в классе Person
```

__________________________
__________________________

У нас есть базовый класс Car, у которого есть свойства модель, год выпуска и цвет.\
Также у него есть метод getInfo(), который возвращает информацию об автомобиле.

Напишем наследуемый от него класс ElectricCar, который будет добавлять свойство batteryLife и методы setBatteryLife() и getBatteryLife() для установки и получения значения заряда батареи.

```php
class Car {
  // Свойства класса
  protected $model;
  protected $year;
  protected $color;

  // Конструктор класса
  public function __construct($model, $year, $color) {
    $this->model = $model;
    $this->year = $year;
    $this->color = $color;
  }

  // Методы класса
  public function getInfo() {
    return "Модель: " . $this->model . ", Год выпуска: " . $this->year . ", Цвет: " . $this->color;
  }
}

// Создаем класс ElectricCar, наследующийся от класса Car
class ElectricCar extends Car {
  // Свойства класса
  private $batteryLife;

  // Методы класса
  public function setBatteryLife($batteryLife) {
    $this->batteryLife = $batteryLife;
  }

  public function getBatteryLife() {
    return $this->batteryLife;
  }
}

// Создаем объекты классов Car и ElectricCar
$car = new Car("BMW", 2015, "черный");
$electricCar = new ElectricCar("Tesla", 2020, "красный");

// Выводим на экран информацию об автомобилях
echo $car->getInfo() . "<br>";
echo $electricCar->getInfo() . "<br>";

// Устанавливаем значение заряда батареи и выводим его на экран
$electricCar->setBatteryLife(80);
echo "Заряд батареи: " . $electricCar->getBatteryLife() . "%";

```
______________________________
______________________________
______________________________

# Домашнее задание

## Задача 1

Создайте класс Calculator с защищенными свойствами num1 и num2, конструктором и четырьмя методами add(), subtract(), multiply() и divide(), которые будут выполнять соответствующие математические операции с защищенными свойствами.\
Каждый метод должен принимать два числовых аргумента и возвращать результат выполненной операции.

Затем создайте класс ScientificCalculator, наследующийся от класса Calculator и добавляющий защищенное свойство precision(точность) и методы setPrecision() и getPrecision() для установки и получения значения точности вычислений.

## Задача 2

Создайте класс BankAccount, который будет иметь свойство balance с модификатором доступа private.\
Реализуйте методы deposit() и withdraw() для добавления и снятия денег со счета.\
Создайте класс SavingAccount, который будет наследоваться от BankAccount и будет иметь дополнительное свойство interestRate, определяющее процентную ставку.\
Реализуйте метод addInterest(), который будет добавлять проценты на счет в соответствии со ставкой.