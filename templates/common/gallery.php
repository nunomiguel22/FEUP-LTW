<?php
include_once(dirname(__FILE__)."/../../database/photos.php");
function display_preview_gallery()
{
    $photos = get_preview_gallery_photos(6);
    display_gallery_no_info($photos);
}


function display_gallery_no_info($photos)
{
    foreach ($photos as $photo) {
        $photoloc = get_photo_by_id($photo["idphoto"]);
        echo '<li>';
        echo '<div style="display: inline">';

        echo ' <img src="'.$photoloc.'" alt="Adoption GO" class="previewGallery-image-noinfo">';

        echo '</div>';
        echo '</li>';
    }
}
