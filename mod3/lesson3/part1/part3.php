<?php
class User
{
    // создаем свойства
    public $name;
    private $age;

    // cоздаем методы (метод по сути, тоже самое что и функция, только реализовывается в классе)

    public function show_name(){
        // Вернем значение свойства name
        return $this->name;
    }

    public function set_name($name){
        // в свойство $name запишем значение $name
        $this->name = $name;
    }

    public function set_age($age){
        // проверим возраст на корректность
        if ($this->validate_age($age)){
            $this->age = $age;
        }
    }

    public function show_age(){
        return $this->age;
    }


    // метод валидации (проверки на корректность) возравста:
    private function validate_age($age)
    {
        return $age >= 18;
    }
}

/*
  модификатор доступа public перед свойствами и методами (public $name;)
  указывает что это свойства и методы доступны за пределами класса
 */

$user1 = new User();
$user1->name = 'Ivan';
// $user1->age = 28; // поскольку свойство age имеет модифактор досступа private, то так нельзя установить значение свойства $age

/*
  модификатор доступа private перед свойствами и методами (private $age;)
  указывает на то, что эти свойства и методы не доступны за пределами класса
 */

$user1->set_age(29);
$name_user_1 = $user1->name;
$age_user_1 = $user1->show_age();
echo "Name - $name_user_1| Age - $age_user_1";
echo '<br>';
$user1->set_age(10);
echo "Name - $name_user_1| Age - $age_user_1";
echo '<br>';