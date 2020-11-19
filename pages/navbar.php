<html>

<head>
   <title>Adoption GO</title>
   <link rel="stylesheet" type="text/css" href="/css/style.css">
   <meta charset="utf-8">
   <meta name="viewport" cotent="width=device-width">
   <link rel="icon" href="/images/favicon.jpg">
</head>

<body>
   <div class="topbar">
      <img src="/images/logo.jpg" alt="toplogo" class="toplogo">
      <div class="topbar-right">
         <?php
            session_start();
            if (isset($_SESSION['username']) && $_SESSION['logged_in'] == 'true') {
                $loginDropdown =
                  '<div class="dropdown">
                     <button class="dropbtn">'.$_SESSION['username'].'</button>
                     <div class="dropdown-content">
                        <a href="#">Profile</a>
                        <a href="/actions/action_logout.php">Logout</a>
                     </div>
                  </div>';
                echo $loginDropdown;
            } else {
                $loginButton = '<button onclick="document.getElementById(\'id01\').style.display=\'block\'" 
                                 style="width:auto;">Login</button> ';
                $signupButton = '<button onclick="document.getElementById(\'id02\').style.display=\'block\'" 
                                 style="width:auto;">Sign up</button> ';
                echo $loginButton;
                echo $signupButton;
            }
?>

      </div>
   </div>
   
   <div id="id01" class="modalLogin">

      <form class="modalLogin-content" action="/actions/action_login.php" method="post">
         <div class="imgcontainer">
            <h3>Login</h3>
            <span onclick="document.getElementById('id01').style.display='none'" class="close"
               title="Close login form">&times;</span>
            <img src="/images/logo.jpg" alt="logo" class="logo">
         </div>


         <div class="container">
            <input type="text" placeholder="Username" name="username" required>
            <input type="password" placeholder="Password" name="password" required>
            <br>
            <button type="submit">Login</button>

         </div>
      </form>
   </div>

   
</body>

</html>
