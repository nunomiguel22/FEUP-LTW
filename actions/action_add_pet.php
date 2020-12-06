<?php
include_once("../includes/init.php");
include_once("../database/pets.php");
include_once("../database/user.php");

if (isLoggedIn()) {
    $idowner = getSessionUserID();
    $name = $_POST["name"];
    $location = $_POST['location'];
    $age = $_POST["age"];
    $species = $_POST['species'];
    $size = $_POST["size"];

    if (addPet($idowner, $name, $location, $age, $species, $size) == -1) {
        echo("<br><br><br>Statement failed: ". $stmt_test->error . "<br>");
        echo('<script>alert("Failed to add pet")</script>
                <script>window.location.replace("../index.php")</script>');
    }
}
header("location: /index.php");
