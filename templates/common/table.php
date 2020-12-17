<?php
include_once(dirname(__FILE__).'/../../database/photos.php');


function drawTable($userdata)
{
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
        
    $petphotoid= array_column($userdata, 'idphoto');
    $petid=array_column($userdata, 'id');
    $photoids = [];
    foreach ($petid as $id) {
        array_push($photoids, getPhotoPathByID($id));
    }

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
          <td> <img src='.$photoids[$n].' alt="Adoption GO" class="pettablephoto" >  </td>
            <td>'.$name[$n].'</td>
            <td>'.$age[$n].'</td>
            <td>'.$location[$n].'</td>
            <td>'.$species[$n].'</td>
            <td>'.$size[$n].'</td>
            <td>'.$check.'</td>
          </tr>
          ';
        echo $buildtable;
    }
    echo '</table>';
    echo '<script type="text/javascript" src="../js/pet_table.js"></script>';
    return 1;
}

function drawUserProposalTable($userdata)
{
    echo '<table  class="Petstable" >
        <tr>
          <th>Foto</th>
          <th>Nome</th>
          <th>Idade</th>
          <th>Localização</th>
          <th>Espécie</th>
          <th>Tamanho</th>
          <th>Estado</th>
        </tr>';

    $sizeof = sizeof($userdata);
        
    $petphotoid= array_column($userdata, 'idphoto');
    $petid=array_column($userdata, 'id');
    $photoids = [];
    foreach ($petid as $id) {
        array_push($photoids, getPhotoPathByID($id));
    }


    $prop_id=array_column($userdata, 'pid');
    $name=array_column($userdata, 'name');
    $age= array_column($userdata, 'age');
    $location= array_column($userdata, 'location');
    $species= array_column($userdata, 'species');
    $size= array_column($userdata, 'size');
    $status= array_column($userdata, 'pstatus');
    $message= array_column($userdata, 'message');
    for ($n =0; $n < $sizeof; $n++) {
        if ($status[$n] == 1) {
            $check = '<span style="color:olive">Pendente</span>';
        } elseif ($status[$n] == 0) {
            $check = '<span style="color:red">Rejeitada/Cancelada</span>';
        } else {
            $check = '<span style="color:green">aceite</span>';
        }

        $buildtable=
          '
          <tr class="prop_pet_row" prop_id="'.$prop_id[$n].'" >
          <td> <img src='.$photoids[$n].' alt="Adoption GO" class="pettablephoto" >  </td>
            <td>'.$name[$n].'</td>
            <td>'.$age[$n].'</td>
            <td>'.$location[$n].'</td>
            <td>'.$species[$n].'</td>
            <td>'.$size[$n].'</td>
            <td>'.$check.'</td>
          </tr>
          ';
        echo $buildtable;
    }
    echo '</table>';
    echo '<script type="text/javascript" src="../js/pet_table.js"></script>';
    return 1;
}
