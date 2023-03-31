<?php
/*Необходимо:

* Реализовать абстрактный класс BankAccount, который будет содержать следующие защищенные свойства: баланс (balance) и имя владельца (ownerName).
Также создать конструктор для инициализации этих свойств. В классе BankAccount должны быть определены методы для получения баланса (getBalance) и внесения денег на счет (deposit).
Необходимо определить абстрактный метод для снятия денег со счета (withdraw).


Создать два класса, наследующихся от абстрактного класса BankAccount: CheckingAccount и SavingsAccount.
Каждый из этих классов должен иметь свои уникальные свойства (комиссия за снятие денег для CheckingAccount и процентная ставка для SavingsAccount) и реализовать метод снятия денег со счета (withdraw) с учетом своих особенностей.

Создать интерфейс Transferable с методом для перевода денег с одного счета на другой.

Создать класс Bank для управления счетами.
 В этом классе должны храниться объекты счетов (BankAccount) в виде массива или другой структуры данных. Реализовать методы для добавления нового счета (addAccount), перевода денег со счета на счет (transfer) и получения всех счетов (getAllAccounts).

Создать два объекта счетов: один для CheckingAccount и один для SavingsAccount.
Вывести информацию о счетах до и после перевода денег со сберегательного счета на текущий счет.

В итоге вы создадите иерархию классов и интерфейсов для работы с банковскими счетами.
 Это позволит смоделировать работу банка, осуществлять операции по внесению, снятию и переводу денег между счетами, а также отслеживать состояние каждого счета.
*/


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
    ( CheckingAccount является наследником BankAccount.)
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
