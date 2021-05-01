<?php
include_once(dirname(__FILE__).'/../includes/init.php');


function uploadSinglePhoto($photo)
{
    try {
        global $dbh;
        $stmt = $dbh->prepare('SELECT COUNT(id) as count FROM Photo');
        $stmt->execute();
        $count = $stmt->fetch()["count"] + 1;
        
        $dir = "/images";
        $target = $dir."/Pet".$count.'.'.strtolower(pathinfo($photo["name"], PATHINFO_EXTENSION));
    
        move_uploaded_file($photo["tmp_name"], dirname(__FILE__).'/..'.$target);
    
        $stmt = $dbh->prepare('INSERT INTO Photo(path) VALUES (:path)');
        $stmt->bindParam(':path', $target);
        $stmt->execute();
        return $count;
    } catch (PDOException $e) {
        return -1;
    }
}

function uploadPetPhotos($photos, $pet_id)
{
    foreach ($photos["tmp_name"] as $key=>$tmp_name) {
        $photo["name"] = $photos["name"][$key];
        $photo["tmp_name"] = $photos["tmp_name"][$key];

        $photo_id = uploadSinglePhoto($photo);
        addPhotoToPet($photo_id, $pet_id);
    }
}


function addPhotoToPet($photo_id, $pet_id)
{
    try {
        global $dbh;
        $stmt = $dbh->prepare('INSERT INTO PetPhotos(idphoto, idpet) VALUES (:idphoto, :idpet)');
        $stmt->bindParam(':idphoto', $photo_id);
        $stmt->bindParam(':idpet', $pet_id);
        if (!$stmt->execute()) {
            return -1;
        }
    } catch (PDOException $e) {
        return -1;
    }
}

function getPetIDfromPhotoID($idphoto)
{
    try {
        global $dbh;
        $stmt = $dbh->prepare('SELECT idpet FROM PetPhotos WHERE idphoto=?');
        $stmt->execute(array($idphoto));
        if ($petid = $stmt->fetch()) {
            return $petid["idpet"];
        }
        return -1;
    } catch (PDOException $e) {
        return -1;
    }
    return -1;
}

function getPreviewPhotos($count)
{
    try {
        global $dbh;
        $stmt = $dbh->prepare('SELECT idphoto FROM Pet ORDER BY RANDOM() LIMIT '.$count);
        $stmt->execute();
        $photos = $stmt->fetchAll();
    
        return $photos;
    } catch (PDOException $e) {
        return -1;
    }
}

function getPhotoPathByID($id)
{
    try {
        global $dbh;
        $stmt = $dbh->prepare('SELECT path FROM Photo WHERE id=?');
        $stmt->execute(array($id));
        if ($row = $stmt->fetch()) {
            return $row['path'];
        } else {
            return -1;
        }
    } catch (PDOException $e) {
        return -1;
    }
}

function getPhotosbyPetId($id)
{
    global $dbh;
    try {
        $query = "SELECT Photo.path FROM Photo LEFT JOIN PetPhotos
                ON PetPhotos.idphoto = Photo.id WHERE PetPhotos.idpet=?";

        $stmt = $dbh->prepare($query);
        $stmt->execute(array($id));
        $res = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
        return $res;
    } catch (PDOException $e) {
        echo $e;
        return -1;
    }
}
