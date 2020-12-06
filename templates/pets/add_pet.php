<html>

<body>
    <div class="container">
        <form class="asd" id="new_pet_form" action="/actions/action_add_pet.php" method="post">

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
