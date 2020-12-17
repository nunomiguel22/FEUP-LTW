<?php
include_once(dirname(__FILE__)."/../../includes/init.php");
verifyCSRF();

include_once(dirname(__FILE__)."/../../database/photos.php");

include_once(dirname(__FILE__)."/../../includes/login_only.php");



$coverPhoto = $_FILES["coverPhotoInput"];
$pet_id = $_POST["id_pet"];


if (uploadPetPhotos($coverPhoto, $pet_id) == -1) {
    echo('<script>alert("Failed to add pet")</script>
            <script>window.location.replace("/index.php")</script>');
}


header("location: /pages/pet_profile.php?petid=".$pet_id);
