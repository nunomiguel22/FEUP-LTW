<?php
include_once("../includes/init.php");
include_once("../database/user.php");
global $dbh;

//$username = $_POST["username"];
//$password = $_POST['password'];
//$name = $_POST['name'];
$curruser= $_SESSION['username'];

$stmt = $dbh->prepare('SELECT pwhash, name FROM User WHERE username= ?');
$stmt->execute(array($curruser));
$userdata = $stmt->fetch();



//print_r($userdata);



if(empty( ($_POST["username"]))){
$username = $_SESSION['username'];  
//echo 'no username filled!!!!!!!'; 
}
else {
    $username = $_POST["username"];
    //echo 'bugggggg';
}

if(empty( ($_POST['password']))){
    $hashed= $userdata["pwhash"];
}
else{
    $password = $_POST['password'];
    $options = [ 'cost' => 11,
    ];
    $hashed = password_hash($password, PASSWORD_DEFAULT, $options);
}

if(empty(($_POST['name']))){
    $name=$userdata["name"];
}
else {
    $name = $_POST['name'];
}

/*echo 'username';
print_r($username);
echo 'pwwww    ';
print_r($hashed); 
echo '   name ';
print_r($name); */

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