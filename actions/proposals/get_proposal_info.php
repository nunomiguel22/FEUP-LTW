<?php
include_once(dirname(__FILE__)."/../../includes/init.php");



include_once(dirname(__FILE__)."/../../database/proposal.php");
include_once(dirname(__FILE__)."/../../database/user.php");

include_once(dirname(__FILE__)."/../../includes/login_only.php");


$id_prop = $_POST["id_prop"];
$prop_info = getProposalById($id_prop);

$id_owner = $prop_info["idowner"];
$id_user = $prop_info["iduser"];


$res["id"] = $id_prop;
$res["user"] = getUserbyID($id_user);
$res["owner"] = getUserbyID($id_owner);
$res["status"] = $prop_info["status"];
$res["message"] = $prop_info["message"];
$res["userIsOwner"] = ($id_owner == getSessionUserID());

echo json_encode($res);
