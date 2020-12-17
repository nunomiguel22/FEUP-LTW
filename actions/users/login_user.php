<?php
include_once(dirname(__FILE__)."/../../includes/init.php");
include_once(dirname(__FILE__)."/../../database/user.php");

$_SESSION['logged_in'] = false;
$username = $_POST["username"];
$password = $_POST['password'];


$loginCorrect = verifyUserLogin($username, $password);

if ($loginCorrect != -1) {
    $id = getUserID($username);
    setSessionCurrentUser($id, $username);
    header("location: /index.php");
} else {
    $_SESSION['logged_in'] = false;
    echo('<script>alert("Wrong user or password")</script>
        <script>window.location.replace("/index.php")</script>');
}
