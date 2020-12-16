<?php
include_once(__DIR__.'/session.php');
include_once(__DIR__.'/../database/connect.php');
$debug = true;
if ($debug) {
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
}


function console_log($output)
{
    $res = json_encode($output);

    echo '<script> console.log('.$res.'); </script>';
}
