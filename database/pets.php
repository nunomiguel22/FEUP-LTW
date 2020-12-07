<?php
include_once('../includes/init.php');
include_once('upload_single.php');

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
        
        if ($stmt->execute()) {
            return 0;
        } else {
            return -1;
        }
    } catch (PDOException $e) {
        echo $e;
        return -1;
    }

    return 0;
}
