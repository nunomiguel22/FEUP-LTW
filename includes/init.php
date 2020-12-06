<?php
include_once(__DIR__.'/session.php');
include_once(__DIR__.'/../database/connect.php');
$debug = false;
if ($debug) {
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
}
