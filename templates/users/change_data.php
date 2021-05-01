<?php
include_once(dirname(__FILE__).'/../../includes/session.php');
?>


<html>

<body>
        <div class="Banner">
                <br>
                <img src="/images/banner_3.jpg" alt="Adoption GO" class="userpageBanner" width=800px>
                <!-- verificar -->
        </div>
        <div class="Editp-gen"> <br>
                <span class="Editptitle"> Verifique os dados atuais </span> <br> <br>
                <?php
                echo '<input type="text" id="lg_username" value="'.getSessionUsername().'" disabled>';
                ?>
                <input type="password" id="lg_password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{5,10}$"
                        placeholder="Password atual" autofocus>
                <span id="lg_login_r"> </span>
        </div>
        <form method="POST" id="edit_data_form" action="/actions/users/edit_user_data.php">
                <div class="Editp-gen"> <br>
                        <?php
                        include_once(dirname(__FILE__).'/../../includes/csrf.php');
                        insertCSRFToken();
                        ?>
                        <span class="Editptitle"> Novos dados </span> <br>
                        <input type="text" id="sp_username" placeholder="Novo nome de utilizador" name="username">
                        <div id="sp_username_r"> </div>
                        <input type="password" id="sp_password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{5,10}$"
                                placeholder="Nova palavra-passe (5 a 10 Caracteres)" name="password">
                        <div id="sp_password_r"> </div>
                        <input type="email" id="sp_email" placeholder="Novo e-mail" name="email">
                        <div id="sp_email_r"> </div>
                        <input type="text" placeholder="Novo nome" name="name">
                        <br>
                        <button type="submit" name="submit" value="edit">Efetuar alteração</button>
                        <button type="submit" style="background-color:red;" name="submit" value="delete">Eliminar
                                Conta</button>
                </div>
        </form>

</body>

</html>
