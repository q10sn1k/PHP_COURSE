# Абстрактные классы и интерфейсы в PHP

Абстрактные классы и интерфейсы - это механизмы, которые позволяют определить общие свойства и методы для группы классов.\
Абстрактные классы предоставляют базовый функционал для наследования, в то время как интерфейсы определяют общий контракт, который должен быть реализован классами.

# Абстрактный класс

Абстрактный класс - это класс, который содержит абстрактные методы. \
Абстрактный метод - это метод без тела, то есть без реализации.\
Абстрактный класс может содержать и обычные методы, которые уже имеют реализацию.

От абстрактного класса нельзя создать объект.\

Класс, наследующий абстрактный класс, должен реализовать все абстрактные методы, иначе он также должен быть объявлен как абстрактный класс.

Абстрактный класс - это класс, который не может быть создан напрямую, а может использоваться только как базовый класс для других классов.\
Он может содержать как абстрактные, так и конкретные методы. \
Абстрактный метод - это метод, который не имеет реализации в абстрактном классе, но должен быть реализован в классе-наследнике.

Создание абстрактного класса осуществляется с помощью ключевого слова abstract перед определением класса.\
Абстрактный метод также определяется с помощью ключевого слова abstract.

```php
<?php

abstract class Animal {
  // Свойства класса
  public $name;

  // Абстрактный метод
  abstract public function makeSound();

  // Конкретный метод
  public function run() {
    echo "Бежит";
  }
}

// Наследуемся от абстрактного класса
class Cat extends Animal {
  public function makeSound() {
    echo "Мяу";
  }
}

// Создаем объект класса Cat и вызываем методы
$cat = new Cat();
$cat->name = "Барсик";
$cat->makeSound(); // Выведет "Мяу"
$cat->run(); // Выведет "Бежит"

```

# Интерфейсы в PHP

Интерфейс - это набор методов без реализации, которые должны быть реализованы в классе-наследнике.\
Он определяет только сигнатуры методов и не содержит каких-либо реализаций.

Создание интерфейса осуществляется с помощью ключевого слова interface перед определением интерфейса.

В PHP отсутствует возможность множественного наследования классов, поэтому для реализации функционала, объединяющего методы из различных классов, используются интерфейсы.\
Интерфейс в PHP это абстрактный класс, который определяет набор методов без их реализации. \
Класс, который реализует интерфейс, обязан реализовать все его методы. \
Таким образом, интерфейсы позволяют организовать взаимодействие между классами, не требуя наследования от нескольких классов, что повышает гибкость и поддерживаемость кода.

```php
<?php

interface Vehicle {
  // Vehicle - транспортное средство
  // Методы интерфейса
  public function start();
  public function stop();
}

// Наследуемся от интерфейса и реализуем его методы
class Car implements Vehicle {
  public function start() {
    echo "Автомобиль завелся";
  }

  public function stop() {
    echo "Автомобиль заглушен";
  }
}

// Создаем объект класса Car и вызываем методы
$car = new Car();
$car->start(); // Выведет "Автомобиль завелся"
$car->stop(); // Выведет "Автомобиль заглушен"

```

Для наследования от абстрактного класса используется ключевое слово extends. \
При этом, дочерний класс должен реализовать все абстрактные методы родительского класса, иначе он также должен быть объявлен как абстрактный.


```php
<?php

abstract class Vehicle {
    protected $model;

    public function __construct($model) {
        $this->model = $model;
    }

    abstract public function drive();
}

class Car extends Vehicle {
    public function drive() {
        echo $this->model . " едет по дороге.";
    }
}

$car = new Car("BMW");
$car->drive();

```

В этом примере класс Vehicle является абстрактным и содержит конструктор и абстрактный метод drive().\
Класс Car наследуется от класса Vehicle и реализует абстрактный метод drive().

классы могут реализовывать несколько интерфейсов.\
Для этого используется ключевое слово implements.\
При этом, класс должен реализовать все методы, определенные в интерфейсах.

```php
<?php

interface Animal {
    public function makeSound();
}

interface Bird {
    public function fly();
}

class Eagle implements Animal, Bird {
    public function makeSound() {
        echo "Звук орла!";
    }

    public function fly() {
        echo "Орел летит.";
    }
}

$eagle = new Eagle();
$eagle->makeSound();
$eagle->fly();

```

Интерфейсы Animal и Bird содержат методы makeSound() и fly(), соответственно. \
Класс Eagle реализует оба интерфейса и определяет свои реализации для методов makeSound() и fly().

Класс может наследоваться от одного класса и реализовывать один или несколько интерфейсов.

```php
abstract class Animal {
  protected $name;

  public function __construct($name) {
    $this->name = $name;
  }

  abstract public function makeSound();
}

interface Flyable {
  public function fly();
}

class Eagle extends Animal implements Flyable {
  public function makeSound() {
    echo "Звук орла!";
  }

  public function fly() {
    echo "Орел летит.";
  }
}

$eagle = new Eagle("Орел");
$eagle->makeSound();
$eagle->fly();

```

_________________________________________
_________________________________________
_________________________________________

Мы имеем абстрактный класс Animal с двумя свойствами и двумя абстрактными методами, которые должны быть реализованы в дочерних классах:

```php
abstract class Animal {
  protected $name;
  protected $age;

  public function __construct($name, $age) {
    $this->name = $name;
    $this->age = $age;
  }

  abstract public function makeSound();
  abstract public function move();
}

```

Теперь мы создадим классы Cat и Dog, которые будут наследоваться от класса Animal и реализовывать его абстрактные методы:

```php
class Cat extends Animal {
  public function makeSound() {
    echo "Мяу!";
  }

  public function move() {
    echo "Кошка бежит";
  }
}

class Dog extends Animal {
  public function makeSound() {
    echo "Гав!";
  }

  public function move() {
    echo "Собака бежит";
  }
}

```

Мы также можем создать интерфейс Mammal(млекопетающее) с одним методом, который должен быть реализован в классах, которые реализуют этот интерфейс:

```php
interface Mammal {
  public function feed();
}

```

Теперь мы создадим классы Cat и Dog, которые будут наследоваться от класса Animal и реализовывать интерфейс Mammal:

```php
class Cat extends Animal implements Mammal {
  public function makeSound() {
    echo "Мяу!";
  }

  public function move() {
    echo "Кошка бежит";
  }

  public function feed() {
    echo "Кормлю кота";
  }
}

class Dog extends Animal implements Mammal {
  public function makeSound() {
    echo "Гав!";
  }

  public function move() {
    echo "Собака бежит";
  }

  public function feed() {
    echo "Кормлю собаку";
  }
}

```

Теперь мы можем создать объекты классов Cat и Dog и вызвать их методы:

```php
$cat = new Cat("Мурзик", 3);
$cat->makeSound(); // Выводит "Мяу!"
$cat->move(); // Выводит "Кошка бежит"
$cat->feed(); // Выводит "Кормлю кота"

$dog = new Dog("Барсик", 5);
$dog->makeSound(); // Выводит "Гав!"
$dog->move(); // Выводит "Собака бежит"
$dog->feed(); // Выводит "Кормлю собаку"

```

Обратите внимание, что классы Cat и Dog унаследовали свойства и методы класса Animal и реализовали абстрактные методы, а также реализовали метод feed() из интерфейса Mammal.

______________________________
______________________________
______________________________

# Домашнее задание

## Задача 1

Необходимо создать интерфейс PersonInterface с методом getInfo().\
Создать абстрактный класс Person, который будет реализовывать интерфейс PersonInterface и иметь свойства name и age.\
Создать класс Student, наследующий класс Person и реализующий метод getInfo().\
Класс Student должен иметь свойство major (специализация), которое устанавливается через конструктор.

## Задача 2

Реализуйте абстрактный класс Vehicle(транспортное средство) с защищенными свойствами brand и model, абстрактным методом getInfo() и общим методом startEngine().

Реализуйте интерфейс ElectricVehicle с методами setBatteryLife() и getBatteryLife().

Создайте класс Car, наследующийся от Vehicle и реализующий интерфейс ElectricVehicle. \
В классе Car реализуйте методы getInfo(), setBatteryLife() и getBatteryLife().

## Задача 3

Необходимо создать класс Calculator, который будет иметь методы для основных математических операций (сложение, вычитание, умножение, деление). \
Класс должен реализовывать интерфейс MathOperations, который определяет методы для математических операций, и абстрактный класс BaseCalculator, который содержит общие методы для всех калькуляторов.

## Задача 4

______________________________
void - это тип возвращаемого значения метода, который означает, что метод не возвращает никакого значения.

Если метод объявлен как void, это означает, что он не возвращает какое-либо значение в вызывающий код.

______________________________

Необходимо:

Реализовать абстрактный класс BankAccount, который будет содержать следующие защищенные свойства: баланс (balance) и имя владельца (ownerName). \
Также создать конструктор для инициализации этих свойств. \
В классе BankAccount должны быть определены методы для получения баланса (getBalance) и внесения денег на счет (deposit). \
Необходимо определить абстрактный метод для снятия денег со счета (withdraw).


Создать два класса, наследующихся от абстрактного класса BankAccount: CheckingAccount и SavingsAccount. \
Каждый из этих классов должен иметь свои уникальные свойства (например, комиссия за снятие денег для CheckingAccount и процентная ставка для SavingsAccount) и реализовать метод снятия денег со счета (withdraw) с учетом своих особенностей.

Создать интерфейс Transferable с методом для перевода денег с одного счета на другой.

Создать класс Bank для управления счетами.\
В этом классе должны храниться объекты счетов (BankAccount) в виде массива или другой структуры данных. \
Реализовать методы для добавления нового счета (addAccount), перевода денег со счета на счет (transfer) и получения всех счетов (getAllAccounts).

Создать два объекта счетов: один для CheckingAccount и один для SavingsAccount.\
Вывести информацию о счетах до и после перевода денег со сберегательного счета на текущий счет.

В результате выполнения задания вы создадите иерархию классов и интерфейсов для работы с банковскими счетами. \
Это позволит смоделировать работу банка, осуществлять операции по внесению, снятию и переводу денег между счетами, а также отслеживать состояние каждого счета.

## Решение

```php
<?php
interface BankAccountInterface {
    public function getBalance(): float; // метод для получения баланса счета
    public function deposit(float $amount): void; // метод для пополнения счета
    public function withdraw(float $amount): void; // метод для снятия денег со счета
    public function transferTo(float $amount, BankAccount $account): void; // метод для перевода денег на другой счет
    public function getInfo(): string; //  метод для получения информации о счете, возвращает строку
}


// Абстрактный класс банковского счета
abstract class BankAccount implements BankAccountInterface {
    protected float $balance;
    protected string $ownerName;

    public function __construct(string $ownerName, float $balance = 0) {
        $this->balance = $balance;
        $this->ownerName = $ownerName;
    }

    public function getBalance(): float {
        return $this->balance;
    }

    public function deposit(float $amount): void {
        $this->balance += $amount;
    }

    abstract public function withdraw(float $amount): void;

    public function transferTo(float $amount, BankAccount $account): void {
        if ($this->balance - $amount >= 0) {
            $this->balance -= $amount;
            $account->deposit($amount);
        } else {
            throw new Exception("Недостаточно средств");
        }
    }

    /*
      BankAccount $account в методе transferTo класса CheckingAccount означает,
    что в качестве второго аргумента метода можно передать объект класса BankAccount или любого его наследника,
    потому что CheckingAccount является наследником BankAccount.
     */

    public function getInfo(): string {
        return "Счет {$this->ownerName}<br>" .
            "Баланс: {$this->balance} руб.";
    }
}

interface CheckingAccountInterface {
    // public function getBalance(): float;
    // public function deposit(float $amount): void;
    public function withdraw(float $amount): void; // Снятие со счета заданной суммы и комиссии за операцию
    // public function transferTo(float $amount, BankAccount $account): void;
    // public function getInfo(): string;
    public function getFee(): float;  // Получение текущей комиссии за операции со счетом
    public function setFee(float $fee): void; // Изменение текущей комиссии за операции со счетом
}


// Класс для расчетного (чекового) счета
class CheckingAccount extends BankAccount implements CheckingAccountInterface {
    private float $fee;

    public function __construct(string $ownerName, float $balance = 0, float $fee = 0) {
        parent::__construct($ownerName, $balance);
        $this->fee = $fee;
    }

    public function withdraw(float $amount): void {
        $this->balance -= $amount + $this->fee;
    }

    public function getFee(): float {
        return $this->fee;
    }

    public function setFee(float $fee): void {
        $this->fee = $fee;
    }

    public function getInfo(): string {
        return parent::getInfo() . "<br>" .
            "Комиссия: {$this->fee} руб.";
    }
}

interface SavingsAccountInterface {
    // public function getBalance(): float;
    //public function deposit(float $amount): void;
    public function withdraw(float $amount): void; // Снятие со счета заданной суммы
    public function addInterest(): void; // Добавление процентов на остаток счета в соответствии с текущей процентной ставкой
    public function getInfo(): string; // Получение информации о счете
}


// Класс для сберегательного счета
class SavingsAccount extends BankAccount implements SavingsAccountInterface {
    private float $interestRate;

    public function __construct(string $ownerName, float $balance = 0, float $interestRate = 0) {
        parent::__construct($ownerName, $balance);
        $this->interestRate = $interestRate;
    }

    public function withdraw(float $amount): void {
        if ($this->balance - $amount >= 0) {
            $this->balance -= $amount;
        } else {
            throw new Exception("Недостаточно средств");
        }
    }

        public function addInterest(): void {
        $this->balance += $this->balance * ($this->interestRate / 100);
    }

    public function getInfo(): string {
        return parent::getInfo() . "<br>" .
            "Процентная ставка: {$this->interestRate}%";
    }
}

/*
interface BankInterface {
    public function addAccount(BankAccount $account): void; // Добавление нового банковского счета в банк
    public function transfer(float $amount, BankAccount $account1, BankAccount $account2): void; // Перевод денежных средств между банковскими счетами
}


// Класс для банка
class Bank implements BankInterface{
    private array $accounts;

    public function __construct() {
        $this->accounts = [];
    }

    public function addAccount(BankAccount $account): void {
        $this->accounts[] = $account;
    }

    public function transfer(float $amount, BankAccount $account1, BankAccount $account2): void {
        $account1->transferTo($amount, $account2);
    }
}

// Класс Bank предоставляет функционал для управления счетами.

*/

// Создаем объекты счетов
$checking = new CheckingAccount("Иван Сергеев", 1000, 10);
$savings = new SavingsAccount("Анна Петрова", 5000, 5);

// Выводим информацию о счетах до операций
if ($checking instanceof CheckingAccount) {
    echo $checking->getInfo() . "<br>";
}

if ($savings instanceof SavingsAccount) {
    echo $savings->getInfo() . "<br>";
}

// Переводим деньги со сберегательного счета на текущий
$savings->transferTo(2000, $checking);

// Выводим информацию о счетах до операций
if ($checking instanceof CheckingAccount) {
    echo $checking->getInfo() . "<br>";
}

if ($savings instanceof SavingsAccount) {
    echo $savings->getInfo() . "<br>";
}

// Переводим деньги со сберегательного счета на текущий
$savings->transferTo(2000, $checking);

// Выводим информацию о счетах после операций
if ($checking instanceof CheckingAccount) {
    echo $checking->getInfo() . "<br>";
}

if ($savings instanceof SavingsAccount) {
    echo $savings->getInfo() . "<br>";
}



```
