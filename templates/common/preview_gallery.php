<?php
include_once("gallery.php");
?>


<html>

<body>
    <p class="Title1">Animais de estimação disponíveis para adopção</p>

    <div class="previewGallery-container">
        <ul>
            <?php
            display_preview_gallery();
            ?>
        </ul>
    </div>
</body>

</html>
