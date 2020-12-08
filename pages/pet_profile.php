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

include_once(dirname(__FILE__).'/../database/photos.php');
include_once(dirname(__FILE__)."/../includes/navbar.php");
include_once(dirname(__FILE__)."/../templates/common/footer.php");


$photoloc = get_photo_by_id($pet["idphoto"]);
echo ' <img src="'.$photoloc.'" alt="Adoption GO" style="width:500px;" class="previewGallery-image-noinfo">';

echo '<br>';
echo '<span>'.$pet["name"].'</span>';
echo '<br>';
echo '<span>'.$pet["age"].'</span>';
echo '<br>';
echo '<span>'.$pet["location"].'</span>';
echo '<br>';
echo '<span>'.$pet["species"].'</span>';
echo '<br>';
echo '<span>'.$pet["size"].'</span>';
