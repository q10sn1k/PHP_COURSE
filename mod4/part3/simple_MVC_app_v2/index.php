<?php

require_once 'model/User.php';
require_once 'model/UserList.php';
require_once 'view/UserView.php';
require_once 'controller/UserController.php';

$userList = new UserList();
$userView = new UserView($userList);
$userController = new UserController($userList, $userView);

// Если форма отправлена, добавляем нового пользователя
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $surname = $_POST['surname'] ?? '';
    $email = $_POST['email'] ?? '';

    if ($name && $surname && $email) {
        $user = new User(0, $name, $surname, $email);
        $userController->addUser($user);
    }
}

// Если запрос GET и есть параметр "delete", удаляем пользователя
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    $user = new User($id, '', '', '');
    $userController->removeUser($user);
}

// Отображаем список пользователей и форму для добавления новых
$userView->render();