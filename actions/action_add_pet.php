<?php
include_once("../includes/init.php");
include_once("../database/pets.php");
include_once("../database/user.php");

if (isLoggedIn()) {
    $coverPhoto = $_FILES["coverPhotoInput"];
    $idowner = getSessionUserID();
    $name = $_POST["name"];
    $location = $_POST['location'];
    $age = $_POST["age"];
    $species = $_POST['species'];
    $size = $_POST["size"];

    if (addPet($coverPhoto, $idowner, $name, $location, $age, $species, $size) == -1) {
        echo('<script>alert("Failed to add pet")</script>
                <script>window.location.replace("../index.php")</script>');
    }
}
header("location: /index.php");
