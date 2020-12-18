<?php
include_once(dirname(__FILE__)."/../../includes/init.php");
include_once(dirname(__FILE__)."/../../database/proposal.php");

verifyCSRF();
include_once(dirname(__FILE__)."/../../includes/login_only.php");
validateAndFilter($_POST, 'id_pet', 'id_owner', 'proposal_message');

$iduser = getSessionUserID();
$idpet = $_POST["id_pet"];
$idowner = $_POST['id_owner'];
$message = $_POST["proposal_message"];

if (addPetProposal($idpet, $iduser, $idowner, $message) == -1) {
    echo('<script>alert("Failed to add proposal")</script>
    <script>window.location.replace("/index.php")</script>');
}

header("location: /pages/pet_profile.php?petid=".$idpet);
