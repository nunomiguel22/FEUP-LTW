<?php
include_once(dirname(__FILE__).'/../../database/pets.php');

function display_pet_gallery($pet_id)
{
    echo '<section class="PetGallery-container">';
    $photos = getPhotosbyPetId($pet_id);
    foreach ($photos as $photo) {
        echo '<img class="PetGallery-slide" src="'.$photo.'">';
    }

    echo '<button class="PetGallery-button-left" onclick="plusDivs(-1)">&#10094;</button>';
    echo '<button class="PetGallery-button-right" onclick="plusDivs(+1)">&#10095;</button>';
    echo '</div>';
}
