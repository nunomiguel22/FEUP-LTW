<?php
session_start();
include_once("../includes/init.php");
include_once("../database/user.php");

$username = $_POST["username"];
$password = $_POST['password'];
$name = $_POST['name'];
$email = $_POST['email'];

$res = createUser($username, $password, $name, $email);
header("location: /index.php");
