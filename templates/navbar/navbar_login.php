<?php
include_once(dirname(__FILE__) . "/../../includes/login_only.php");
?>

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
                     <a href="/pages/change_user_data.php">Editar Perfil</a>
                     <a href="/pages/new_pet.php">Registar Animal</a>
                     <a href="/pages/pet_manage.php">Gerir animais</a>
                     <a href="/pages/favorites.php">Favoritos</a>
                     <a href="/pages/proposals.php">Minhas propostas</a>
                     <a href="/actions/users/logout_user.php">Sair</a>
                     </div>
                  </div>';
                echo $loginDropdown;
        ?>
      </div>
   </div>
   <div class="NavBar-padding"> </div>
</body>

</html>
