<?php
session_start();
include_once("../includes/init.php");
include_once("../database/user.php");

$username = $_POST["username"];
$password = $_POST['password'];
$name = $_POST['name'];
$email = $_POST['email'];

if (getUserID($username) != -1){
    echo('<script>alert("Username already in use")</script>
    <script>window.location.replace("../index.php")</script>');
    exit();
}

if (getUserIDbyEmail($email) != -1){
    echo('<script>alert("Email has already been registered")</script>
    <script>window.location.replace("../index.php")</script>');
    exit();
}

if (strlen($password) < 5){
    echo('<script>alert("Password is too short")</script>
    <script>window.location.replace("../index.php")</script>');  
    exit();
}

createUser($username, $password, $name, $email);
header("location: /index.php");

