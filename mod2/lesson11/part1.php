<?php

/*
    для начала необходимо создать базу данных.

    База данных создается командой - CREATE DATABASE название_базы_данных.

    Пример: CREATE DATABASE mydabase;
    лучше писать защищенный запром:

    create database if not exists название_базы_данных;

    Пример: CREATE DATABASE IF NOT EXISTS users;


    Выберем базу данных командой - USE название_базы_данных.

    Пример: USE mydatabase; - указываем базу данных с которой хотим работать

    Создаем таблицу командой - CREATE TABLE.


    Пример (создадим таблицу users с полями id, name, email):

     CREATE TABLE users (
        id INT(11) NOT NULL AUTO_INCREMENT,
        name VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        PRIMARY KEY (id)
     );

    Поле id является уникальных идентификатором записей в таблице, поэтому для его
    создания мы используем ключевое слово AUTO_INCREMENT

    Поля name и email являются строковыми
    и не могут быть пустыми (VARCHAR(50) NOT NULL)





    Для добавления данных в таблицу используется команда INSERT INTO

    Пример: INSERT INTO users (name, email) VALUES ('Sergey', 'sergey@example.com');


    Для выборки (чтения) данных из таблицы используется команда - SELECT;

    Пример:
    1) SELECT * FROM users;
    2) SELECT name FROM users WHERE id = 1;
    3) SELECT name, email FROM users WHERE name = 'Sergey';
    4) SELECT * FROM users WHERE name = 'Sergey' AND email = 'sergey@example.com';


    Для обновления данных используется команда - UPDATE

    Пример: UPDATE users SET name = 'Sergey Ivanov' WHERE id = 1;

    Важным условие является наличие WHERE - (WHERE id = 1).
    Если мы не добавим условие WHERE при обновлении данных, то мы можем испортить
    данные в таблицы. Поэтому важно наличие условия WHERE.


    Для удаления записи из таблицы мы используем команду DELETE.

    ПРИМЕР:  DELETE FROM users WHERE id = 3;

    Для удаления базы данных используется команда DROP DATABASE;

    пример: DROP DATABASE mydatabase;



    Отобразить структурy таблицы:
    DESCRIBE название_таблицы;


     пример: DESCRIBE users_data;
     результат -
+---------+-------------+------+-----+---------+----------------+
| Field   | Type        | Null | Key | Default | Extra          |
+---------+-------------+------+-----+---------+----------------+
| id      | int         | NO   | PRI | NULL    | auto_increment |
| name    | varchar(50) | NO   |     | NULL    |                |
| email   | varchar(50) | NO   |     | NULL    |                |
| age     | int         | NO   |     | NULL    |                |
| country | varchar(50) | NO   |     | NULL    |                |
| balance | float       | NO   |     | NULL    |                |
+---------+-------------+------+-----+---------+----------------+
6 rows in set (0.00 sec)

//________________________________________________________
//________________________________________________________
//________________________________________________________
//________________________________________________________
//________________________________________________________
//________________________________________________________
//________________________________________________________

mysql> INSERT INTO users_data (name, email, age, country, balance) VALUES
    -> ('Ivan', 'ivan@example.com', 25, 'RUSSIA', 50000),
    -> ('Sergey', 'serget@example.com', 45, 'RUSSIA', 70000),
    -> ('Nikolay', 'nikolay@example.com', 30, 'RUSSIA', 65000),
    -> ('Gleb', 'gleb@example.com', 25, 'RUSSIA', 90000),
    -> ('Andrew', 'andrew@example.com', 23, 'RUSSIA', 98000.00),
    -> ('Mark', 'mark@example.com', 36, 'RUSSIA', 120000),
    -> ('Jonh', 'jonh@example.com', 25, 'usa', 47000),
    -> ('Bob', 'bob@example.com', 25, 'usa', 77000);
Query OK, 8 rows affected (0.00 sec)
Records: 8  Duplicates: 0  Warnings: 0

mysql> SELECT * FROM users;
ERROR 1146 (42S02): Table 'users.users' doesn't exist
mysql> show tables;
+-----------------+
| Tables_in_users |
+-----------------+
| users_data      |
+-----------------+
1 row in set (0.00 sec)

mysql> SELECT * FROM users_data;
+----+---------+---------------------+-----+---------+---------+
| id | name    | email               | age | country | balance |
+----+---------+---------------------+-----+---------+---------+
|  1 | Ivan    | ivan@example.com    |  25 | RUSSIA  |   50000 |
|  2 | Sergey  | serget@example.com  |  45 | RUSSIA  |   70000 |
|  3 | Nikolay | nikolay@example.com |  30 | RUSSIA  |   65000 |
|  4 | Gleb    | gleb@example.com    |  25 | RUSSIA  |   90000 |
|  5 | Andrew  | andrew@example.com  |  23 | RUSSIA  |   98000 |
|  6 | Mark    | mark@example.com    |  36 | RUSSIA  |  120000 |
|  7 | Jonh    | jonh@example.com    |  25 | usa     |   47000 |
|  8 | Bob     | bob@example.com     |  25 | usa     |   77000 |
+----+---------+---------------------+-----+---------+---------+
8 rows in set (0.00 sec)

 */