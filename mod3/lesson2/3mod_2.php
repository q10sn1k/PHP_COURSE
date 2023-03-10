<?php
/*
CREATE TABLE orders (
    id INT(11) NOT NULL AUTO_INCREMENT,
    user_id INT(11) NOT NULL,
    product_name VARCHAR(50) NOT NULL,
    price FLOAT NOT NULL,
    quantity INT(11) NOT NULL,
    order_date DATE NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users(id)
    );


INSERT INTO orders (user_id, product_name, price, quantity, order_date) VALUES
    (1, 'Product A', 10.00, 2, '2022-02-20');


INSERT INTO orders (user_id, product_name, price, quantity, order_date) VALUES
    (2, 'Product B', 20.00, 1, '2022-02-22'),
    (2, 'Product C', 15.00, 3, '2022-02-23'),
    (1, 'Product D', 12.00, 2, '2022-02-25'),
    (2, 'Product E', 25.00, 1, '2022-02-26');


Вложенные запросы.

Влоденные запросы позволяют использовать результат одного запроса в качестве входных данных для другого запроса

SELECT * FROM orders WHERE user_id = (SELECT id FROM users WHERE name = 'Gleb');

+----+---------+--------------+-------+----------+------------+
| id | user_id | product_name | price | quantity | order_date |
+----+---------+--------------+-------+----------+------------+
|  2 |       2 | Product B    |    20 |        1 | 2022-02-22 |
|  3 |       2 | Product C    |    15 |        3 | 2022-02-23 |
|  5 |       2 | Product E    |    25 |        1 | 2022-02-26 |
+----+---------+--------------+-------+----------+------------+


UNION

UNION используется для объединения двух или более SELECT запросов в один набор результатов

SELECT id, name, email, 'user' AS source FROM users
    UNION
    SELECT id, product_name, order_date, 'order' AS source FROM orders;


+----+-----------+---------------------+--------+
| id | name      | email               | source |
+----+-----------+---------------------+--------+
|  1 | Ivan      | ivan@example.com    | user   |
|  2 | Gleb      | gleb@example.com    | user   |
|  3 | Sergey    | sergey@example.com  | user   |
|  4 | Andrew    | andrew@example.com  | user   |
|  6 | Tom       | tom@example.com     | user   |
|  7 | Bob       | bob@example.com     | user   |
|  8 | Sergey    | sergey@2example.com | user   |
|  9 | Stas      | stas@example.com    | user   |
|  1 | Product A | 2022-02-20          | order  |
|  2 | Product B | 2022-02-22          | order  |
|  3 | Product C | 2022-02-23          | order  |
|  4 | Product D | 2022-02-25          | order  |
|  5 | Product E | 2022-02-26          | order  |
+----+-----------+---------------------+--------+


INNER JOIN - это тип объединения, который выбирает только те строки, которые имеют соответствующие значения в
обеих таблицах.
Он соединяет строки из таблицы слева с теми, которые имеют соответствующие значения в таблице справа.

Синтаксис запроса INNER JOIN:

SELECT *
FROM table1
INNER JOIN table2
ON table1.column = table2.column;

Здесь table1 и table2 - имена таблиц, а column - название стобцов, которые используются для объединения 2-х таблиц.


SELECT users.name, users.email, orders.id, orders.product_name, orders.order_date
    FROM users
    INNER JOIN orders
    ON users.id = orders.user_id;

+------+------------------+----+--------------+------------+
| name | email            | id | product_name | order_date |
+------+------------------+----+--------------+------------+
| Ivan | ivan@example.com |  1 | Product A    | 2022-02-20 |
| Gleb | gleb@example.com |  2 | Product B    | 2022-02-22 |
| Gleb | gleb@example.com |  3 | Product C    | 2022-02-23 |
| Ivan | ivan@example.com |  4 | Product D    | 2022-02-25 |
| Gleb | gleb@example.com |  5 | Product E    | 2022-02-26 |


LEFT JOIN - это тип объединения, который выбирает все строки из таблицы А (левой таблицы),
а также вернет строки из ТАБЛИЦЫ B (правой таблицы).
Если в таблице B (правой таблице) нет соответствующих строк, то в результате будут возвращены значения NULL

Синтаксис запроса LEFT JOIN:

SELECT *
FROM table1
LEFT JOIN table2
ON table1.column = table2.column;


SELECT users.name, orders.product_name, orders.price
    -> FROM users
    -> LEFT JOIN orders
    -> ON users.id = orders.user_id;


+--------+--------------+-------+
| name   | product_name | price |
+--------+--------------+-------+
| Ivan   | Product A    |    10 |
| Ivan   | Product D    |    12 |
| Gleb   | Product B    |    20 |
| Gleb   | Product C    |    15 |
| Gleb   | Product E    |    25 |
| Sergey | NULL         |  NULL |
| Andrew | NULL         |  NULL |
| Tom    | NULL         |  NULL |
| Bob    | NULL         |  NULL |
| Sergey | NULL         |  NULL |
| Stas   | NULL         |  NULL |
+--------+--------------+-------+


Здесь table1 и table2 - имена таблиц, а column - название стобцов, которые используются для объединения 2-х таблиц.
 */