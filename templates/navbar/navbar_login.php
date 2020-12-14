<html>
<body>
   <div class="NavBar">
      <a href="/index.php"> 
         <span class="HomeTitle">Adoption</span> <span class="HomeTitle" style="Color: Red;">GO</span>
      </a>
      <div class="NavBar-right">
         <?php
                $loginDropdown =
                  '<div class="dropdown">
                     <button class="dropbtn">'.$_SESSION['username'].'</button>
                     <div class="dropdown-content">
                     <a href="/pages/userpage.php">Editar Perfil</a>
                     <a href="/pages/new_pet.php">Registar Animal</a>
                     <a href="/pages/pet_manage.php">Gerir animais</a>
                     <a href="#">Minhas propostas</a>
                     <a href="/actions/action_logout.php">Sair</a>
                     </div>
                  </div>';
                echo $loginDropdown;
        ?>
      </div>
   </div>
   <div class="NavBar-padding"> </div>
</body>
</html>
