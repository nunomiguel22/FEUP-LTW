<?php
include_once(dirname(__FILE__)."/../../includes/init.php");
include_once(dirname(__FILE__)."/../../database/user.php");

verifyCSRF();
validateAndFilter($_POST, 'username', 'password');

$_SESSION['logged_in'] = false;
$username = $_POST["username"];
$password = $_POST['password'];


$loginCorrect = verifyUserLogin($username, $password);
$result = false;
if ($loginCorrect != -1) {
    $result = true;
}

echo json_encode($result);
