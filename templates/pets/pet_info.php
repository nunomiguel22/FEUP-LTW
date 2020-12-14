<?php
include_once(dirname(__FILE__).'/../../database/photos.php');



echo '<section class="PetInfo-container">';

$photoloc = get_photo_by_id($pet["idphoto"]);
echo ' <img src="'.$photoloc.'" alt="Adoption GO" class="PetInfo-image">';




echo '<div class="PetInfo-text">';
echo '<span class="PetInfo-Name">'.$pet["name"].'</span>';
echo '<br><br>';
echo '<span style="font-style: italic;">Idade    </span>';
echo '<span style="float:right;">'.$pet["age"].'</span>';
echo '<br>';
echo '<span style="font-style: italic;">Local    </span>';
echo '<span style="float:right;">'.$pet["location"].'</span>';
echo '<br>';
echo '<span style="font-style: italic;">Espécie    </span>';
echo '<span style="float:right;">'.$pet["species"].'</span>';
echo '<br>';
echo '<span style="font-style: italic;">Tamanho    </span>';
echo '<span style="float:right;">'.$pet["size"].'</span>';
echo '</div>';
echo '</section>';
