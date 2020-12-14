<html>

<body>

    <div class="Banner">
        <br>
        <img src="/images/banner_3.jpg" alt="Adoption GO" class="userpageBanner" width=800px>
                                                        <!-- verificar -->
    </div>

    <?php 
    $idowner = getSessionUserID(); 
    $print1 ='<form method="POST" action= "/actions/action_change_usernamepw">
            <div class = "Editp-gen" > <br>
            <span class ="Editptitle"> Alteração de nome e password </span> <br>
             <br>
            <span class ="Editp"> Novo Username </span>
            <input type="text" id="sp_username" onkeyup="checkUsername()"  placeholder="Novo nome de utilizador" name="username" >
            <span class ="Editp"> Novo Nome </span>
            <input type="text" placeholder="Novo nome" name="name">   
            <span class ="Editp"> Nova password </span>
            <input type="password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{5,10}$" placeholder="Nova Palavra-passe (5 a 10 Caracteres)" name="password" >  
            <button type="submit">Efetuar alteração</button>
            </div>
            </form>';

    echo $print1;
    $print2 = '<form action= "/actions/action_delacc">
            <div class = "Editp-gen" >
            <button type="submit">Eliminar Conta</button>
            </div>
            </form>';
    echo $print2;
    ?>
    


</body>

</html>