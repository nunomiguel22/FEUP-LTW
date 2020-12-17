<?php
include_once(dirname(__FILE__).'/../../database/pets.php');
include_once(dirname(__FILE__).'/../../database/proposal.php');
include_once(dirname(__FILE__).'/../../includes/session.php');
include_once(dirname(__FILE__).'/../../includes/csrf.php');

$owner_id = $pet["idowner"];
$user_id = getSessionUserID();
$pet_id = $pet["id"];


if ($user_id != $owner_id) {
    userOptions($pet, $user_id, $owner_id, $pet_id);
} else {
    ownerOptions($pet, $user_id, $owner_id, $pet_id);
}


function userOptions($pet, $user_id, $owner_id, $pet_id)
{
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
        method="post" style="display:none;">';
        
  
    insertCSRFToken();
      
    echo '
        <div class="">
            <textarea rows="4" style="width:100%;" id="proposal_message" name="proposal_message" placeholder="Faça uma proposta de adopção." form="proposal_form" required></textarea>
            <input type="hidden" name="id_pet" value="'.$pet_id.'" required>
            <input type="hidden" name="id_owner" value="'.$owner_id.'" required>
            <input type="hidden" id="comment_parent" name="id_parent" value="0" required>
            <br>
            <button type="submit" style=" width:200px;">submeter proposta</button>

        </div>
    </form>';
}


function ownerOptions($pet, $user_id, $owner_id, $pet_id)
{
    include_once(dirname(__FILE__).'/edit_pet_modal.php');
    echo '<div class="PetOptions">';
    echo '<button type="button" class="PetOptions-button" id="edit-pet-button" > Editar </button>';
    echo '<button type="button" class="PetOptions-button" id="photo-pet-button"> Adicionar fotos </button>';
    echo '</div>';

    echo '
    <form style="display:none;" enctype="multipart/form-data" id="photo_form" action="/actions/pets/add_photos.php" method="post">

        <div class="CoverPhotoDialog" style="float:right;">';

    insertCSRFToken();
    echo '
            <input type="hidden" name="id_pet" value="'.$pet_id.'" required>
            <input  type="file" name="coverPhotoInput[]" id="coverPhotoInput" multiple  required>
            <button type="submit"  style="all: revert; width:200px;">submeter fotos</button>
            <br>
            <span class="smallerror" id="CoverPhotoError"></span>
            <script type="text/javascript" src="../js/new_pet_dialog.js"></script>

        </div><br>
   
    </form>';
}
