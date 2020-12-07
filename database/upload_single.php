<?php
include_once('../includes/init.php');


function upload_single_photo($photo)
{
    global $dbh;
    $stmt = $dbh->prepare('SELECT COUNT(id) as count FROM Photo');
    $stmt->execute();
    $count = $stmt->fetch()["count"] + 1;
    
    $dir = realpath(dirname(__FILE__))."/../images";
    $target = $dir."/Pet".$count.'.'.strtolower(pathinfo($photo["name"], PATHINFO_EXTENSION));

    move_uploaded_file($photo["tmp_name"], $target);

    $stmt = $dbh->prepare('INSERT INTO Photo(path) VALUES (:path)');
    $stmt->bindParam(':path', $target);
    $stmt->execute();

    return $count;
};
