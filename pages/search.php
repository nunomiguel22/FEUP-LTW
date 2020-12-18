<?php
include_once(dirname(__FILE__)."/../includes/navbar.php");
include_once(dirname(__FILE__)."/../includes/session.php");
include_once(dirname(__FILE__)."/../database/pets.php");



$search = preg_replace('/[^a-zA-Z0-9\']/', ' ', $_GET["search"]);

$min_age = $_GET["min_age"];
$max_age = $_GET["max_age"];
$species = $_GET["species"];
$size = $_GET["size"];
$status = $_GET["status"];

echo '
<html>

<body>

  <div class="Banner">
    <br>
    <img src="/images/mpets.png" alt="Adoption GO" class="userpageBanner" width=800px>
    <!-- verificar -->
  </div>

  <br> <br> <br>';

  include_once(dirname(__FILE__)."/../templates/common/search_form.php");

  echo
  '<div class="Petstable-div">';
  include_once(dirname(__FILE__)."/../database/pets.php");
  include_once(dirname(__FILE__)."/../templates/common/table.php");
  
  $pets = searchPets($search, $min_age, $max_age, $species, $size, $status);
  drawTable($pets);

  echo '
  </div>
</body>
</html>';

include_once(dirname(__FILE__)."/../templates/common/footer.php");
