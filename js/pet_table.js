var rows = document.getElementsByClassName("pet_row");

for (let i = 0; i < rows.length; ++i)
    rows[i].addEventListener("click", rowHandler);

function rowHandler() {
    window.location.href = "/pages/pet_profile.php?petid=" + this.getAttribute("pet_id");
}
