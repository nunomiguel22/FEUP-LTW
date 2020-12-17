<?php
include_once(dirname(__FILE__).'/../../database/pets.php');
include_once(dirname(__FILE__).'/../../database/proposal.php');
include_once(dirname(__FILE__).'/../../includes/session.php');



$user_id = getSessionUserID();
$pet_id = $pet["id"];
$owner_id = $pet["idowner"];
$pet_fav = isPetFavorite($user_id, $pet_id);

echo '<div class="PetOptions">';

if ($pet["status"] == 0 || PetHasOfferByUserID($pet_id)) {
    echo '<button type="button" class="PetOptions-button-disabled" disabled> Propor adopção </button>';
} else {
    echo '<button type="button" id="proposal_button" class="PetOptions-button"> Propor adopção </button>';
}

if ($pet_fav) {
    echo '<button type="button" class="PetOptions-button" id="pet-fav-button"> Favorito <span id_pet='.$pet_id.' is_fav=1 id="pet-fav-star" style="color:red;"> &#9733; </span> </button>';
} else {
    echo '<button type="button" class="PetOptions-button" id="pet-fav-button"> Favorito <span id_pet='.$pet_id.' is_fav=0 id="pet-fav-star" style=""> &#9734; </span> </button>';
}

echo '</div>';
echo '
    <form class="reply-container" id="proposal_form" action="/actions/proposals/add_proposal.php"
        method="post" style="display:none;">

        <div class="">
            <textarea rows="4" style="width:100%;" id="proposal_message" name="proposal_message" placeholder="Faça uma proposta de adopção." form="proposal_form" required></textarea>
            <input type="hidden" name="id_pet" value="'.$pet_id.'" required>
            <input type="hidden" name="id_owner" value="'.$owner_id.'" required>
            <input type="hidden" id="comment_parent" name="id_parent" value="0" required>
            <br>
            <button type="submit" style=" width:200px;">submeter proposta</button>

        </div>
    </form>';
