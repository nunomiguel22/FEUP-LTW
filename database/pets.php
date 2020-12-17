<?php
include_once(dirname(__FILE__).'/../includes/init.php');
include_once(dirname(__FILE__).'/photos.php');


function searchPets($search, $min_age, $max_age, $species, $size)
{
    $query = 'SELECT * FROM Pet WHERE ';
    $query .= '(age BETWEEN '.$min_age.' AND '.$max_age.')';

    $keywords = array_filter(explode(" ", $search));

    
    foreach ($keywords as $keyword) {
        $query .= ' AND (name LIKE "%'.$keyword.'%" OR location LIKE "%'.$keyword.'%")';
    }
    
    if ($species != 'qualquer') {
        $query .= ' AND species=:species';
    }
    if ($size != 'qualquer') {
        $query .= ' AND size=:size';
    }

    global $dbh;
    try {
        $stmt = $dbh->prepare($query);
        if ($species != 'qualquer') {
            $stmt->bindParam(':species', $species);
        }
        if ($size != 'qualquer') {
            $stmt->bindParam(':size', $size);
        }
        $stmt->execute();
        if ($res = $stmt->fetchAll()) {
            return $res;
        } else {
            return array();
        }
    } catch (PDOException $e) {
        echo $e;
        return array();
    }
}


function addPet($coverPhoto, $idowner, $name, $location, $age, $species, $size, $status)
{
    $coverPhotoId = uploadSinglePhoto($coverPhoto);
    global $dbh;
    try {
        $stmt = $dbh->prepare('INSERT INTO Pet(idphoto, idowner, name, age, location, species, size, status) 
            VALUES (:idphoto, :idowner, :name, :age, :location, :species, :size, :status)');
        $stmt->bindParam(':idphoto', $coverPhotoId);
        $stmt->bindParam(':idowner', $idowner);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':species', $species);
        $stmt->bindParam(':size', $size);
        $stmt->bindParam(':status', $status);
        if (!$stmt->execute()) {
            return -1;
        }

        $petid = $dbh->lastInsertId();

        return addPhotoToPet($coverPhotoId, $petid);
    } catch (PDOException $e) {
        echo $e;
        return -1;
    }

    return 0;
}

function editPet($pet_id, $name, $location, $age, $species, $size, $status)
{
    global $dbh;
    try {
        $query = 'UPDATE Pet SET name=:name, age=:age, location=:location, 
                    species=:species, size=:size, status=:status
                    WHERE id=:idpet';

        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':species', $species);
        $stmt->bindParam(':size', $size);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':idpet', $pet_id);
        if (!$stmt->execute()) {
            return -1;
        }
        return 0;
    } catch (PDOException $e) {
        echo $e;
        return -1;
    }

    return 0;
}

function removePet($pet_id)
{
    global $dbh;
    try {
        $query = 'DELETE FROM Pet WHERE id=:idpet';
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':idpet', $pet_id);
        if (!$stmt->execute()) {
            return -1;
        }
        return 0;
    } catch (PDOException $e) {
        echo $e;
        return -1;
    }

    return 0;
}

function changeOwner($pet_id, $newOwner)
{
    global $dbh;
    try {
        $stmt = $dbh->prepare('UPDATE Pet SET idowner=:newowner, status=0 WHERE id=:idpet');
        $stmt->bindParam(':newowner', $newOwner);
        $stmt->bindParam(':idpet', $pet_id);
        
        if (!$stmt->execute()) {
            return -1;
        }

        return 0;
    } catch (PDOException $e) {
        echo $e;
        return -1;
    }
}

function getPetbyId($id)
{
    global $dbh;
    try {
        $stmt = $dbh->prepare('SELECT * FROM Pet WHERE id=?');
        $stmt->execute(array($id));
        if ($pet = $stmt->fetch()) {
            return $pet;
        } else {
            return -1;
        }
    } catch (PDOException $e) {
        echo $e;
        return -1;
    }
}

function getAllPetsByUserID($idowner)
{
    try {
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Pet WHERE idowner=?');
        $stmt->execute(array($idowner));
        $res = $stmt->fetchAll();
    
        return $res;
    } catch (PDOException $e) {
        echo $e;
        return -1;
    }
}

function getRootCommentsByPetId($petid)
{
    global $dbh;
    try {
        $stmt = $dbh->prepare('SELECT * FROM Comments WHERE (idpet=? AND idparent=?)');
        $stmt->execute(array($petid, 0));
        if ($comments = $stmt->fetchAll()) {
            return $comments;
        } else {
            return -1;
        }
    } catch (PDOException $e) {
        echo $e;
        return -1;
    }
}

function getCommentChildren($comment_id)
{
    global $dbh;
    try {
        $stmt = $dbh->prepare('SELECT * FROM Comments WHERE idparent=?');
        $stmt->execute(array($comment_id));
        if ($comments = $stmt->fetchAll()) {
            return $comments;
        } else {
            return -1;
        }
    } catch (PDOException $e) {
        echo $e;
        return -1;
    }
}

function addComment($id_pet, $id_user, $id_parent, $message)
{
    global $dbh;
    try {
        $stmt = $dbh->prepare('INSERT INTO Comments(idpet, idowner, idparent, message) 
            VALUES (:idpet, :idowner, :idparent, :message)');
        $stmt->bindParam(':idpet', $id_pet);
        $stmt->bindParam(':idowner', $id_user);
        $stmt->bindParam(':idparent', $id_parent);
        $stmt->bindParam(':message', $message);
        
        if (!$stmt->execute()) {
            return -1;
        }
        return 0;
    } catch (PDOException $e) {
        echo $e;
        return -1;
    }

    return 0;
}

function setPetFavorite($id_user, $id_pet)
{
    global $dbh;
    try {
        $stmt = $dbh->prepare('INSERT INTO Favorites(idpet, iduser) VALUES (:idpet, :iduser)');
        $stmt->bindParam(':idpet', $id_pet);
        $stmt->bindParam(':iduser', $id_user);
        if (!$stmt->execute()) {
            return -1;
        }
    } catch (PDOException $e) {
        echo $e;
        return -1;
    }
    return 0;
}

function removePetFavorite($id_user, $id_pet)
{
    global $dbh;
    try {
        $stmt = $dbh->prepare('DELETE FROM Favorites WHERE idpet=? AND iduser=?');
        $stmt->execute(array($id_pet,$id_user));
        if (!$stmt->execute()) {
            return -1;
        }
    } catch (PDOException $e) {
        echo $e;
        return -1;
    }
    return 0;
}

function isPetFavorite($id_user, $id_pet)
{
    global $dbh;
    try {
        $stmt = $dbh->prepare('SELECT * FROM Favorites WHERE idpet=? AND iduser=?');
        $stmt->execute(array($id_pet,$id_user));
        if (!($fav = $stmt->fetch())) {
            return false;
        }
        
        return !(empty($fav));
    } catch (PDOException $e) {
        echo $e;
        return false;
    }
}

function getFavoritePetsByUserID($id_user)
{
    global $dbh;
    
    $query = "SELECT Pet.* FROM Pet LEFT JOIN Favorites 
                ON Pet.id = Favorites.idpet WHERE Favorites.iduser=?";
    
    $stmt = $dbh->prepare($query);

    $stmt->execute(array($id_user));
    $res = $stmt->fetchAll();
    if (!$res) {
        return array();
    }

    return $res;
}
