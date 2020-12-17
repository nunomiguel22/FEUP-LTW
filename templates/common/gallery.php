<?php
include_once(dirname(__FILE__)."/../../database/photos.php");
function display_preview_gallery()
{
    $photos = getPreviewPhotos(6);
    display_pet_gallery($photos, true);
}


function display_pet_gallery($photos, $link_to_pet)
{
    foreach ($photos as $photo) {
        if ($link_to_pet) {
            $petid = getPetIDfromPhotoID($photo["idphoto"]);
        }

        $photoloc = getPhotoPathByID($photo["idphoto"]);
        echo '<li>';
        echo '<div style="display: inline">';

        if ($link_to_pet) {
            echo '<a href="/pages/pet_profile.php?petid='.$petid.'">';
        }
        echo ' <img src="'.$photoloc.'" alt="" class="previewGallery-image">';

        if ($link_to_pet) {
            echo '</a>';
        }

        echo '</div>';
        echo '</li>';
    }
}
