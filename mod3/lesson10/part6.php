<!DOCTYPE html>
<html>
<head>
    <title>POST</title>
</head>
<body>
    <form action="part6.php" method="post">
        <h3>
            <label for="name">Input your name</label>
        </h3>
        <input type="text" name="name" id="name" required>
        <h3>
            <label for="age">Input your age</label>
        </h3>
        <input type="number" name="age" id="age" required>
        <h3>
            <label for="email">Input your email</label>
        </h3>
        <input type="email" name="email" id="email" required> <br><br>
        <input type="submit" value="Submit">
    </form>
    <?php
        if (isset($_POST['name']) && isset($_POST['age']) && isset($_POST['email'])) {
            echo "<p>Your name is {$_POST['name']}</p>";
            echo "<p>Your ahe is {$_POST['age']}</p>";
            echo "<p>Your email is {$_POST['email']}</p>";
        }
    ?>
</body>
</html>