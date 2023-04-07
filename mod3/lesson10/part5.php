<!DOCTYPE html>
<html>
<head>
    <title>GET</title>
</head>
<body>
    <form action="part5.php" method="get">
        <label for="name">Input your name</label> <br>
        <input type="text" name="name" id="name" required> <br><br>
        <label for="email">Input your email</label> <br>
        <input type="email" name="email" id="email" required> <br><br>
        <input type="submit" value="Submit">
        <?php
            if (isset($_GET['name']) && isset($_GET['email'])) {
                echo "<p>Your name is {$_GET['name']}</p>";
                echo "<p>Your email is {$_GET['email']}</p>";
            }
        ?>
    </form>
</body>
</html>