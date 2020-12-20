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
        $stmt = $dbh->prepare('INSERT INTO User(username, pwhash, name, email) 
            VALUES (:username,:pwhash,:name,:email)');
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

function updateUsername($user_id, $username)
{
    try {
        global $dbh;
        $stmt = $dbh->prepare('UPDATE User SET username=:username WHERE id=:user_id');
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':username', $username);
    
        return $stmt->execute();
    } catch (PDOException $e) {
        echo $e;
        return -1;
    }
}

function updateEmail($user_id, $email)
{
    try {
        global $dbh;
        $stmt = $dbh->prepare('UPDATE User SET email=:email WHERE id=:user_id');
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':email', $email);
    
        return $stmt->execute();
    } catch (PDOException $e) {
        echo $e;
        return -1;
    }
}
function updatePassword($user_id, $password)
{
    try {
        global $dbh;
        $options = [
            'cost' => 11,
            ];
        $hashed = password_hash($password, PASSWORD_DEFAULT, $options);
        
        $stmt = $dbh->prepare('UPDATE User SET pwhash=:password WHERE id=:user_id');
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':password', $hashed);
    
        return $stmt->execute();
    } catch (PDOException $e) {
        echo $e;
        return -1;
    }
}
function updateName($user_id, $name)
{
    try {
        global $dbh;
        $stmt = $dbh->prepare('UPDATE User SET name=:name WHERE id=:user_id');
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':name', $name);
    
        return $stmt->execute();
    } catch (PDOException $e) {
        echo $e;
        return -1;
    }
}

function deleteUser($user_id)
{
    try {
        global $dbh;
        $stmt = $dbh->prepare('DELETE FROM User WHERE id= ?');
        return $stmt->execute(array($user_id));
    } catch (PDOException $e) {
        echo $e;
        return -1;
    }
}
