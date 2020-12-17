<?php
include_once(dirname(__FILE__)."/../../includes/init.php");
verifyCSRF();


include_once(dirname(__FILE__)."/../../includes/session.php");
include_once(dirname(__FILE__)."/../../database/pets.php");

include_once(dirname(__FILE__)."/../../includes/login_only.php");

$id_owner = getSessionUserID();
$id_pet = $_POST["id_pet"];
$id_parent = $_POST['id_parent'];
$message = $_POST["message"];


if (addComment($id_pet, $id_owner, $id_parent, $message) == -1) {
    echo('<script>alert("Failed to comment")</script>
    <script>window.location.replace("/index.php")</script>');
}

header('location: /pages/pet_profile.php?petid='.$id_pet);
