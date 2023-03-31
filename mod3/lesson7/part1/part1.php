<?php

abstract class BankAccount {
    protected float $balance;
    protected string $ownerName;

    public function __construct(string $ownerName, float $balance) {
        $this->balance = $balance;
        $this->ownerName = $ownerName;
    }

    abstract function withdraw($amount);

    public function deposit(float $amount) {
        $this->balance += $amount;
    }

    public function getInfo() {
        return "Счет {$this->ownerName}<br>" .
            "Баланс {$this->balance}";
    }
}