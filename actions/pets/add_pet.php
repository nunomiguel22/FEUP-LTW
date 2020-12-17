<?php
include_once(dirname(__FILE__)."/../../includes/init.php");
verifyCSRF();

include_once(dirname(__FILE__)."/../../database/pets.php");
include_once(dirname(__FILE__)."/../../database/user.php");

include_once(dirname(__FILE__)."/../../includes/login_only.php");

$coverPhoto = $_FILES["coverPhotoInput"];
$idowner = getSessionUserID();
$name = $_POST["name"];
$location = $_POST['location'];
$age = $_POST["age"];
$species = $_POST['species'];
$size = $_POST["size"];

if (isset($_POST['status'])) {
    $status = 1;
} else {
    $status = 0;
}

if (addPet($coverPhoto, $idowner, $name, $location, $age, $species, $size, $status) == -1) {
    echo('<script>alert("Failed to add pet")</script>
            <script>window.location.replace("/index.php")</script>');
}

header("location: /index.php");
