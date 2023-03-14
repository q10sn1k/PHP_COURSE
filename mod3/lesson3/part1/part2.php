<?php

class User
{
    // создаем свойства
    public $name;
    public $age;

    // cоздаем методы (метод по сути, тоже самое что и функция, только реализовывается в классе)

    public function show($subject){
        return $subject;
    }

    public function show_name(){
        // Вернем значение свойства name
        return $this->name;
    }

    public function set_name($name){
        // в свойство $name запишем значение $name
        $this->name = $name;
    }

    public function set_age($age){
        $this->age = $age;
    }

    public function show_age(){
        return $this->age;
    }
}

$user1 = new User();
$user1->name = 'Ivan';
$user1->age = 28;

// echo $user1->show_name(); // Ivan
//echo $user1->show_age();

$user1->set_name('Sergey');
// echo $user1->show_name();

$user1->set_age(18);
echo $user1->show_age();