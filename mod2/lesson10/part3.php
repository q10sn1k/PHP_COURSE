<?php

/*
    sql команды.

    show databases;  - отобразить базы данных

    create database название_базы_данных; - создает базу данных

    create database if not exists название_базы_данных; - " создай базу данных если она не существует ";

    USE название базы данных; - выбор базы данных с которой мы будем работать;

    Базы данных состоят из таблиц.

    Создадим таблицу данные о сотруднике
 CREATE TABLE employee_date
    (
    id int unsigned not null auto_increment primary key,
    f_name varchar(20),
    l_name varchar(20),
    age int,
    salary int,
    perks int,
    email varchar(60)
    );


    Отобразить структурц таблицы:
    DESCRIBE название_таблицы;

    Добавим запись в таблицу
    INSERT INTO employee_date
    (f_name, l_name, age, salary, perks, email)
    values
    ("Иван", "Петров", 30, 70000, 4, "ivan@ya.ru");

    INSERT INTO employee_date
    (f_name, l_name, age, salary, perks, email)
    values
    ("Денис", "Сидоров", 40, 70000, 4, "sidorov@ya.ru");

    INSERT INTO employee_date
    (f_name, l_name, age, salary, perks, email)
    values
    ("Петр", "Петров", 25, 60000, 3, "petrov@ya.ru");


    Выбрать все данные из название таблицы

    SELECT * FROM employee_date;

    Выбрать все данные по условию  SELECT * FROM employee_date WHERE age = 25;

 */