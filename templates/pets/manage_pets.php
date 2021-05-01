<?php
include_once(dirname(__FILE__) . "/../../includes/login_only.php");
?>

<html>

<body>

  <div class="Banner">
    <br>
    <img src="/images/mpets.png" alt="Adoption GO" class="userpageBanner" width=800px>
    <!-- verificar -->
  </div>

  <br> <br> <br>
  <div class="Petstable-div">
    <?php
    include_once(dirname(__FILE__)."/../common/table.php");
    include_once(dirname(__FILE__)."/../../database/pets.php");
    drawTable(getAllPetsByUserID(getSessionUserID()));
  ?>
  </div>
</body>

</html>
