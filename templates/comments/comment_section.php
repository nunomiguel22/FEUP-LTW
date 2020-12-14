<?php
include_once(dirname(__FILE__).'/../../database/pets.php');
include_once(dirname(__FILE__).'/../../database/user.php');
include_once(dirname(__FILE__).'/../../includes/session.php');

function print_comment($comment, $padding)
{
    $username = getUserbyID($comment["idowner"]);

    echo '<div class="comment-div" style="padding-left:'.$padding.'px;">';
    echo '<span class="comment-info">'.$username.'</span>';
    echo '<br>';
    echo '<span class="comment-text">'.$comment["message"].'</span>';
    echo '<br>';
    echo '<span class="comment-info comment-reply" comment_id="'.$comment["id"].'">responder</span>';
    echo '</div>';

    $children = getCommentChildren($comment["id"]);

    if ($children != -1) {
        foreach ($children as $child) {
            print_comment($child, $padding + 20);
        }
    }
}


function print_comment_section($pet_id)
{
    generate_comment_form($pet_id);
    $comments = getRootCommentsByPetId($pet_id);

    if ($comments == -1) {
        return;
    }

    echo '<div class="comments-container">';
    echo '<br>';
    foreach ($comments as $comment) {
        print_comment($comment, 5);
    }

    echo '</div>';
    echo '<br><br>';
    echo '<script type="text/javascript" src="../../js/pet_comment.js"></script>';
}

function generate_comment_form($pet_id)
{
    if (!isLoggedIn()) {
        return;
    }
        
    echo '
    <html>
    
    <body>
    
    
        <form class="reply-container" id="pet_comment_form" action="/actions/action_comment.php"
            method="post">
    
            <div class="">
                <input type="text" id="comment_message" placeholder="Faça perguntas sobre o animal." name="message" required>
                <input type="hidden" name="id_pet" value="'.$pet_id.'" required>
                <input type="hidden" id="comment_parent" name="id_parent" value="0" required>
                <br>
                <button type="submit" style=" width:100px;">submeter</button>
    
            </div>
        </form>
    
    </body>
    
    </html>';
}
