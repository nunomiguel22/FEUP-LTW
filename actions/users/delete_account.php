<?php
include_once("../includes/init.php");

global $dbh;

$curruser= $_SESSION['username'];
try{
$stmt = $dbh->prepare('DELETE FROM User WHERE username= ?');
if ($stmt->execute(array($curruser))) {
    return 0;
} else {
    return -1;
}
} catch (PDOException $e) {
echo $e;
return -1;
}

