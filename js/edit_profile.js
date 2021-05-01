var editForm = document.getElementById("edit_data_form");
if (editForm != null)
    editForm.addEventListener("submit", validateEditForm);


function validateEditForm(evt) {
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
            editForm.removeEventListener("submit", validateLoginForm);
            editForm.submit();
        }
        else {
            error.innerHTML = '<span class="smallerror">utilizador ou password inválidos </span>';
        }
    }, params);
}


var userBox = document.getElementById("sp_username");
if (userBox != null)
    userBox.addEventListener("keyup", checkUsername);

var emailBox = document.getElementById("sp_email");
if (emailBox != null)
    emailBox.addEventListener("keyup", checkEmail);

var pwBox = document.getElementById("sp_password");
if (pwBox != null)
    pwBox.addEventListener("keyup", checkPassword);


