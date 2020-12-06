<html>
<body>
   <div class="NavBar">
      <img src="/images/logo.jpg" alt="toplogo" class="toplogo">
      <div class="NavBar-right">
         <?php
                $loginDropdown =
                  '<div class="dropdown">
                     <button class="dropbtn">'.$_SESSION['username'].'</button>
                     <div class="dropdown-content">
                        <a href="#">Perfil</a>
                        <a href="/pages/newpet.php">Registar Animal</a>
                        <a href="/actions/action_logout.php">Sair</a>
                     </div>
                  </div>';
                echo $loginDropdown;
        ?>
      </div>
   </div>
<br><br><br>
</body>
</html>
