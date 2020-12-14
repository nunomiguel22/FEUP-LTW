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
          <th>Photo</th>
          <th>Name</th>
          <th>Age</th>
          <th>Location</th>
          <th>Species</th>
          <th>Size</th>
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
    for ($n =0; $n < $sizeof; $n++) {
        echo '<a href="/pages/pet_profile.php?petid='.$petid[$n].'">';
        $buildtable=
          '
          <tr class="pet_row" pet_id="'.$petid[$n].'">
          <td> <img src='.$photobyid[$petphotoid[$n]].' alt="Adoption GO" class="pettablephoto" >  </td>
            <td>'.$name[$n].'</td>
            <td>'.$age[$n].'</td>
            <td>'.$location[$n].'</td>
            <td>'.$species[$n].'</td>
            <td>'.$size[$n].'</td>
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
