/** Gallery */

var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("PetGallery-slide");
    if (n > x.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = x.length }
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    x[slideIndex - 1].style.display = "block";
}

/** Comments */

var replies = document.getElementsByClassName("comment-reply");


for (let i = 0; i < replies.length; ++i)
    replies[i].addEventListener("click", replyHandler);


function replyHandler() {
    reset_selected();
    var textInput = document.getElementById("comment_message");
    textInput.focus();
    var id = this.getAttribute("comment_id");
    console.log(this.parentElement);
    this.parentElement.classList.remove("comment-div");
    this.parentElement.classList.add("comment-div-selected");
    var parent = document.getElementById("comment_parent");
    parent.value = id;
}

function reset_selected() {
    for (let i = 0; i < replies.length; ++i) {
        replies[i].parentElement.classList.remove("comment-div-selected");
        replies[i].parentElement.classList.add("comment-div");
    }
}

/** Pet Favorite */

var favoriteStar = document.getElementById("pet-fav-star");
var favoriteButton = document.getElementById("pet-fav-button");
var isFav = favoriteStar.getAttribute("is_fav");

favoriteButton.addEventListener("click", favoriteHandler);


function favoriteHandler() {
    var petID = favoriteStar.getAttribute("id_pet");
    if (isFav) {
        let params = { id_pet: petID };
        ajaxRequest('/actions/pets/remove_favorite.php', "POST", null, params);
        favoriteStar.style = "";
        favoriteStar.innerHTML = "&#9734;"
    }
    else {
        let params = { id_pet: petID };
        favoriteStar.style = "color:red;";
        favoriteStar.innerHTML = "&#9733;"
        ajaxRequest('/actions/pets/add_favorite.php', "POST", null, params);

    }
    isFav ^= 1;
}

/** Proposal */
var proposalForm = document.getElementById("proposal_form");
var proposalButton = document.getElementById("proposal_button");
var proToggle = true;
if (proposalButton != null)
    proposalButton.addEventListener("click", proposalHandler);

function proposalHandler() {

    if (proToggle)
        proposalForm.style = "display:block;"
    else proposalForm.style = "display:none;"

    proToggle ^= 1;

}
