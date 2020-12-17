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
    
        move_uploaded_file($photo["tmp_name"], '..'.$target);
    
        $stmt = $dbh->prepare('INSERT INTO Photo(path) VALUES (:path)');
        $stmt->bindParam(':path', $target);
        $stmt->execute();
        return $count;
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
        $petid = $stmt->fetch()["idpet"];
        return $petid;
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
