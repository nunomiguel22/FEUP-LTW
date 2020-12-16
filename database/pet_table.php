<?php
include_once(dirname(__FILE__).'/../includes/init.php');

function get_all_pets()
{
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM Pet');
    $stmt->execute();
    $userdata = $stmt->fetchAll();
    return $userdata;
}

function get_all_idowner_pets($idowner)
{
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM Pet WHERE idowner=?');
    $stmt->execute(array($idowner));
    $userdata = $stmt->fetchAll();
    //print_r($userdata);
    return $userdata;
}

function get_search_pets($age, $location, $species, $size)
{
}

function get_user_favorite_pets($id_user)
{
    global $dbh;
    $stmt = $dbh->prepare('SELECT idpet FROM Favorites WHERE iduser=?');
    $stmt->execute(array($id_user));
    if (!($pet_ids = $stmt->fetchAll())) {
        return array();
    }

    
    $pets = [];
    foreach ($pet_ids as $pet_id) {
        $stmt = $dbh->prepare('SELECT * FROM Pet WHERE id=?');
        $stmt->execute(array($pet_id["idpet"]));
        if ($res = $stmt->fetch()) {
            array_push($pets, $res);
        } else {
            return -1;
        }
    }
    return $pets;
}

function draw_table($userdata)
{
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM Photo');
    $stmt->execute();
    $photos = $stmt->fetchAll();
    
    for ($i =0; $i<sizeof($photos); $i++) {
        $idphoto= $photos[$i]['id'];
        $pathphoto= $photos[$i]['path'];
        $photobyid[$idphoto]=$pathphoto;
    }

    echo '<table  class="Petstable" >
        <tr>
          <th>Foto</th>
          <th>Nome</th>
          <th>Idade</th>
          <th>Localização</th>
          <th>Espécie</th>
          <th>Tamanho</th>
          <th>Para adopção</th>
        </tr>';

    $sizeof= sizeof($userdata);
    $n =0;
        
    $petphotoid= array_column($userdata, 'idphoto');
    $petid=array_column($userdata, 'id');
    $name=array_column($userdata, 'name');
    $age= array_column($userdata, 'age');
    $location= array_column($userdata, 'location');
    $species= array_column($userdata, 'species');
    $size= array_column($userdata, 'size');
    $status= array_column($userdata, 'status');
    for ($n =0; $n < $sizeof; $n++) {
        if ($status[$n] == 1) {
            $check = "&#10003;";
        } else {
            $check = "&#10006;";
        }

        $buildtable=
          '
          <tr class="pet_row" pet_id="'.$petid[$n].'">
          <td> <img src='.$photobyid[$petphotoid[$n]].' alt="Adoption GO" class="pettablephoto" >  </td>
            <td>'.$name[$n].'</td>
            <td>'.$age[$n].'</td>
            <td>'.$location[$n].'</td>
            <td>'.$species[$n].'</td>
            <td>'.$size[$n].'</td>
            <td>'.$check.'</td>
          </tr>
          '
        ;
        echo $buildtable;
        echo '</a>';
    }
    echo '</table>';
    echo '<script type="text/javascript" src="../js/pet_table.js"></script>';
    return 1;
}
