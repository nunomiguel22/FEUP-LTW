<html>

<body>

  <div class="Banner">
    <br>
    <img src="/images/mpets.png" alt="Adoption GO" class="userpageBanner" width=800px>
    <!-- verificar -->
  </div>

  <br> <br> <br>

  <?php
        global $dbh;
        $stmt = $dbh->prepare('SELECT * FROM Pet');
        $stmt->execute();
        $userdata = $stmt->fetchAll();
        //print_r($userdata);
        //print_r($userdata[0]["id"]);
        //print_r(sizeof($userdata));

        $stmt = $dbh->prepare('SELECT * FROM Photo');
        $stmt->execute();
        $photos = $stmt->fetchAll();
        
        for ($i =0; $i<sizeof($photos); $i++) {
            $idphoto= $photos[$i]['id'];
            $pathphoto= $photos[$i]['path'];
            $photobyid[$idphoto]=$pathphoto;
        }
        //print_r($photobyid);
        
        
        echo '<table  class="Petstable" >
        <tr>
          <th>Photo</th>
          <th>Id</th>
          <th>Name</th>
          <th>Age</th>
          <th>Location</th>
          <th>Species</th>
          <th>Size</th>
          <th>Link</th>
        </tr>';

        $sizeof= sizeof($userdata);
        $n =0;
        
        $petphotoid= array_column($userdata, 'idphoto');
        $id= array_column($userdata, 'id');
        $name=array_column($userdata, 'name');
        $age= array_column($userdata, 'age');
        $location= array_column($userdata, 'location');
        $species= array_column($userdata, 'species');
        $size= array_column($userdata, 'size');
        for ($n =0; $n < $sizeof; $n++) {
            $buildtable=
          '
          <tr>
          <td> <img src='.$photobyid[$petphotoid[$n]].' alt="Adoption GO" class="pettablephoto" width=80px>  </td>
            <td>'.$id[$n].'</td>
            <td>'.$name[$n].'</td>
            <td>'.$age[$n].'</td>
            <td>'.$location[$n].'</td>
            <td>'.$species[$n].'</td>
            <td>'.$size[$n].'</td>
            <td>'.$id[$n].'</td>
          </tr>
          '
        ;
            echo $buildtable;
        }
        echo '</table>'
        ?>

</body>

</html>


<?php

// Banner e responsabilidade da pagina, o template so tem que imprimir a tabela dinamicamente
// A tabela nao precisa de formataçao propria em termos de width, height, etc. a pagina que usar coloca a tabela num container e formata como quer

//Colunas ID e link nao sao necessarias
//Link para pagina dos pets:
  //echo '<a href="/pages/pet_profile.php?petid='.$petid.'">';
  //echo da linha
  //echo '</a>';
