<?php
class User
{
    private $name;
    public $age;

    // Конструктор вызывается в момент создания объекта класса
    public function __construct($name, $age)
    {
        // запишем данные в соответсвующие свойства
        $this->name = $name;
        $this->age = $age;
    }

    public function show_data(){
        echo "Имя - $this->name ||||| Возраст - $this->age";
    }

    // геттер свойства age
    /*
       геттер возвращет значение свойства
     */
    public function get_age(){
        return $this->age;
    }

    // сеттер свойчва age
    /*
      сеттер устанавливает значение свойства
     */
    public function set_age($age){
        $this->age = $age;
    }
}

// конструктор вызывается в момент создания объекста класса
$user = new User('Ivan', 29);
$user->show_data();
