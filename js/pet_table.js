var rows = document.getElementsByClassName("pet_row");


for (let i = 0; i < rows.length; ++i)
    rows[i].addEventListener("click", rowHandler);

function rowHandler() {
    window.location.href = "/pages/pet_profile.php?petid=" + this.getAttribute("pet_id");
}


var propModal = document.getElementById("prop_modal");
var propRows = document.getElementsByClassName("prop_pet_row");
var btns = document.getElementsByClassName("prob_sub");


for (let i = 0; i < propRows.length; ++i)
    propRows[i].addEventListener("click", propRowHandler);

function propRowHandler() {
    var propId = this.getAttribute("prop_id");
    let params = { id_prop: propId };
    ajaxRequest('/actions/proposals/get_proposal_info.php', "POST", updatePropModal, params);
}

function updatePropModal(result) {
    propModal.style = "display:block;";
    var textArea = document.getElementById("proposal_message");
    textArea.innerHTML = result["message"];
    var statusSpan = document.getElementById("status_span");
    var ownerSpan = document.getElementById("owner_span");
    ownerSpan.innerHTML = result["owner"];
    var userSpan = document.getElementById("user_span");
    userSpan.innerHTML = result["user"];

    if (result["status"] == 1) {
        statusSpan.style = "color:olive";
        statusSpan.innerHTML = "Pendente";
    }
    else if (result["status"] == 0) {
        statusSpan.style = "color:red";
        statusSpan.innerHTML = "Rejeitada/Cancelada";
    }
    else {
        statusSpan.style = "color:green";
        statusSpan.innerHTML = "aceite";
    }

    hideButtons(result["status"], result["userIsOwner"]);

    var propInputID = document.getElementById("id_prop_input");
    propInputID.value = result["id"];

}

function hideButtons(status, isOwner) {
    console.log(status);
    if (status != 1) {
        for (let i = 0; i < btns.length; ++i) {
            btns[i].style = "display:none;"
            propModal.style = "display:block;height:70%;";
        }
        return;
    }

    if (!isOwner) {
        btns[0].style = "display:none;"
        btns[1].style = "display:block; background-color:red; color:white;"
        propModal.style = "display:block;height:80%;";
        return;
    }
    propModal.style = "display:block;"
    btns[0].style = "display:block; background-color:green; color:white;"
    btns[1].style = "display:block; background-color:red; color:white;"
}

