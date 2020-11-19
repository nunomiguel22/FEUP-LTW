<?php

function verifyUserLogin($username, $password) {
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM User WHERE username = ?');
    $stmt->execute(array($username));
    $user = $stmt->fetch();

    if ($user == false)
        return -1;

    return 0;
  }
?>
