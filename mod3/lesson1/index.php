<?php
/*
 Enter password: ********
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 13
Server version: 8.0.32 MySQL Community Server - GPL

Copyright (c) 2000, 2023, Oracle and/or its affiliates.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> SHOW DATABASES;
+--------------------+
| Database           |
+--------------------+
| example            |
| information_schema |
| mydatabase         |
| mysql              |
| performance_schema |
| sakila             |
| sys                |
| users              |
| world              |
+--------------------+
9 rows in set (0.00 sec)

mysql> USE example;
Database changed
mysql> SHOW TABLES;
Empty set (0.00 sec)

mysql> CREATE TABLE users (
    -> id INT(11) NOT NULL AUTO_INCREMENT,
    -> name VARCHAR(50) NOT NULL,
    -> email VARCHAR(50) NOT NULL,
    -> age INT(11) NOT NULL,
    -> country VARCHAR(50) NOT NULL,
    -> balance FLOAT NOT NULL,
    -> PRIMARY KEY (id)
    -> );
Query OK, 0 rows affected, 2 warnings (0.02 sec)

mysql> SHOW TABLES;
+-------------------+
| Tables_in_example |
+-------------------+
| users             |
+-------------------+
1 row in set (0.00 sec)

mysql> DESCRIBE users;
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
6 rows in set (0.01 sec)

mysql> INSERT INTO users (name, email, age, country, balance) VALUES
    -> ('Ivan', 'ivan@example.com', 25, 'RUS', 100000.00);
Query OK, 1 row affected (0.01 sec)

mysql> SELECT * FROM users;
+----+------+------------------+-----+---------+---------+
| id | name | email            | age | country | balance |
+----+------+------------------+-----+---------+---------+
|  1 | Ivan | ivan@example.com |  25 | RUS     |  100000 |
+----+------+------------------+-----+---------+---------+
1 row in set (0.00 sec)

mysql> SELECT id, name, email, age,country, balance FROM users;
+----+------+------------------+-----+---------+---------+
| id | name | email            | age | country | balance |
+----+------+------------------+-----+---------+---------+
|  1 | Ivan | ivan@example.com |  25 | RUS     |  100000 |
+----+------+------------------+-----+---------+---------+
1 row in set (0.00 sec)

mysql> SELECT id, name, age, balance FROM users;
+----+------+-----+---------+
| id | name | age | balance |
+----+------+-----+---------+
|  1 | Ivan |  25 |  100000 |
+----+------+-----+---------+
1 row in set (0.00 sec)

mysql> INSERT INTO users (name, email, age, country, balance) VALUES
    -> ('Gleb', 'gleb@example.com', 26, 'RUS', 90000.00),
    -> ('Sergey', 'sergey@example.com', 28, 'RUS', 120000.00),
    -> ('Andrew', 'andrew@example.com', 24, 'RUS', 95000.00),
    -> ('Bob', 'bob@example.com', 25, 'USA', 100000.00),
    -> ('Tom', 'tom@example.com', 29, 'USA', 110000.00);
Query OK, 5 rows affected (0.00 sec)
Records: 5  Duplicates: 0  Warnings: 0

mysql> SELECT * FROM users;
+----+--------+--------------------+-----+---------+---------+
| id | name   | email              | age | country | balance |
+----+--------+--------------------+-----+---------+---------+
|  1 | Ivan   | ivan@example.com   |  25 | RUS     |  100000 |
|  2 | Gleb   | gleb@example.com   |  26 | RUS     |   90000 |
|  3 | Sergey | sergey@example.com |  28 | RUS     |  120000 |
|  4 | Andrew | andrew@example.com |  24 | RUS     |   95000 |
|  5 | Bob    | bob@example.com    |  25 | USA     |  100000 |
|  6 | Tom    | tom@example.com    |  29 | USA     |  110000 |
+----+--------+--------------------+-----+---------+---------+
6 rows in set (0.00 sec)

mysql> SELECT * FROM users WHERE age > 26;
+----+--------+--------------------+-----+---------+---------+
| id | name   | email              | age | country | balance |
+----+--------+--------------------+-----+---------+---------+
|  3 | Sergey | sergey@example.com |  28 | RUS     |  120000 |
|  6 | Tom    | tom@example.com    |  29 | USA     |  110000 |
+----+--------+--------------------+-----+---------+---------+
2 rows in set (0.00 sec)

mysql> SELECT * FROM users WHERE age > 26 AND country = 'RUS';
+----+--------+--------------------+-----+---------+---------+
| id | name   | email              | age | country | balance |
+----+--------+--------------------+-----+---------+---------+
|  3 | Sergey | sergey@example.com |  28 | RUS     |  120000 |
+----+--------+--------------------+-----+---------+---------+
1 row in set (0.00 sec)

mysql> SELECT * FROM users;
+----+--------+--------------------+-----+---------+---------+
| id | name   | email              | age | country | balance |
+----+--------+--------------------+-----+---------+---------+
|  1 | Ivan   | ivan@example.com   |  25 | RUS     |  100000 |
|  2 | Gleb   | gleb@example.com   |  26 | RUS     |   90000 |
|  3 | Sergey | sergey@example.com |  28 | RUS     |  120000 |
|  4 | Andrew | andrew@example.com |  24 | RUS     |   95000 |
|  5 | Bob    | bob@example.com    |  25 | USA     |  100000 |
|  6 | Tom    | tom@example.com    |  29 | USA     |  110000 |
+----+--------+--------------------+-----+---------+---------+
6 rows in set (0.00 sec)

mysql> SELECT * FROM users ORDER BY balance;
+----+--------+--------------------+-----+---------+---------+
| id | name   | email              | age | country | balance |
+----+--------+--------------------+-----+---------+---------+
|  2 | Gleb   | gleb@example.com   |  26 | RUS     |   90000 |
|  4 | Andrew | andrew@example.com |  24 | RUS     |   95000 |
|  1 | Ivan   | ivan@example.com   |  25 | RUS     |  100000 |
|  5 | Bob    | bob@example.com    |  25 | USA     |  100000 |
|  6 | Tom    | tom@example.com    |  29 | USA     |  110000 |
|  3 | Sergey | sergey@example.com |  28 | RUS     |  120000 |
+----+--------+--------------------+-----+---------+---------+
6 rows in set (0.00 sec)

mysql> SELECT * FROM users ORDER BY balance DESC;
+----+--------+--------------------+-----+---------+---------+
| id | name   | email              | age | country | balance |
+----+--------+--------------------+-----+---------+---------+
|  3 | Sergey | sergey@example.com |  28 | RUS     |  120000 |
|  6 | Tom    | tom@example.com    |  29 | USA     |  110000 |
|  1 | Ivan   | ivan@example.com   |  25 | RUS     |  100000 |
|  5 | Bob    | bob@example.com    |  25 | USA     |  100000 |
|  4 | Andrew | andrew@example.com |  24 | RUS     |   95000 |
|  2 | Gleb   | gleb@example.com   |  26 | RUS     |   90000 |
+----+--------+--------------------+-----+---------+---------+
6 rows in set (0.00 sec)

mysql> SELECT * FROM users WHERE country LIKE 'R%';
+----+--------+--------------------+-----+---------+---------+
| id | name   | email              | age | country | balance |
+----+--------+--------------------+-----+---------+---------+
|  1 | Ivan   | ivan@example.com   |  25 | RUS     |  100000 |
|  2 | Gleb   | gleb@example.com   |  26 | RUS     |   90000 |
|  3 | Sergey | sergey@example.com |  28 | RUS     |  120000 |
|  4 | Andrew | andrew@example.com |  24 | RUS     |   95000 |
+----+--------+--------------------+-----+---------+---------+
4 rows in set (0.00 sec)

mysql> SELECT * FROM users WHERE balance IN (100000, 95000);
+----+--------+--------------------+-----+---------+---------+
| id | name   | email              | age | country | balance |
+----+--------+--------------------+-----+---------+---------+
|  1 | Ivan   | ivan@example.com   |  25 | RUS     |  100000 |
|  4 | Andrew | andrew@example.com |  24 | RUS     |   95000 |
|  5 | Bob    | bob@example.com    |  25 | USA     |  100000 |
+----+--------+--------------------+-----+---------+---------+
3 rows in set (0.00 sec)

mysql> SELECT * FROM users WHERE balance BETWEEN 95000 AND 110000;
+----+--------+--------------------+-----+---------+---------+
| id | name   | email              | age | country | balance |
+----+--------+--------------------+-----+---------+---------+
|  1 | Ivan   | ivan@example.com   |  25 | RUS     |  100000 |
|  4 | Andrew | andrew@example.com |  24 | RUS     |   95000 |
|  5 | Bob    | bob@example.com    |  25 | USA     |  100000 |
|  6 | Tom    | tom@example.com    |  29 | USA     |  110000 |
+----+--------+--------------------+-----+---------+---------+
4 rows in set (0.00 sec)

mysql> SELECT * FROM users;
+----+--------+--------------------+-----+---------+---------+
| id | name   | email              | age | country | balance |
+----+--------+--------------------+-----+---------+---------+
|  1 | Ivan   | ivan@example.com   |  25 | RUS     |  100000 |
|  2 | Gleb   | gleb@example.com   |  26 | RUS     |   90000 |
|  3 | Sergey | sergey@example.com |  28 | RUS     |  120000 |
|  4 | Andrew | andrew@example.com |  24 | RUS     |   95000 |
|  5 | Bob    | bob@example.com    |  25 | USA     |  100000 |
|  6 | Tom    | tom@example.com    |  29 | USA     |  110000 |
+----+--------+--------------------+-----+---------+---------+
6 rows in set (0.00 sec)

mysql> SELECT COUNT(*) FROM users WHERE country = 'RUS';
+----------+
| COUNT(*) |
+----------+
|        4 |
+----------+
1 row in set (0.00 sec)

mysql> SELECT COUNT(*) FROM users WHERE country = 'RUS' AND 90000;
+----------+
| COUNT(*) |
+----------+
|        4 |
+----------+
1 row in set (0.00 sec)

mysql> SELECT COUNT(*) FROM users WHERE country = 'RUS' AND balance = 90000;
+----------+
| COUNT(*) |
+----------+
|        1 |
+----------+
1 row in set (0.00 sec)

mysql> SELECT * FROM users;
+----+--------+--------------------+-----+---------+---------+
| id | name   | email              | age | country | balance |
+----+--------+--------------------+-----+---------+---------+
|  1 | Ivan   | ivan@example.com   |  25 | RUS     |  100000 |
|  2 | Gleb   | gleb@example.com   |  26 | RUS     |   90000 |
|  3 | Sergey | sergey@example.com |  28 | RUS     |  120000 |
|  4 | Andrew | andrew@example.com |  24 | RUS     |   95000 |
|  5 | Bob    | bob@example.com    |  25 | USA     |  100000 |
|  6 | Tom    | tom@example.com    |  29 | USA     |  110000 |
+----+--------+--------------------+-----+---------+---------+
6 rows in set (0.00 sec)

mysql> SELECT id, name, email, age, country, balance FROM users;
+----+--------+--------------------+-----+---------+---------+
| id | name   | email              | age | country | balance |
+----+--------+--------------------+-----+---------+---------+
|  1 | Ivan   | ivan@example.com   |  25 | RUS     |  100000 |
|  2 | Gleb   | gleb@example.com   |  26 | RUS     |   90000 |
|  3 | Sergey | sergey@example.com |  28 | RUS     |  120000 |
|  4 | Andrew | andrew@example.com |  24 | RUS     |   95000 |
|  5 | Bob    | bob@example.com    |  25 | USA     |  100000 |
|  6 | Tom    | tom@example.com    |  29 | USA     |  110000 |
+----+--------+--------------------+-----+---------+---------+
6 rows in set (0.00 sec)

mysql> SELECT name, country, balance FROM users;
+--------+---------+---------+
| name   | country | balance |
+--------+---------+---------+
| Ivan   | RUS     |  100000 |
| Gleb   | RUS     |   90000 |
| Sergey | RUS     |  120000 |
| Andrew | RUS     |   95000 |
| Bob    | USA     |  100000 |
| Tom    | USA     |  110000 |
+--------+---------+---------+
6 rows in set (0.00 sec)

mysql> SELECT AVG(balance) FROM users;
+--------------+
| AVG(balance) |
+--------------+
|       102500 |
+--------------+
1 row in set (0.00 sec)

mysql> SELECT SUM(balance) FROM users;
+--------------+
| SUM(balance) |
+--------------+
|       615000 |
+--------------+
1 row in set (0.00 sec)

mysql> SELECT MAX(balance) FROM users;
+--------------+
| MAX(balance) |
+--------------+
|       120000 |
+--------------+
1 row in set (0.00 sec)

mysql> SELECT MIN(balance) FROM users;
+--------------+
| MIN(balance) |
+--------------+
|        90000 |
+--------------+
1 row in set (0.00 sec)

mysql> SELECT * FROM users;
+----+--------+--------------------+-----+---------+---------+
| id | name   | email              | age | country | balance |
+----+--------+--------------------+-----+---------+---------+
|  1 | Ivan   | ivan@example.com   |  25 | RUS     |  100000 |
|  2 | Gleb   | gleb@example.com   |  26 | RUS     |   90000 |
|  3 | Sergey | sergey@example.com |  28 | RUS     |  120000 |
|  4 | Andrew | andrew@example.com |  24 | RUS     |   95000 |
|  5 | Bob    | bob@example.com    |  25 | USA     |  100000 |
|  6 | Tom    | tom@example.com    |  29 | USA     |  110000 |
+----+--------+--------------------+-----+---------+---------+
6 rows in set (0.00 sec)

mysql> UPDATE users SET balance = 110000 WHERE id = 2;
Query OK, 1 row affected (0.00 sec)
Rows matched: 1  Changed: 1  Warnings: 0

mysql> SELECT * FROM users WHERE id = 2;
+----+------+------------------+-----+---------+---------+
| id | name | email            | age | country | balance |
+----+------+------------------+-----+---------+---------+
|  2 | Gleb | gleb@example.com |  26 | RUS     |  110000 |
+----+------+------------------+-----+---------+---------+
1 row in set (0.00 sec)

mysql> SELECT * FROM users;
+----+--------+--------------------+-----+---------+---------+
| id | name   | email              | age | country | balance |
+----+--------+--------------------+-----+---------+---------+
|  1 | Ivan   | ivan@example.com   |  25 | RUS     |  100000 |
|  2 | Gleb   | gleb@example.com   |  26 | RUS     |  110000 |
|  3 | Sergey | sergey@example.com |  28 | RUS     |  120000 |
|  4 | Andrew | andrew@example.com |  24 | RUS     |   95000 |
|  5 | Bob    | bob@example.com    |  25 | USA     |  100000 |
|  6 | Tom    | tom@example.com    |  29 | USA     |  110000 |
+----+--------+--------------------+-----+---------+---------+
6 rows in set (0.00 sec)

mysql> DELETE FROM users WHERE id = 5;
Query OK, 1 row affected (0.00 sec)

mysql> SELECT * FROM users;
+----+--------+--------------------+-----+---------+---------+
| id | name   | email              | age | country | balance |
+----+--------+--------------------+-----+---------+---------+
|  1 | Ivan   | ivan@example.com   |  25 | RUS     |  100000 |
|  2 | Gleb   | gleb@example.com   |  26 | RUS     |  110000 |
|  3 | Sergey | sergey@example.com |  28 | RUS     |  120000 |
|  4 | Andrew | andrew@example.com |  24 | RUS     |   95000 |
|  6 | Tom    | tom@example.com    |  29 | USA     |  110000 |
+----+--------+--------------------+-----+---------+---------+
5 rows in set (0.00 sec)

mysql> INSERT INTO users (name, email, age, country, balance) VALUES
    -> ('Bob', 'bob@example.com', 35, 'USA', 97000.00),
    -> ('Sergey', 'sergey@2example.com', 30, 'RUS', 120000.00),
    -> ('Stas', 'stas@example.com', 32, 'RUS', 140000.00);
Query OK, 3 rows affected (0.00 sec)
Records: 3  Duplicates: 0  Warnings: 0

mysql> SELECT * FROM users;
+----+--------+---------------------+-----+---------+---------+
| id | name   | email               | age | country | balance |
+----+--------+---------------------+-----+---------+---------+
|  1 | Ivan   | ivan@example.com    |  25 | RUS     |  100000 |
|  2 | Gleb   | gleb@example.com    |  26 | RUS     |  110000 |
|  3 | Sergey | sergey@example.com  |  28 | RUS     |  120000 |
|  4 | Andrew | andrew@example.com  |  24 | RUS     |   95000 |
|  6 | Tom    | tom@example.com     |  29 | USA     |  110000 |
|  7 | Bob    | bob@example.com     |  35 | USA     |   97000 |
|  8 | Sergey | sergey@2example.com |  30 | RUS     |  120000 |
|  9 | Stas   | stas@example.com    |  32 | RUS     |  140000 |
+----+--------+---------------------+-----+---------+---------+
8 rows in set (0.00 sec)
 */