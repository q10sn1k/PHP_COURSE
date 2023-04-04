<?php


// $_GET
if (isset($_GET['name'])) {
    $name = $_GET['name'];

    echo "Привет, " . $name . ' !';
}

// $_POST

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    echo "Привет, " . $name . '!';
}