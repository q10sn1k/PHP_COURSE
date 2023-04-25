<?php

class UserList
{   
    // Объявляем переменную $pdo, которую используем для подключения к базе данных
    private PDO $pdo;

    // https://www.php.net/manual/ru/book.pdo.php
    public function __construct()
    {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME; // формируем строку подключения к БД
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]; // устанавливаем параметры подключения

        try {
            $this->pdo = new PDO($dsn, DB_USER, DB_PASS, $options); // Подключение к БД
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage()); // В случае ошибки подключения к БД получаем сообщение об ошибке и прерваем выполнение скрипта
        }
    }

    // метод добавления нового пользователя в БД
    public function addUser(User $user): void
    {
        // Подготовим запрос на добавление нового пользователя (новой записи) в таблицу users
        $stmt = $this->pdo->prepare("INSERT INTO users (name, surname, email) VALUES (?, ?, ?)");

        // Выполним запрос, передавая значения параметров в качестве аргументов
        $stmt->execute([$user->getName(), $user->getSurname(), $user->getEmail()]);

        // Получаем id добавленной записи и устанавлем его как id пользователя
        $user->setId($this->pdo->lastInsertId());
    }

    // метод удаления пользователя из базы данных
    public function removeUser(User $user): void
    {
        // Подготовим запрос на удаление пользователя (записи) из таблицы users
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");

        // Выполним запрос, передавая значения параметров в качестве аргументов
        $stmt->execute([$user->getId()]);
    }

    // метод получения списка пользователей из БД
    public function getUsers(): array
    {
        // подготовим запрос на выборку всех записей из таблицы users
        $stmt = $this->pdo->prepare("SELECT * FROM users");
        
        // выполним запрос
        $stmt->execute();
        
        // получим все строки результата в виде ассоциативного массива
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // создадим постой массив для хранения объектов User
        $users = [];
        // переберем циклом foreach все строки результата
        foreach ($rows as $row)
        {
            // создаем объект User и добавляем его в массив $users
            $users = new User($row['id'], $row['name'], $row['surname'], $row['email']);
        }

        // возвращаем массив объектов User
        return $users;
    }
}