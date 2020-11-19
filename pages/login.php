<html>

<head>
   <title>Adoption GO</title>
   <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
   <div class="topbar">
      <img src="../images/logo.jpg" alt="logo" class="toplogo">
      <div class="topbar-right">
         <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
      </div>
   </div>

   <div id="id01" class="modal">

      <form class="modal-content" action="../actions/action_login.php" method="post">
         <div class="imgcontainer">
            <h3>Login</h3>
            <span onclick="document.getElementById('id01').style.display='none'" class="close"
               title="Close Modal">&times;</span>
            <img src="../images/logo.jpg" alt="logo" class="logo">
         </div>


         <div class="container">
            <input type="text" placeholder="Username" name="username" required>
            <input type="password" placeholder="Password" name="password" required>
            <br>
            <button type="submit">Login</button>
         </div>
      </form>
   </div>
   <br><br>
</body>

</html>
