<?php
include_once(dirname(__FILE__).'/../includes/init.php');
include_once(dirname(__FILE__).'/photos.php');


function addPet($coverPhoto, $idowner, $name, $location, $age, $species, $size, $status)
{
    $coverPhotoId = upload_single_photo($coverPhoto);
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

        $stmt = $dbh->prepare('INSERT INTO PetPhotos(idphoto, idpet) VALUES (:idphoto, :idpet)');
        $stmt->bindParam(':idphoto', $coverPhotoId);
        $stmt->bindParam(':idpet', $petid);
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

function getPetPhotosbyPetId($id)
{
    global $dbh;
    try {
        $stmt = $dbh->prepare('SELECT idphoto FROM PetPhotos WHERE idpet=?');
        $stmt->execute(array($id));
        if (!($photoids = $stmt->fetchAll())) {
            return array();
        }

        $res = [];

        foreach ($photoids as $photoid) {
            $stmt = $dbh->prepare('SELECT path FROM Photo WHERE id=?');
            $stmt->execute(array($photoid["idphoto"]));
            if ($photopath = $stmt->fetch()) {
                array_push($res, $photopath["path"]);
            } else {
                return -1;
            }
        }
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

function set_pet_favorite($id_user, $id_pet)
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
}

function remove_pet_favorite($id_user, $id_pet)
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
}

function is_pet_favorite($id_user, $id_pet)
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
