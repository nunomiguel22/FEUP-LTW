<?php

echo'
<div id="" class="">

    <form class="" id="" style="" action="/pages/search.php" method="get">
        <input type="text" name="search" value="'.$search.'" placeholder="Procure por nomes e localizações (ex: \'Hulk Porto\')"
            style="width:80%;">
        <br>
        <span class="NewPet-Info"> Idade entre </span>
        <input type="number" style="width:12%; height: 25px;" name="min_age" placeholder="Idade" value="'.$min_age.'" min="0"
            max="100">
        <input type="number" style="width:12%; height: 25px;" name="max_age" placeholder="Idade" value="'.$max_age.'" min="0"
            max="100">
        <span class="NewPet-Info"> Espécie </span>
        <select class="custom-select" name="species" style="width:10%;" required>
            <option value="qualquer">qualquer</option>
            <option value="cão">cão</option>
            <option value="gato">gato</option>
            <option value="outro">outro</option>
            <option selected="selected" hidden>'.$species.'</option>
        </select>
        <span class="NewPet-Info"> Tamanho </span>
        <select class="custom-select" name="size" style="width:10%;" required>
            <option value="qualquer">qualquer</option>
            <option value="pequeno">pequeno</option>
            <option value="médio">médio</option>
            <option value="grande">grande</option>
            <option selected="selected" hidden>'.$size.'</option>
        </select>
        <button type="submit" style="all:revert; width:12%;height:24px; margin:auto;">procurar</button>
        <br><br>
    </form>
</div>';
