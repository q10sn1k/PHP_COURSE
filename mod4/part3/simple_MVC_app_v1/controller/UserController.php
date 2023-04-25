<?php

require_once 'model/User.php';
require_once 'model/UserList.php';
require_once 'view/UserView.php';

class UserController
{   
    // в свойстве $userList храним объект класса UserList
    private UserList $userList;
    // в свойствe $userView храним объект класса UserView
    private UserView $userView;

    public function __construct(UserList $userList, UserView $userView)
    {
        // Присваиваем переменной $userList переданный объект класса UserList
        $this->userList = $userList;
        // Присваиваем переменной $userView переданный объект класса UserView
        $this->userView = $userView;
    }

    // Метод добавения нового пользователя
    public function addUser(User $user): void
    {
        // Вызываем метод addUser у объекта $userList, предавая ему объект $user
        $this->userList->addUser($user);
    }

    // Метод удаления пользователя
    public function removeUser(User $user): void
    {
        // Вызываем метод removeUser у объекта $userList, предавая ему объект $user
        $this->userList->removeUser($user);
    }

    // Метод отображения списка пользователей
    public function renderUserList(): void
    {
        // Вызываем метод render у объекта UserView для отображения списка пользователей
        $this->userView->render();
    }
}