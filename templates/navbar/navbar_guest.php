<html>
<body>
   <div class="NavBar">
      <a href="/index.php"> 
         <span class="HomeTitle">Adoption</span> <span class="HomeTitle" style="Color: Red;">GO</span>
      </a>
      <div class="NavBar-right">
         <?php
                $loginButton = '<button onclick="document.getElementById(\'id01\').style.display=\'block\'" 
                                 style="width:auto;">Entrar</button> ';
                $signupButton = '<button onclick="document.getElementById(\'id02\').style.display=\'block\'" 
                                 style="width:auto;">Registrar</button> ';
                echo $loginButton;
                echo $signupButton;
        ?>
      </div>
 
   
      <div id="id01" class="modal">

         <form class="modalLogin-content" id="login_form" action="/actions/users/login_user.php" method="post">
            <div class="imgcontainer">
               <span class="Title2">Entrar na conta</span>
               <span onclick="document.getElementById('id01').style.display='none'" class="close"
                  title="Close login form">&times;</span>
               <a href="/index.php"> 
                  <span class="HomeTitle">Adoption</span> <span class="HomeTitle" style="Color: Red;">GO</span>
               </a>
            </div>


            <div class="container">
               <input type="text" placeholder="Utilizador" name="username" required autofocus>
               <input type="password" placeholder="Palavra-passe" name="password" required>
               <br>
               <button type="submit">Entrar</button>

            </div>
         </form>
      </div>

      <div id="id02" class="modal">

         <form class="modalSignup-content" action="/actions/users/signup_user.php" onsubmit="return canUserSignup();" method="post">
            <div class="imgcontainer">
               <span class="Title2">Criar nova conta</span>
               <span onclick="document.getElementById('id02').style.display='none'" class="close"
                  title="Close login form">&times;</span>
               <a href="/index.php"> 
                  <span class="HomeTitle">Adoption</span> <span class="HomeTitle" style="Color: Red;">GO</span>
               </a>
            </div>


            <div class="container">
               <input type="text" id="sp_username" onkeyup="checkUsername()"  placeholder="Utilizador" name="username" required autofocus>
               <div id="sp_username_r"> </div>
               <input type="password" id="sp_password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{5,10}$" placeholder="Palavra-passe (5 a 10 Caracteres)" name="password" required>
               <div id="sp_password_r"> </div>
               <input type="email" id="sp_email" onkeyup="checkEmail()" placeholder="E-mail" name="email" required>
               <div id="sp_email_r"> </div>
               <input type="text" placeholder="Nome" name="name">
               <br>
               <button type="submit">Registrar</button>

            </div>
         </form>
      </div>
   </div>
   <div class="NavBar-padding"> </div>
</body>
</html>
