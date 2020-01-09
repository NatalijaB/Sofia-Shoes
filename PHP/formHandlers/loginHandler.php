<?php

require 'php/data/users.php';
$error = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "SELECT UsersId FROM users WHERE Username = '$username' and Password = '$password'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $row['UsersId'];

        header("location: admin.php");
    } else {
        $error = "Your Username or Password is invalid.";
    }
}
