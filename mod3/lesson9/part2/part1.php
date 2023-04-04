<!DOCTYPE html>
<html>
<head>
    <title>Передача параметра методом GET</title>
</head>
<body>
    <a href="part1.php?name=Ivan">Пререйти на страницу</a>
    <?php
        if (isset($_GET['name'])) {
            $name = $_GET['name'];
            echo "<p>Привет, " . $name . "!</p>";
        }
    ?>
</body>
</html>