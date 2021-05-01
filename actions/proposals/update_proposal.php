<?php
include_once(dirname(__FILE__)."/../../includes/init.php");
include_once(dirname(__FILE__)."/../../database/proposal.php");

verifyCSRF();
include_once(dirname(__FILE__)."/../../includes/login_only.php");
validateAndFilter($_POST, 'id_prop', 'submit');

$iduser = getSessionUserID();
$idprop = $_POST["id_prop"];
$type = $_POST["submit"];

$prop_info = getProposalById($idprop);
$id_user = $prop_info["iduser"];
$id_pet = $prop_info["idpet"];

if ($type == "accept") {
    acceptPetProposal($idprop, $id_user, $id_pet);
} else {
    cancelPetProposal($idprop);
}

header("location: /pages/proposals.php");
