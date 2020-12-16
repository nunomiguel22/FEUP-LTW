<?php
include_once("../includes/init.php");
include_once("../database/pets.php");


if (isLoggedIn()) {
    $id_user = getSessionUserID();
    $id_pet = $_POST["id_pet"];

    if (remove_pet_favorite($id_user, $id_pet) == -1) {
        echo('<script>alert("Failed to add pet")</script>
                <script>window.location.replace("../index.php")</script>');
    }
}
