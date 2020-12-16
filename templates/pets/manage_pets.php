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
    include_once(dirname(__FILE__)."/../../database/pet_table.php");
    draw_table(get_all_idowner_pets(getSessionUserID()));
  ?>
</div>
</body>

</html>

