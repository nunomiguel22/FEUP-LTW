<?php
include_once(dirname(__FILE__).'/../includes/init.php');

include_once(dirname(__FILE__).'/pets.php');

function PetHasOfferByUserID($pet_id)
{
    $user_id = getSessionUserID();
    global $dbh;
    try {
        $stmt = $dbh->prepare('SELECT * FROM Proposal WHERE iduser=? AND idpet=? AND status ==1');
        $stmt->execute(array($user_id, $pet_id));
        if (!($res = $stmt->fetch())) {
            return false;
        }
        return !(empty($res));
    } catch (PDOException $e) {
        echo $e;
        return -1;
    }
}

function addPetProposal($pet_id, $user_id, $owner_id, $message)
{
    global $dbh;
    $status = 1;
    try {
        $stmt = $dbh->prepare('INSERT INTO Proposal(idpet, iduser, idowner, message, status) 
            VALUES (:idpet, :iduser, :idowner, :message, :status)');
        $stmt->bindParam(':idpet', $pet_id);
        $stmt->bindParam(':iduser', $user_id);
        $stmt->bindParam(':idowner', $owner_id);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':status', $status);

        if (!$stmt->execute()) {
            return -1;
        }
        return 0;
    } catch (PDOException $e) {
        echo $e;
        return -1;
    }
}

function getProposalById($prop_id)
{
    $user_id = getSessionUserID();
    global $dbh;
    try {
        $stmt = $dbh->prepare('SELECT * FROM Proposal WHERE id=?');
        $stmt->execute(array($prop_id));
        if (!($res = $stmt->fetch())) {
            return -1;
        }
        return $res;
    } catch (PDOException $e) {
        echo $e;
        return -1;
    }
}

function cancelPetProposal($proposal_id)
{
    global $dbh;
    try {
        $stmt = $dbh->prepare('UPDATE Proposal SET status=0 WHERE id=:id');
        $stmt->bindParam(':id', $proposal_id);
        
        if (!$stmt->execute()) {
            return -1;
        }
        return 0;
    } catch (PDOException $e) {
        echo $e;
        return -1;
    }
}


function acceptPetProposal($proposal_id, $new_owner, $idpet)
{
    global $dbh;
    try {
        $stmt = $dbh->prepare('UPDATE Proposal SET status=2 WHERE id=:id');
        $stmt->bindParam(':id', $proposal_id);
        
        if (!$stmt->execute()) {
            return -1;
        }

        return changeOwner($idpet, $new_owner);
    } catch (PDOException $e) {
        echo $e;
        return -1;
    }
}

function getOwnerProposals($owner_id)
{
    global $dbh;
    try {
        $query = 'SELECT Pet.*, Proposal.status as pstatus, Proposal.id as pid 
                    FROM Proposal LEFT JOIN Pet 
                    ON Pet.id = Proposal.idpet WHERE Proposal.idowner=?';

        $stmt = $dbh->prepare($query);
        $stmt->execute(array($owner_id));
        if ($res = $stmt->fetchAll()) {
            return $res;
        }
        return array();
    } catch (PDOException $e) {
        echo $e;
        return array();
    }
}

function getUserProposals($user_id)
{
    global $dbh;
    try {
        $query = 'SELECT Pet.*, Proposal.status as pstatus, Proposal.id as pid 
                    FROM Proposal LEFT JOIN Pet 
                    ON Pet.id = Proposal.idpet WHERE Proposal.iduser=?';

        $stmt = $dbh->prepare($query);
        $stmt->execute(array($user_id));
        if ($res = $stmt->fetchAll()) {
            return $res;
        }
        return array();
    } catch (PDOException $e) {
        echo $e;
        return array();
    }
}

function getPetProposals($user_id)
{
    global $dbh;
    try {
        $query = 'SELECT * FROM Proposal LEFT JOIN Pet 
                    ON Pet.id = Proposal.idpet';

        $stmt = $dbh->prepare($query);
        $stmt->execute(array($user_id));
        if ($res = $stmt->fetchAll()) {
            return $res;
        }
        return -1;
    } catch (PDOException $e) {
        echo $e;
        return -1;
    }
}
