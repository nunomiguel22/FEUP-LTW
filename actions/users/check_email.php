<?php
include_once(dirname(__FILE__)."/../../database/user.php");

verifyCSRF();

$res = getUserIDbyEmail($_POST['email']);
if ($res > 0) {
    echo "true";
} else {
    echo "false";
}
die;
