<?php

require_once 'model/User.php';
require_once 'model/UserList.php';
require_once 'view/UserView.php';
require_once 'controller/UserController.php';

$userList = new UserList();
$userView = new UserView($userList);
$userConroller = new UserController($userList, $userView);

// Добавляем пользователей в БД
$userConroller->addUser(new User(1, 'Ivan', 'Ivanov', 'ivan$example.com'));
$userConroller->addUser(new User(1, 'Andrew', 'Andreew', 'andrew$example.com'));
$userConroller->addUser(new User(1, 'Sergey', 'Sergeev', 'sergey$example.com'));

// Отобразим список пользователей
$userConroller->renderUserList();