<?php
ini_set('display_errors', 1);
session_start();
include_once(dirname(__FILE__).'/../includes/init.php');
include_once(dirname(__FILE__).'/../database/user.php');


createUser('utilizador', 'asdasd2', 'name', 'email@email.com');
createUser('myuser', 'pw', 'myname', 'myemail@email');
