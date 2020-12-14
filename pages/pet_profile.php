<?php
include_once(dirname(__FILE__).'/../database/pets.php');
include_once(dirname(__FILE__)."/../templates/pets/pet_gallery.php");

echo '<br>';

if (isset($_GET["petid"])) {
    $pet_id = $_GET["petid"];
    $pet = getPetbyId($pet_id);
} else {
    $pet = -1;
}

if ($pet == -1) {
    http_response_code(404);
    die();
}

include_once(dirname(__FILE__)."/../includes/navbar.php");

echo '<div class="widthControl">';
include_once(dirname(__FILE__)."/../templates/pets/pet_info.php");
echo '<br>';
echo '<span class="Title1"> Galeria de fotos</span>';
display_pet_gallery($pet_id);
echo '</div>';


include_once(dirname(__FILE__)."/../templates/common/footer.php");
