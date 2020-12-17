<html>

<body>
    <br>
    <div class="Banner">
        <img src="/images/banner-ex2.jpg" alt="Adoption GO" class="newPetBanner">
        <div class="BannerTitle" style="left: 50%;">Registe o seu animal de estimação</div>
    </div>

    <div class="NewPet-container">
        <form enctype="multipart/form-data" id="new_pet_form" action="/actions/pets/add_pet.php" method="post">

            <div class="CoverPhotoDialog">

                <div class="image-preview" id="imagePreview">
                    <img src="" alt="Foto do animal" class="image-preview__image">
                    <span class="image-preview__default-text">Foto do animal</span>
                </div>
                <input type="file" name="coverPhotoInput" id="coverPhotoInput" required>
                <br>
                <span class="smallerror" id="CoverPhotoError"></span>
                <script type="text/javascript" src="../js/new_pet_dialog.js"></script>
            </div>

            <input type="text" placeholder="Nome" name="name" required autofocus>
            <input type="text" placeholder="Localização" name="location" required>
            <input type="number" name="age" placeholder="Idade" min="1" max="100">
            <span class="NewPet-Info"> Espécie </span> <br>
            <select class="custom-select" name="species">
                <option value="cão">Cão</option>
                <option value="gato">Gato</option>
                <option value="outro">Outro</option>
            </select>
            <br>
            <span class="NewPet-Info"> Tamanho </span> <br>
            <select class="custom-select" name="size">
                <option value="pequeno">Pequeno</option>
                <option value="médio">Médio</option>
                <option value="grande">Grande</option>
            </select>
            <br><br>
            <input type="checkbox" style="float: left;" id="status_checkmark" name="status">
            <label for="status_checkmark" style="float: left;"> Para adopção?</label><br><br>
            <button type="submit">Registar animal</button>
        </form>
    </div>
</body>

</html>
