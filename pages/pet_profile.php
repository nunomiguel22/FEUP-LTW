<?php
include_once(dirname(__FILE__).'/../database/pets.php');

if (isset($_GET["petid"])) {
    $pet = getPetbyId($_GET["petid"]);
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
echo '</div>';


include_once(dirname(__FILE__)."/../templates/common/footer.php");
