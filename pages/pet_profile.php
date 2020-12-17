<?php
include_once(dirname(__FILE__).'/../database/pets.php');
include_once(dirname(__FILE__)."/../templates/pets/pet_gallery.php");
include_once(dirname(__FILE__)."/../templates/pets/pet_comments.php");

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
include_once(dirname(__FILE__)."/../templates/pets/pet_user_options.php");
echo '<br>';
echo '<span class="Title1"> Galeria de fotos</span>';
display_pet_gallery($pet_id);
echo '</div>';

print_comment_section($pet_id);
echo '<script type="text/javascript" src="/js/pet_page.js"></script>';

include_once(dirname(__FILE__)."/../templates/common/footer.php");
