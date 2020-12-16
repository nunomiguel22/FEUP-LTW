<?php
include_once("../includes/init.php");
include_once("../includes/session.php");
include_once("../database/pets.php");
include_once("../database/user.php");


if (isLoggedIn()) {
    $id_owner = getSessionUserID();
    $id_pet = $_POST["id_pet"];
    $id_parent = $_POST['id_parent'];
    $message = $_POST["message"];

    if (addComment($id_pet, $id_owner, $id_parent, $message) == -1) {
        echo('<script>alert("Failed to comment")</script>
                <script>window.location.replace("../index.php")</script>');
    }

    header('location: /pages/pet_profile.php?petid='.$id_pet);
}
