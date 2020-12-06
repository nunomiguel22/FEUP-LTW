<?php
include_once('../includes/init.php');

function addPet($idowner, $name, $location, $age, $species, $size)
{
    global $dbh;
    try {
        $stmt = $dbh->prepare('INSERT INTO Pet(idowner, name, age, location, species, size) 
            VALUES (:idowner, :name, :age, :location, :species, :size)');
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
