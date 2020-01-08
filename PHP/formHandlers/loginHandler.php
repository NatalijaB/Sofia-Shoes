<?php

require 'php/data/users.php';
$error = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "SELECT * FROM users WHERE Username = '$username' and Password = '$password'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['Username'] = $username;
        $_SESSION['UsersId'] = $userid;

        header("location: admin.php");
    } else {
        $error = "Your Username or Password is invalid.";
    }
}
