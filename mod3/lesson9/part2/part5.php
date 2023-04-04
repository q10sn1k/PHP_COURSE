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