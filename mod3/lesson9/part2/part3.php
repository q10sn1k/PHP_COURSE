<!DOCTYPE html>
<html>
<head>
    <title>Передача массива данных методом GET</title>
</head>
<body>
    <?php
        $user_data = [
            'name' => 'Ivan',
            'email' => 'ivan@example.com'
        ];

        $query_string = http_build_query($user_data);
    ?>

    <a href="part2.php?<?php echo $query_string;?>">Переход на страницу</a>
</body>
</html>