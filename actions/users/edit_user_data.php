<?php
include_once(dirname(__FILE__)."/../../includes/init.php");
include_once(dirname(__FILE__)."/../../database/user.php");

verifyCSRF();
include_once(dirname(__FILE__)."/../../includes/login_only.php");
filterOnly($_POST, 'submit', 'username', 'name', 'password');

$user_id = getSessionUserID();

if ($_POST["submit"] == "edit") {
    $username = $_POST["username"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (isset($username) && !empty($username)) {
        updateUsername($user_id, $username);
    }

    if (isset($name) && !empty($name)) {
        updateName($user_id, $name);
    }

    if (isset($email) && !empty($email)) {
        updateEmail($user_id, $email);
    }

    if (isset($password) && !empty($password)) {
        updatePassword($user_id, $password);
    }
} elseif ($_POST["submit"] == "delete") {
    deleteUser($user_id);
}

header("location: /actions/users/logout_user.php");
