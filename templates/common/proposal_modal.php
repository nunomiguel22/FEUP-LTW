<div id="prop_modal" class="modal">

    <form class="" id="" style="" action="/actions/proposals/update_proposal.php" method="post">
        <div class="imgcontainer">

            <span onclick="document.getElementById('prop_modal').style.display='none'" class="close"
                title="Close login form">&times;</span>
            <a href="/index.php">
                <span class="HomeTitle">Adoption</span> <span class="HomeTitle" style="Color: Red;">GO</span>
            </a>
        </div>


        <div class="container" style="text-align: left;">
            <span> Dono: </span> <span id="owner_span"> </span> <br>
            <span> Proposta de: </span> <span id="user_span"> </span>
            <br><span class="Title2">Proposta</span>
            <textarea rows="4" style="width:100%; height:30%;" id="proposal_message" readonly></textarea>
            <br><br>
            <span> Estado: </span> <span id="status_span"> </span>
            <input type="hidden" name="id_prop" id="id_prop_input" value="-1">
            <button type="submit" name="submit" class="prob_sub" style="background-color:green; color:white;"
                value="accept">Aceitar</button>
            <button type="submit" name="submit" class="prob_sub" style="background-color:red; color:white;"
                value"cancel">Cancelar</button>
        </div>
    </form>
</div>
