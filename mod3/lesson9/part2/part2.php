<!DOCTYPE html>
<html>
<head>
    <title>Передача нескольких параметров методом GET</title>
</head>
<body>
    <form action="part2.php" method="get">
        <label for="name">Введите ваше имя:</label>
        <input type="text" name="name" id="name" required><br><br>
        <label for="email">Введите ваш email:</label>
        <input type="email" name="email" id="email" required><br><br>
        <input type="submit" value="Отправить">
    </form>
    <?php
        if (isset($_GET['name']) && isset($_GET['email'])) {
//            $name = $_GET['name'];
//            $email = $_GET['email'];
//            echo "<p>Ваше имя: $name </p>";
//            echo "<p>Ваш email: $email </p>";
            echo "<p>Ваше имя: {$_GET['name']} </p>";
            echo "<p>Ваш email: {$_GET['email']} </p>";
        }
    ?>

</body>
</html>