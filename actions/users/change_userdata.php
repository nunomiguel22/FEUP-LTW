<?php
include_once("../includes/init.php");

include_once("../database/user.php");
global $dbh;


$curruser= $_SESSION['username'];

$stmt = $dbh->prepare('SELECT pwhash, name FROM User WHERE username= ?');
$stmt->execute(array($curruser));
$userdata = $stmt->fetch();




if (empty(($_POST["username"]))) {
    $username = $_SESSION['username'];
} else {
    $username = $_POST["username"];
}

if (empty(($_POST['password']))) {
    $hashed= $userdata["pwhash"];
} else {
    $password = $_POST['password'];
    $options = [ 'cost' => 11,
    ];
    $hashed = password_hash($password, PASSWORD_DEFAULT, $options);
}

if (empty(($_POST['name']))) {
    $name=$userdata["name"];
} else {
    $name = $_POST['name'];
}

try {
    $stmt = $dbh->prepare(' UPDATE User SET username= :username, pwhash=:pwhash, name= :name WHERE username= :curruser');
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':pwhash', $hashed);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':curruser', $curruser);

    if ($stmt->execute()) {
        return 0;
    } else {
        return -1;
    }
} catch (PDOException $e) {
    echo $e;
    return -1;
}

header("location: .../actions/action_logout.php");

//echo '<a href="/actions/action_logout.php"></a>';
