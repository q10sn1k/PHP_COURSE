<?php

class BankAccount {
    private $balance;

    public function __construct($balance = 0) {
        $this->balance = $balance;
    }

    public function getBalance() {
       return $this->balance;
    }

    // + счет
    public function deposit($amount) {
     $this->balance += $amount;
    }

    // - счет (если balance > amount)
    public function widhraw($amount) {
        if ($this->balance > $amount) {
            $this->balance -= $amount;
        } else {
            echo 'Not enough funds.';
        }
    }

}


$balance = new BankAccount(1000);
echo 'Current balance: '.$balance->getBalance();
echo '<br>';
$balance->deposit(500);
echo 'Current balance: '.$balance->getBalance();
echo '<br>';
$balance->widhraw(200);
echo 'Current balance: '.$balance->getBalance();
echo '<br>';
$balance->widhraw(2000);
echo '<br>';
echo 'Current balance: '.$balance->getBalance();