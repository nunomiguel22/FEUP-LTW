var correctEmail = true;
var correctUser = true;

/** Event listeners **/

var userBox = document.getElementById("sp_username");
if (userBox != null)
    userBox.addEventListener("keyup", checkUsername);

var emailBox = document.getElementById("sp_email");
if (emailBox != null)
    emailBox.addEventListener("keyup", checkEmail);

var pwBox = document.getElementById("sp_password");
if (pwBox != null)
    pwBox.addEventListener("keyup", checkPassword);

var loginForm = document.getElementById("login_form");
if (loginForm != null)
    loginForm.addEventListener("submit", validateLoginForm);

/** AJAX **/

function checkUsername() {
    let user = document.getElementById("sp_username").value;
    let params = { username: user };
    ajaxRequest('/actions/users/check_username.php', "POST", ajaxUsernameHandler, params);
}

function checkEmail() {
    let email = document.getElementById("sp_email").value;
    let params = { email: email };
    ajaxRequest('/actions/users/check_email.php', "POST", ajaxEmailHandler, params);
}

function checkPassword() {
    let pwRes = document.getElementById("sp_password_r");
    if (!pwBox.checkValidity()) {
        pwRes.innerHTML = '<span class="smallerror">* password entre 5 a 10 caracteres e pelo menos um numero </span>';
        canSignup = false;
        pwBox.classList.remove("validBorder");
        pwBox.classList.add("invalidBorder");
    }
    else {
        pwRes.innerHTML = '<span class="smallallowed">* password válida </span>';
        canSignup = true;
        pwBox.classList.remove("invalidBorder");
        pwBox.classList.add("validBorder");
    }

}

function ajaxUsernameHandler(usernameIsCorrect) {
    let userRes = document.getElementById("sp_username_r");
    let username = userBox.value;

    if (username == "") {
        userRes.innerHTML = "";
        return;
    }

    if (usernameIsCorrect) {
        userRes.innerHTML = '<span class="smallerror">* nome de utilizador indisponivel </span>';
        correctUser = false;
        userBox.classList.remove("validBorder");
        userBox.classList.add("invalidBorder");
    } else {
        userRes.innerHTML = '<span class="smallallowed">* nome de utilizador disponivel </span>';
        correctUser = true;
        userBox.classList.remove("invalidBorder");
        userBox.classList.add("validBorder");
    }
}

function ajaxEmailHandler(emailIsCorrect) {
    let emailRes = document.getElementById("sp_email_r");
    let email = emailBox.value;

    if (email == "") {
        emailRes.innerHTML = "";
        return;
    }

    if (emailIsCorrect) {
        emailRes.innerHTML = '<span class="smallerror">* E-mail ja esta em uso </span>';
        correctEmail = false;
        emailBox.classList.remove("validBorder");
        emailBox.classList.add("invalidBorder");
    } else {
        emailRes.innerHTML = "";
        correctEmail = true;
        emailBox.classList.remove("invalidBorder");
        emailBox.classList.add("validBorder");
    }
}

function canUserSignup(evt) {

    if (!correctEmail || !correctUser) {
        evt.preventDefault();
    }
}



function validateLoginForm(evt) {
    evt.preventDefault();
    var username = document.getElementById("lg_username").value;
    var password = document.getElementById("lg_password").value;
    var error = document.getElementById("lg_login_r");
    let params = {
        username: username,
        password: password
    };
    ajaxRequest('/actions/users/verify_login.php', "POST", function (result) {
        console.log(result);
        if (result == true) {
            loginForm.removeEventListener("submit", validateLoginForm);
            loginForm.submit();
        }
        else {
            error.innerHTML = '<span class="smallerror">utilizador ou password inválidos </span>';
        }
    }, params);
}

var signup = document.getElementById("signup_form");
if (signup != null)
    signup.addEventListener("submit", canUserSignup);


