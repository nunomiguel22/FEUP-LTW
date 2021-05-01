<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

include_once('csrf.php');


session_start();


if (!isset($_SESSION['csrf'])) {
    $_SESSION['csrf'] = generate_random_token();
}

function setSessionCurrentUser($userID, $username)
{
    $_SESSION['username'] = $username;
    $_SESSION['userID'] = $userID;
    $_SESSION['logged_in'] = true;
}

function getSessionUserID()
{
    if (isset($_SESSION['userID'])) {
        return $_SESSION['userID'];
    } else {
        return null;
    }
}

function getSessionUsername()
{
    if (isset($_SESSION['username'])) {
        return $_SESSION['username'];
    } else {
        return null;
    }
}

function isLoggedIn()
{
    if (isset($_SESSION['logged_in'])) {
        return $_SESSION['logged_in'];
    } else {
        return false;
    }
}

function sessionLogout()
{
    session_destroy();
    session_start();
    
    $_SESSION['logged_in'] = false;
}
