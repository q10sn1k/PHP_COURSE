<!DOCTYPE html>
<html>
<head>
    <title>Форма ввода данных для пользователя</title>
</head>
<body>
    <form method="post">
        <label for="name">Введите ваше имя</label>
        <input type="text" name="name" id="name" required><br><br>
        <label for="age">Введите ваш возраст:</label>
        <input type="number" name="age" id="age" required><br><br>
        <input type="submit" value="Отправить">
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name']);
            $age = (int)$_POST['age'];

            echo "<p>Ваше имя $name</p>";
            echo "<p>Ваш возраст: $age</p>";
        }
        header("Refresh: 7; url=http://localhost/3_mod/lesson8/part1/part2.php");
    ?>



</body>
</html>