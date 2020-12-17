<?php
include_once(dirname(__FILE__)."/session.php");
if (!isLoggedIn()) {
    header("Location: index.php");
    die();
}
