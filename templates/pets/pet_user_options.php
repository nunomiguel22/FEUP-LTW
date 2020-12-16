<?php
include_once(dirname(__FILE__).'/../../database/pets.php');
include_once(dirname(__FILE__).'/../../includes/session.php');


$user_id = getSessionUserID();
$pet_id = $pet["id"];
$pet_fav = is_pet_favorite($user_id, $pet_id);

echo '<div class="PetOptions">';

if ($pet["status"] == 0) {
    echo '<button type="button" class="PetOptions-button-disabled" disabled> Propor adopção </button>';
} else {
    echo '<button type="button" class="PetOptions-button"> Propor adopção </button>';
}

if ($pet_fav) {
    echo '<button type="button" class="PetOptions-button" id="pet-fav-button"> Favorito <span id_pet='.$pet_id.' is_fav=1 id="pet-fav-star" style="color:red;"> &#9733; </span> </button>';
} else {
    echo '<button type="button" class="PetOptions-button" id="pet-fav-button"> Favorito <span id_pet='.$pet_id.' is_fav=0 id="pet-fav-star" style=""> &#9734; </span> </button>';
}
echo '</div>';
