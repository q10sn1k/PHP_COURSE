<?php

abstract class BankAccount
{
    protected float $balance;
    protected float $ownerName;

    public function __construct(string $ownerName, float $balance = 0)
    {
        $this->balance = $balance;
        $this->ownerName;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function deposit(float $amount) {
        $this->balance += $amount;
    }

    public function transferTo(float $amount, BankAccount $account) {
        if ($this->balance - $amount >= 0) {
            $this->balance -= $amount;
            $account->deposit($amount);
        } else {
            throw new Exception("Недостаточно средств");
        }
    }

    public function getInfo(): string {
        return "Счет {$this->ownerName}<br>" .
            "Баланс: {$this->balance}";
    }

    abstract public function withdraw(float $amount);
}