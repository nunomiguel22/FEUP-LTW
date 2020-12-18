<?php
include_once(dirname(__FILE__)."/../../includes/init.php");


global $dbh;

$curruser= $_SESSION['username'];
try {
    $stmt = $dbh->prepare('DELETE FROM User WHERE username= ?');
    if ($stmt->execute(array($curruser))) {
        header("location: /actions/users/logout_user.php");
        return 0;
    } else {
        return -1;
    }
} catch (PDOException $e) {
    echo $e;
    return -1;
}
