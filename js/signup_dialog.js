var canSignup = true;

$(document).ready(function () {
    //Verify username
    $("#sp_username").keyup(function () {
        let username = $(this).val().trim();

        if (username == "")
            $("#sp_username_r").html("");
        else {
            $.ajax({
                url: '/actions/action_check_username.php',
                type: 'post',
                data: { username: username },
                timeout: 10000,
                success: function (response) {
                    if (response == "true") {
                        $("#sp_username_r").html('<span class="smallerror">* nome de utilizador indisponivel </span>');
                        canSignup = false;
                    }
                    else {
                        $("#sp_username_r").html('<span class="smallallowed">* nome de utilizador disponivel </span>');
                        canSignup = true;
                    }
                }
            });
        }
    });

    $("#sp_email").keyup(function () {
        let email = $(this).val().trim();
        if (email == "")
            $("#sp_email_r").html("");
        else {
            $.ajax({
                url: '/actions/action_check_email.php',
                type: 'post',
                data: { email: email },
                timeout: 10000,
                success: function (response) {
                    if (response == "true") {
                        $("#sp_email_r").html('<span class="smallerror">* E-mail ja esta em uso </span>');
                        canSignup = false;
                    }
                    else {
                        $("#sp_email_r").html("");
                        canSignup = true;
                    }
                }
            });
        }
    });
});


function canUserSignup() {
    return canSignup;
}
