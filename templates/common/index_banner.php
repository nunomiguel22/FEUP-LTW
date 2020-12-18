<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" cotent="width=device-width">
    <title>Adoption GO | Welcome</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="Banner">
        <img src="/images/banner-ex.jpg" alt="Adoption GO" class="galleryBanner">
        <div class="BannerTitle">Planeia adoptar um animal de estimação?</div>
    </div>
    <br>
    <form action="/pages/search.php" method="get">
        <input type="hidden" name="search" value="">
        <input type="hidden" name="min_age" value="0">
        <input type="hidden" name="max_age" value="100">
        <input type="hidden" name="species" value="qualquer">
        <input type="hidden" name="size" value="qualquer">
        <input type="hidden" name="status" value="qualquer">
        <button class="search-button" type="submit"> Procure animais </button>
    </form>

</body>

</html>
