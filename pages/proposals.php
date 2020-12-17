<?php
include_once(dirname(__FILE__)."/../includes/navbar.php");

echo '
<html>

<body>

  <div class="Banner">
    <br>
    <img src="/images/mpets.png" alt="Adoption GO" class="userpageBanner" width=800px>
    <!-- verificar -->
  </div>

  <p class="Title1">Propostas Enviadas</p>
  <div class="Petstable-div">';

include_once(dirname(__FILE__)."/../templates/common/table.php");
include_once(dirname(__FILE__)."/../database/proposal.php");
include_once(dirname(__FILE__)."/../templates/common/proposal_modal.php");
drawUserProposalTable(getUserProposals(getSessionUserID()));

echo '</div>

  <p class="Title1">Propostas Recebidas</p>
  <div class="Petstable-div">';

  drawUserProposalTable(getOwnerProposals(getSessionUserID()));

  echo '</div>
</body>

</html>';


include_once(dirname(__FILE__)."/../templates/common/footer.php");
