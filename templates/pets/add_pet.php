<html>

<body>
    <div class="container">
        <form enctype="multipart/form-data" id="new_pet_form" action="/actions/action_add_pet.php" method="post">

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
            <span class="smallinfo"> Espécie </span> <br>
            <select class="custom-select" name="species">
                <option value="dog">Cão</option>
                <option value="cat">Gato</option>
            </select>
            <br>
            <span class="smallinfo"> Tamanho </span> <br>
            <select class="custom-select" name="size">
                <option value="small">Pequeno</option>
                <option value="medium">Médio</option>
                <option value="large">Grande</option>
            </select>

            <br>
            <button type="submit">Registar animal para adopção</button>
        </form>
    </div>
</body>

</html>
