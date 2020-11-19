<?php
session_start();

include_once("../includes/init.php");
include_once("../database/user.php");

$_SESSION['logged_in'] = false;
$username = $_POST["username"];
$password = $_POST['password'];
$error = "username/password incorrect";


$loginCorrect = verifyUserLogin($username, $password);

if ($loginCorrect != -1) {
    $_SESSION["username"] = $username;
    $_SESSION['logged_in'] = true;
    header("location: /index.php");
} else {
    $_SESSION['logged_in'] = false;
    echo('<script>alert("Wrong user or password")</script>
        <script>window.location.replace("../index.php")</script>');
}
