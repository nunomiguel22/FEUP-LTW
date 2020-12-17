<?php
include_once(dirname(__FILE__)."/../../database/user.php");

$res = getUserID($_POST['username']);

$result = ($res > 0);

echo json_encode($result);
