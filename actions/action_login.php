<?php
include_once("../includes/init.php");
include_once("../database/user.php");


$loginCorrect = verifyUserLogin($_POST['username'], $_POST['password']);

if($loginCorrect != -1){
    echo "Login was correct";

} else {
    echo "Login was incorrect";
}

?>
