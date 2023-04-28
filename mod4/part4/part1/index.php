<?php

/*
    1) ДЗ - вынести классы в корректные файлы и директории в соответсии в архитектурой MVC

    2) Установить Docker - https://www.docker.com/products/docker-desktop/
*/

// реализуем Модель (отвечает за работу с данными приложения)
class User
{
    private string $name;
    private string $surname;
    private string $email;

    public function __construct($name, $surname, $email)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;        
    }

    public function getName(): string
    {
         return $this->name;
    }

    public function getSurname(): string
    {
         return $this->surname;
    }

    public function getEmail(): string
    {
         return $this->email;
    }
}
/*
    Модель User необходимо вынести в файл models/User.php и подключить в файл index.php
*/

// Вспомогательный класс для хранения списка пользователей
class UserList
{
    private array $users = [];

    public function addUsers(User $user): void
    {
        $this->users[] = $user;
    }

    public function removeUser(User $user): void
    {
        foreach ($this->users as $key => $value) {
            if ($value === $user) {
                unset($this->users[$key]);
            }
        }
    }
}
/*
    Вспомогательный класс UserList необходимо вымести в файл classes/UserList.php и подключить в файл index.php
*/

// реализуем класс UserView для отображения списка пользователей
class UserView
{
    private UserList $userList;

    public function __construct(UserList $userList)
    {
        $this->userList = $userList;
    }

    public function render(): void{
        echo '<table>';
        echo '<tr><th>Name</th><th>Surname</th><th>Email</th><th>Actions</th></tr>';
        foreach ($this->userList->getUsers() as $user) {
            echo '<tr>';
            echo '<td>' . $user->getName() . '</td>';
            echo '<td>' . $user->getSurname() . '</td>';
            echo '<td>' . $user->getEmail() . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
}
/*
    Представление(View) UserView.php необходимо вынести в файл view/UserView.php и подключить в файл index.php
*/

// реализуем класс UserController для обработки списка пользователей
class UserController
{
    private UserList $userList;
    private UserView $userView;

    public function __construct(UserList $userList, UserView $userView)
    {
        $this->userList = $userList;
        $this->userView = $userView;
    }

    public function addUser(User $user): void
    {
        $this->userList->addUser($user);
    }

    public function removeUser(User $user): void
    {
        $this->userList->removeUser($user);
    }
    public function renderUserList(User $user): void
    {
        $this->userView->render();
    }
}
/*
    Контроллер(Controller) UserController.php необходимо вынести в файл controller/UserController.php и подключить в файл index.php
*/


/*
    В индексном файле подключить наши классы и добавить несколько пользователей. 
    
    В коментарии описать логику работы архитектуры MVC.
    
    Пример: https://github.com/q10sn1k/PHP_COURSE/blob/main/mod4/part3/simple_MVC_app_v1/index.php

    Прикрепить к домашнему заданию 1 в LMS
    */