<?php
include_once(dirname(__FILE__)."/../../database/user.php");

verifyCSRF();
validateAndFilter($_POST, 'username');

$res = getUserID($_POST['username']);

$result = ($res > 0);

echo json_encode($result);
