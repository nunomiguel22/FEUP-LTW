<?php
include_once(dirname(__FILE__)."/../../includes/init.php");
include_once(dirname(__FILE__)."/../../database/pets.php");

include_once(dirname(__FILE__)."/../../includes/login_only.php");


validateAndFilter($_POST, "id_pet");

$id_user = getSessionUserID();
$id_pet = $_POST["id_pet"];

$result = setPetFavorite($id_user, $id_pet);
echo json_encode($result);
