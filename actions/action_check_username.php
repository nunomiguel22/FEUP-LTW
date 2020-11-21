<?php
include_once('../database/user.php');

$res = getUserID($_POST['username']);
if ($res > 0)
    echo "true";
else echo "false";
die;

