<?php
include_once(dirname(__FILE__).'/../includes/init.php');


function verifyUserLogin($username, $password)
{
    global $dbh;
    $stmt = $dbh->prepare('SELECT username, pwhash FROM User WHERE username = ?');
    $stmt->execute(array($username));
    $userdata = $stmt->fetch();
   
    if (!$userdata) {
        return -1;
    }
    $pwhash = array_values($userdata)[1];
    if (!password_verify($password, $pwhash)) {
        return -1;
    }
    return 0;
}

function createUser($username, $password, $name, $email)
{
    $options = [
    'cost' => 11,
    ];
    $hashed = password_hash($password, PASSWORD_DEFAULT, $options);
    global $dbh;
    
    try {
        $stmt = $dbh->prepare('INSERT INTO User(username, pwhash, name, email) VALUES (:username,:pwhash,:name,:email)');
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':pwhash', $hashed);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        
        if ($stmt->execute()) {
            return getUserID($username);
        } else {
            return -1;
        }
    } catch (PDOException $e) {
        echo $e;
        return -1;
    }
}

function getUserID($username)
{
    global $dbh;
    try {
        $stmt = $dbh->prepare('SELECT id FROM User WHERE username=?');
        $stmt->execute(array($username));
        if ($row = $stmt->fetch()) {
            return $row['id'];
        } else {
            return -1;
        }
    } catch (PDOException $e) {
        return -1;
    }
}

function getUserIDbyEmail($email)
{
    global $dbh;
    try {
        $stmt = $dbh->prepare('SELECT id FROM User WHERE email=?');
        $stmt->execute(array($email));
        
        if ($row = $stmt->fetch()) {
            return $row['id'];
        }
        return -1;
    } catch (PDOException $e) {
        return -1;
    }
}

function getUserbyID($user_id)
{
    global $dbh;
    try {
        $stmt = $dbh->prepare('SELECT username FROM User WHERE id = ?');
        $stmt->execute(array($user_id));
        if ($row = $stmt->fetch()) {
            return $row['username'];
        } else {
            return -1;
        }
    } catch (PDOException $e) {
        return -1;
    }
}
