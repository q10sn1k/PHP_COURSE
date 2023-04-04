# передача данных между клиентом и сервером через HTTP-запросы

Суперглобальные переменные - это специальные массивы, которые доступны в любой области видимости скрипта и содержат информацию о текущем запросе и среде исполнения PHP.

Например, если мы отправляем запрос на сервер методом GET, то значения параметров запроса будут доступны в массиве $_GET.\
Для получения значения параметра мы можем обратиться к элементу этого массива по имени параметра. 


```php
if (isset($_GET['name'])) {
    $name = $_GET['name'];
    echo "Привет, " . $name . "!";
}

```

Аналогично для метода POST значения параметров запроса будут доступны в массиве $_POST. \
Для получения значения параметра мы также можем обратиться к элементу массива по имени параметра. 


```php
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    echo "Привет, " . $name . "!";
}

```

Массив $_SERVER содержит информацию о текущем запросе и среде исполнения PHP. Рассмотрим использование некоторых элементов этого массива:

`$_SERVER['REQUEST_METHOD']` - содержит метод запроса (GET или POST). 

```php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // обрабатываем запрос методом POST
} else {
    // обрабатываем запрос методом GET
}

```

`$_SERVER['REQUEST_URI']` - содержит URL-адрес текущего запроса.
```php
$url = $_SERVER['REQUEST_URI'];
echo "URL: " . $url;

```
`$_SERVER['HTTP_USER_AGENT']` - содержит информацию о браузере, отправившем запрос. Например:
```php
$agent = $_SERVER['HTTP_USER_AGENT'];
echo "Ваш браузер: " . $agent;
```
`$_SERVER['REMOTE_ADDR']` - содержит IP-адрес клиента, отправившего запрос. Например:

```php
$ip = $_SERVER['REMOTE_ADDR'];
echo "Ваш IP-адрес: " . $ip;

```

`$_SERVER['HTTP_REFERER']` - содержит URL-адрес страницы, с которой был выполнен переход на текущую страницу (если таковой имеется). Например:

```php
$referer = $_SERVER['HTTP_REFERER'];
if ($referer) {
    echo "Вы перешли на эту страницу с адреса: " . $referer;
} else {
    echo "Вы перешли на эту страницу напрямую";
}

```


___________________
____________________
____________________

# Метод GET
## передача одного параметра

```html
<!DOCTYPE html>
<html>
<head>
	<title>Пример передачи параметра методом GET</title>
</head>
<body>
	<a href="page.php?name=Ivan">Перейти на страницу</a>
</body>
</html>

```

 Мы передаем параметр name со значением Ivan через URL-адрес.\
 Когда пользователь нажимает на ссылку, он переходит на страницу page.php, и значение параметра name становится доступным на этой странице.

Чтобы получить значение параметра name на странице page.php, мы можем:

```php
$name = $_GET['name'];
echo "Привет, " . $name . "!";

```

Мы получаем значение параметра name из URL-адреса и выводит его на странице вместе с приветствием.


```php
<!DOCTYPE html>
<html>
<head>
	<title>Пример передачи параметра методом GET</title>
</head>
<body>
	<a href="page.php?name=Ivan">Перейти на страницу</a>
	<?php
		if(isset($_GET['name'])) {
			$name = $_GET['name'];
			echo "<p>Привет, " . $name . "!</p>";
		}
	?>
</body>
</html>
```


## Передача нескольких параметров

У нас есть форма, в которой пользователь может ввести свое имя и адрес электронной почты. \
Когда пользователь отправляет форму, мы передаем значения параметров name и email методом GET в URL-адресе.


```html
<!DOCTYPE html>
<html>
<head>
	<title>Пример передачи нескольких параметров методом GET</title>
</head>
<body>
	<form action="page.php" method="get">
		<label for="name">Введите ваше имя:</label>
		<input type="text" name="name" id="name" required><br><br>
		<label for="email">Введите ваш email:</label>
		<input type="email" name="email" id="email" required><br><br>
		<input type="submit" value="Отправить">
	</form>
</body>
</html>
```


Мы используем форму HTML, чтобы пользователь мог ввести свое имя и адрес электронной почты.\
Когда пользователь отправляет форму, мы передаем значения параметров name и email методом GET в URL-адресе.

Чтобы получить значения параметров name и email на странице page.php мы можем:

```php
$name = $_GET['name'];
$email = $_GET['email'];
echo "Ваше имя: " . $name . "<br>";
echo "Ваш email: " . $email;
```


```php
<!DOCTYPE html>
<html>
<head>
	<title>Пример передачи нескольких параметров методом GET</title>
</head>
<body>
	<form action="page.php" method="get">
		<label for="name">Введите ваше имя:</label>
		<input type="text" name="name" id="name" required><br><br>
		<label for="email">Введите ваш email:</label>
		<input type="email" name="email" id="email" required><br><br>
		<input type="submit" value="Отправить">
	</form>
	<?php
		if(isset($_GET['name']) && isset($_GET['email'])) {
			$name = $_GET['name'];
			$email = $_GET['email'];
			echo "<p>Ваше имя: " . $name . "</p>";
			echo "<p>Ваш email: " . $email . "</p>";
		}
	?>
</body>
</html>
```
## передача массива параметров.

Передадим массив с данными о пользователе, такими как имя, возраст и адрес электронной почты. \
Мы можем сделать это, преобразовав массив в строку и добавив ее в URL-адрес в виде параметра.

```php
$user_data = [
    'name' => 'Ivan',
    'age' => 30,
    'email' => 'ivan@example.com'
];

```

Чтобы передать этот массив данных методом GET, мы можем использовать функцию `http_build_query()` для преобразования массива в строку параметров:

```php
$query_string = http_build_query($user_data);
```

Эта функция преобразует массив в строку параметров в формате `name1=value1&name2=value2&...` и возвращает эту строку.

Затем мы можем добавить эту строку в URL-адрес с помощью символа вопроса и передать ее методом GET:

```php
<a href="page.php?<?php echo $query_string; ?>">Перейти на страницу</a>

```

На странице page.php мы можем получить значения параметров из URL-адреса и преобразовать их обратно в массив с помощью функции parse_str():

```php
$user_data = [];
parse_str($_SERVER['QUERY_STRING'], $user_data);

```

Эта функция преобразует строку параметров в массив и сохраняет его в переменной $user_data. \
Теперь мы можем получить значения параметров массива:

```php
$name = $user_data['name'];
$age = $user_data['age'];
$email = $user_data['email'];
```


```php
<!DOCTYPE html>
<html>
<head>
	<title>Пример передачи массива данных методом GET</title>
</head>
<body>
	<?php
		$user_data = [
			'name' => 'Ivan',
			'age' => 30,
			'email' => 'ivan@example.com'
		];

		$query_string = http_build_query($user_data);
	?>
	<a href="test.php?<?php echo $query_string; ?>">Перейти на страницу</a>
</body>
</html>
```
_____________________________________
```php
<!DOCTYPE html>
<html>
<head>
	<title>Пример передачи нескольких параметров методом GET</title>
</head>
<body>
	<form action="page.php" method="get">
		<label for="name">Введите ваше имя:</label>
		<input type="text" name="name" id="name" required><br><br>
		<label for="email">Введите ваш email:</label>
		<input type="email" name="email" id="email" required><br><br>
		<input type="submit" value="Отправить">
	</form>
	<?php
		if(isset($_GET['name']) && isset($_GET['email'])) {
			$name = $_GET['name'];
			$email = $_GET['email'];
			echo "<p>Ваше имя: " . $name . "</p>";
			echo "<p>Ваш email: " . $email . "</p>";
		}
	?>
</body>
</html>
```



# Метод POST

Метод POST - это  метод передачи данных через HTTP-запросы. \
При использовании метода POST данные передаются в теле запроса, а не в URL-адресе. \
Метод POST более безопасен, поскольку данные не передаются в открытом виде.

## передача одного параметра

```html
<!DOCTYPE html>
<html>
<head>
	<title>Пример передачи параметра методом POST</title>
</head>
<body>
	<form action="page.php" method="post">
		<label for="name">Введите ваше имя:</label>
		<input type="text" name="name" id="name" required><br><br>
		<input type="submit" value="Отправить">
	</form>
</body>
</html>

```

Мы используем форму HTML, чтобы пользователь мог ввести свое имя. \
Когда пользователь отправляет форму, мы передаем значение параметра name методом POST.

Чтобы получить значение параметра name на странице page.php, мы можем:

```php
$name = $_POST['name'];
echo "Привет, " . $name . "!";

```

Получаем значение параметра name из тела запроса, отправленного методом POST, и выводим его на странице вместе с приветствием.

```php
<!DOCTYPE html>
<html>
<head>
	<title>Пример передачи параметра методом POST</title>
</head>
<body>
	<form action="page.php" method="post">
		<label for="name">Введите ваше имя:</label>
		<input type="text" name="name" id="name" required><br><br>
		<input type="submit" value="Отправить">
	</form>
	<?php
		if(isset($_POST['name'])) {
			$name = $_POST['name'];
			echo "<p>Привет, " . $name . "!</p>";
		}
	?>
</body>
</html>

```

## Передача нескольких параметров

```php
<!DOCTYPE html>
<html>
<head>
	<title>Пример передачи нескольких параметров методом POST</title>
</head>
<body>
	<form action="page.php" method="post">
		<label for="name">Введите ваше имя:</label>
		<input type="text" name="name" id="name" required><br><br>
		<label for="email">Введите ваш email:</label>
		<input type="email" name="email" id="email" required><br><br>
		<input type="submit" value="Отправить">
	</form>
</body>
</html>

```

Мы используем форму HTML, чтобы пользователь мог ввести свое имя и адрес электронной почты. \
Когда пользователь отправляет форму, мы передаем значения параметров name и email методом POST.

Чтобы получить значения параметров name и email на странице page.php, мы можем:

```php
$name = $_POST['name'];
$email = $_POST['email'];
echo "Ваше имя: " . $name . "<br>";
echo "Ваш email: " . $email;

```


```php
<!DOCTYPE html>
<html>
<head>
	<title>Пример передачи нескольких параметров методом POST</title>
</head>
<body>
	<form action="page.php" method="post">
		<label for="name">Введите ваше имя:</label>
		<input type="text" name="name" id="name" required><br><br>
		<label for="email">Введите ваш email:</label>
		<input type="email" name="email" id="email" required><br><br>
		<input type="submit" value="Отправить">
	</form>
	<?php
		if(isset($_POST['name']) && isset($_POST['email'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			echo "<p>Ваше имя: " . $name . "</p>";
			echo "<p>Ваш email: " . $email . "</p>";
		}
	?>
</body>
</html>

```

Проверяем, переданы ли параметры name и email в запросе методом POST. \
Если да, то он получает их значения и выводит на странице вместе с подходящим текстом. \
Если параметры не были переданы, то на странице ничего не отображается.

## Пример 2

```php
<!DOCTYPE html>
<html>
<head>
    <title>передача данных методом POST</title>
</head>
<body>
    <form action="part5.php" method="post">
        <label for="name">Введите ваше имя:</label><br><br>
        <input type="text" name="name" id="name" required><br><br>
        <label for="age">Введите Ваш возраст:</label><br><br>
        <input type="number" name="age" id="age" required><br><br>
        <label for="email">Введите Ваш email</label><br><br>
        <input type="email" name="email" id="email" required><br><br>
        <input type="submit" value="Отправить">
    </form>
    <?php
        if (isset($_POST['name']) &&
            isset($_POST['age']) &&
            isset($_POST['email'])) {
            echo "<p>Ваше имя: {$_POST['name']}</p>";
            echo "<p>Ваш возраст: {$_POST['age']}</p>";
            echo "<p>Ваш email: {$_POST['email']}</p>";
        }
    ?>
</body>
</html>
```



_______________________


