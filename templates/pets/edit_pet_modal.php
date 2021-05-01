<?php

include_once(dirname(__FILE__) . "/../../includes/login_only.php");


$name = $pet["name"];
$loc = $pet["location"];
$age = $pet["age"];
$spec = $pet["species"];
$size = $pet["size"];
$status = $pet["status"];

if ($pet["status"]) {
    $status = "checked";
} else {
    $status = "";
}




echo '
<div class="modal" id="edit_pet_modal">


    <form enctype="multipart/form-data" class="modalEditPet-content" id="new_pet_form"
        action="/actions/pets/edit_pet.php" method="post">';
        
        include_once(dirname(__FILE__).'/../../includes/csrf.php');
        insertCSRFToken();
        
        echo'
        <div class="container">
            <span class="HomeTitle">Adoption</span> <span class="HomeTitle" style="Color: Red;">GO</span>
            <span class="close" style="float:right; position:relative; "
                onclick="document.getElementById(\'edit_pet_modal\').style.display=\'none\'">&times;</span>
            <input type="hidden" name="idpet" value="'.$pet["id"].'">
            <input type="text" placeholder="Nome" name="name" value="'.$name.'" required autofocus>
            <input type="text" placeholder="Localização" name="location" value="'.$loc.'" required>
            <input type="number" name="age" placeholder="Idade" value="'.$age.'" min="1" max="100">
            <span class="NewPet-Info"> Espécie </span> <br>
            <select class="custom-select" name="species">
                <option value="cão">Cão</option>
                <option value="gato">Gato</option>
                <option value="outro">Outro</option>
                <option selected="selected">'.$spec.'</option>
            </select>
            <br>
            <span class="NewPet-Info"> Tamanho </span> <br>
            <select class="custom-select" name="size">
                <option value="pequeno">Pequeno</option>
                <option value="médio">Médio</option>
                <option value="grande">Grande</option>
                <option selected="selected">'.$size.'</option>
            </select>
            <br><br>
            <input type="checkbox" style="float: left;" id="status_checkmark" name="status"'.$status.'>
            <label for="status_checkmark" style="float: left;" checked> Para adopção?</label><br><br>
            <button type="submit" name="submit" value="edit">Editar</button>
            <button style="background-color:red; color:white;" type="submit" name="submit" value="del">Remover</button>
        </div>
    </form>

</div>';
