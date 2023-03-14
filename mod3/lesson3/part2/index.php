<?php
require_once 'User.php'; // Подключаем класс User

$user = new User("Andrew", 30);
$user->show_data();