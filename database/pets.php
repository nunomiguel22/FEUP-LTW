<?php
include_once(dirname(__FILE__).'/../includes/init.php');
include_once(dirname(__FILE__).'/photos.php');

function addPet($coverPhoto, $idowner, $name, $location, $age, $species, $size)
{
    $coverPhotoId = upload_single_photo($coverPhoto);
    global $dbh;
    try {
        $stmt = $dbh->prepare('INSERT INTO Pet(idphoto, idowner, name, age, location, species, size) 
            VALUES (:idphoto, :idowner, :name, :age, :location, :species, :size)');
        $stmt->bindParam(':idphoto', $coverPhotoId);
        $stmt->bindParam(':idowner', $idowner);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':species', $species);
        $stmt->bindParam(':size', $size);
        
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
