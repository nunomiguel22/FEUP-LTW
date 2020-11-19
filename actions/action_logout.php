<?php
session_start();

include_once("../includes/init.php");

session_destroy();
session_start();

$_SESSION['logged_in'] = false;

header("location: /index.php");
