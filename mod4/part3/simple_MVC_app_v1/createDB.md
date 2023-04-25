```
mysql> CREATE DATABASE simple_mvc_app;
Query OK, 1 row affected (0.00 sec)

mysql> USE simple_mvc_app;
Database changed
mysql> CREATE TABLE users (
    -> id INT(11) NOT NULL AUTO_INCREMENT,
    -> name VARCHAR(255) NOT NULL,
    -> surname VARCHAR(255) NOT NULL,
    -> email VARCHAR(255) NOT NULL,
    -> PRIMARY KEY (id)
    -> );
Query OK, 0 rows affected, 1 warning (0.01 sec)

mysql> DESCRIBE users;
+---------+--------------+------+-----+---------+----------------+
| Field   | Type         | Null | Key | Default | Extra          |
+---------+--------------+------+-----+---------+----------------+
| id      | int          | NO   | PRI | NULL    | auto_increment |
| name    | varchar(255) | NO   |     | NULL    |                |
| surname | varchar(255) | NO   |     | NULL    |                |
| email   | varchar(255) | NO   |     | NULL    |                |
+---------+--------------+------+-----+---------+----------------+
4 rows in set (0.00 sec)
```


# Подключение к БД из терминала
```
mysql -u root -p
```