<?php
include_once(dirname(__FILE__) . "/../includes/login_only.php");

include_once(dirname(__FILE__)."/../includes/navbar.php");
include_once(dirname(__FILE__)."/../includes/session.php");
include_once(dirname(__FILE__)."/../database/pets.php");

echo '
<html>

<body>

  <div class="Banner">
    <br>
    <img src="/images/mpets.png" alt="Adoption GO" class="userpageBanner" width=800px>
    <!-- verificar -->
  </div>

  <br> <br> <br>
  <div class="Petstable-div">';

  include_once(dirname(__FILE__)."/../database/pets.php");
  include_once(dirname(__FILE__)."/../templates/common/table.php");
  drawTable(getFavoritePetsByUserID(getSessionUserID()));

  echo '
  </div>
</body>
</html>';

include_once(dirname(__FILE__)."/../templates/common/footer.php");
