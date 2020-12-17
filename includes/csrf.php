<?php

function generate_random_token()
{
    return bin2hex(openssl_random_pseudo_bytes(32));
}

function verifyCSRF()
{
    if (!isset($_POST["csrf"]) || ($_SESSION['csrf'] !== $_POST["csrf"])) {
        echo json_encode("CSRF token mismatch.");
        die();
    }
}

function insertCSRFToken()
{
    echo '<input type="hidden" name="csrf" value="' . $_SESSION["csrf"] . '">';
}
