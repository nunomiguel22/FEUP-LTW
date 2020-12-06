<html>

<head>
   <title>Adoption GO</title>
   <link rel="stylesheet" type="text/css" href="/css/style.css">
   <meta charset="utf-8">
   <meta name="viewport" cotent="width=device-width">
   <link rel="icon" href="/images/favicon.jpg">
   <script src="../js/jquery-3.5.1.js"></script>
   <script type="text/javascript" src="../js/signup_dialog.js"></script>
</head>

<body>
   <div class="NavBar">
      <img src="/images/logo.jpg" alt="toplogo" class="toplogo">
      <div class="NavBar-right">
         <?php
            session_start();
            if (isset($_SESSION['username']) && $_SESSION['logged_in'] == 'true') {
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
            } else {
                $loginButton = '<button onclick="document.getElementById(\'id01\').style.display=\'block\'" 
                                 style="width:auto;">Entrar</button> ';
                $signupButton = '<button onclick="document.getElementById(\'id02\').style.display=\'block\'" 
                                 style="width:auto;">Registrar</button> ';
                echo $loginButton;
                echo $signupButton;
            }
?>

      </div>
   </div>
   
   <div id="id01" class="modal">

      <form class="modalLogin-content" id="login_form" action="/actions/action_login.php" method="post">
         <div class="imgcontainer">
            <span class="Title2">Entrar na conta</span>
            <span onclick="document.getElementById('id01').style.display='none'" class="close"
               title="Close login form">&times;</span>
            <img src="/images/logo.jpg" alt="logo" class="logo">
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

   <form class="modalSignup-content" action="/actions/action_signup.php" onsubmit="return canUserSignup();" method="post">
      <div class="imgcontainer">
         <span class="Title2">Criar nova conta</span>
         <span onclick="document.getElementById('id02').style.display='none'" class="close"
            title="Close login form">&times;</span>
         <img src="/images/logo.jpg" alt="logo" class="logo">
      </div>


      <div class="container">
         <input type="text" id="sp_username" placeholder="Utilizador" name="username" required autofocus>
         <div id="sp_username_r"> </div>
         <input type="password" id="sp_password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{5,10}$" placeholder="Palavra-passe (5 a 10 Caracteres)" name="password" required>
         <div id="sp_password_r"> </div>
         <input type="email" id="sp_email" placeholder="E-mail" name="email" required>
         <div id="sp_email_r"> </div>
         <input type="text" placeholder="Nome" name="name">
         <br>
         <button type="submit">Registrar</button>

      </div>
   </form>
</div>
<br><br><br>
</body>

</html>
