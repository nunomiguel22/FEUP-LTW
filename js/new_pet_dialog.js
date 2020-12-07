var inpPhoto = document.getElementById("coverPhotoInput");
var photoInfo = document.getElementById("CoverPhotoError");
const previewContainer = document.getElementById("imagePreview");
const previewImage = previewContainer.querySelector(".image-preview__image");
const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");

inpPhoto.addEventListener("invalid", function () {
    this.setCustomValidity('Por favor, selecione imagem de perfil');
});

inpPhoto.addEventListener("change", photoHandler);


function photoHandler() {
    this.setCustomValidity('');
    const file = this.files[0];
    if (!file) {
        resetPreview();
        return;
    }

    // check file size
    if (file.size > 5000000) {
        resetPreview();
        photoInfo.innerHTML = "Imagem demasiado grande(Tamanho Máximo 5MB)";
        return;
    }

    const reader = new FileReader();

    reader.addEventListener("load", function () {
        // check if image
        if (!this.result.includes("data:image")) {
            resetPreview();
            photoInfo.innerHTML = "Ficheiro não é uma imagem valida";
            return;
        }
        photoInfo.innerHTML = "";
        previewDefaultText.style.display = "none";
        previewImage.style.display = "block";
        previewImage.setAttribute("src", this.result);

        //upload
    });

    reader.readAsDataURL(file);
}


function resetPreview() {
    inpPhoto.value = "";
    previewDefaultText.style.display = "block";
    previewImage.style.display = "none";
}


