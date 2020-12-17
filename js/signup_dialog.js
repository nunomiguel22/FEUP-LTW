var canSignup = true;

var userBox = document.getElementById("sp_username");
if (userBox != null)
    userBox.addEventListener("keyup", checkUsername);

var emailBox = document.getElementById("sp_email");
if (emailBox != null)
    emailBox.addEventListener("keyup", checkEmail);

var pwBox = document.getElementById("sp_password");
if (pwBox != null)
    pwBox.addEventListener("keyup", checkPassword);

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
        pwRes.innerHTML = '<span class="smallallowed">* nome de utilizador disponivel </span>';
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
        canSignup = false;
        userBox.classList.remove("validBorder");
        userBox.classList.add("invalidBorder");
    } else {
        userRes.innerHTML = '<span class="smallallowed">* nome de utilizador disponivel </span>';
        canSignup = true;
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
        canSignup = false;
        emailBox.classList.remove("validBorder");
        emailBox.classList.add("invalidBorder");
    } else {
        emailRes.innerHTML = "";
        canSignup = true;
        emailBox.classList.remove("invalidBorder");
        emailBox.classList.add("validBorder");
    }
}




function canUserSignup() {
    return canSignup;
}
